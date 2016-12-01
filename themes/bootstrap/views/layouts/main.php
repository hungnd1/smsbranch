<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <link data-jsfiddle="common" rel="stylesheet" media="screen" href="<?php echo Yii::app()->request->baseUrl; ?>/css/handsontable/handsontable.css">
    <link data-jsfiddle="common" rel="stylesheet" media="screen" href="<?php echo Yii::app()->request->baseUrl; ?>/css/handsontable/pikaday.css">
    <link data-jsfiddle="common" rel="stylesheet" media="screen" href="<?php echo Yii::app()->request->baseUrl; ?>/css/datepicker.css">


	    <title>SMS BrandName,sms brandname,sms gia re,sms mien phi,dịch vụ SMS,SMS API</title>
	    <meta name="keywords" content="SMS BrandName | sms brandname,sms gia re nhat,sms mien phi,dich vu sms" />
	    <meta name="viewport" content="SMS BrandName | Abenla SMS BrandName">
	    <meta name="description" content="TanAnh SMS | SMS BrandName, Dịch vụ SMS , SMS API">
	    <meta name="author" content="SMS BrandName | Abenla SMS , Dịch vụ SMS , SMS API">

	<?php Yii::app()->bootstrap->register(); ?>
        
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
        <script data-jsfiddle="common" src="<?php echo Yii::app()->request->baseUrl; ?>/js/handsontable/pikaday/pikaday.js"></script>
    <script data-jsfiddle="common" src="<?php echo Yii::app()->request->baseUrl; ?>/js/handsontable/moment/moment.js"></script>
    <script data-jsfiddle="common" src="<?php echo Yii::app()->request->baseUrl; ?>/js/handsontable/zeroclipboard/ZeroClipboard.js"></script>
    <script data-jsfiddle="common" src="<?php echo Yii::app()->request->baseUrl; ?>/js/handsontable/handsontable.js"></script>
    <script data-jsfiddle="common" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-datepicker.js"></script>
    <script data-jsfiddle="common" src="<?php echo Yii::app()->request->baseUrl; ?>/js/blockui.js"></script>
    
</head>
<body>
    <?php 
        $config = Config::model()->find('domain="'.YII::app()->params['domain'].'"');
         $memberProfile = Members::model()->findByPk(YII::app()->user->id);
        if(!$config->logo)
            $url_logo = Yii::app()->getBaseUrl().'/images/logo.jpg';
        else
            $url_logo = Config::model()->getLogo($config->domain);
        $height = 40;
        $style="padding-right: 10px;";
        if(YII::app()->params['domain']=="vntec"){
            $style="top: -4px;position: relative;padding-right: 10px;";
            $height = 80;
        }
        echo YII::app()->params['domain'];
    ?>
    <?php $this->widget('bootstrap.widgets.TbNavbar',array(
        'brand'=>CHtml::image($url_logo, 'images_user', array('width'=>$height,'class'=>'images_circle','id'=>'member_images','style'=>$style)).$config->config_name,
        'items'=>array(
            array(
                'class'=>'bootstrap.widgets.TbMenu',
                'htmlOptions'=>array('class'=>'pull-right'),
                'encodeLabel'=>false,
                'items'=>array(
                    array('label'=>'Gửi tin SMS',
                        'url'=>array('/send',array('type'=>'contact')),
                          'items'=>array(
                                array('label'=>'Gửi tin theo danh bạ','url'=>array('/send','type'=>'contact'),'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Gửi tin theo file excel','url'=>array('/send','type'=>'excel'),'visible'=>!Yii::app()->user->isGuest),
                            ),
                        'visible'=>!Yii::app()->user->isGuest
                        ),
                    array('label'=>'Tin nhắn mẫu', 'url'=>array('/templates'),'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'Danh bạ', 'url'=>array('/contacts'),'visible'=>!Yii::app()->user->isGuest,
                            'items'=>array(
                                array('label'=>'Tất cả danh bạ','url'=>array('/contacts')),
                                array('label'=>'Sinh nhật tháng '.date('m'),'url'=>array('/ContactCategorie/birthday'),'visible'=>!Yii::app()->user->isGuest),
                            ),
                        ),
                    array('label'=>'Nhật ký gửi SMS', 'url'=>array('/historys'),'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'Tìm kiếm', 'url'=>array('/searchs'),'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'Báo cáo', 'url'=>'/HistoryContact/report','visible'=>!Yii::app()->user->isGuest,
                          'items'=>array(
                                array('label'=>'Báo cáo theo ngày','url'=>array('/report-day')),
                                array('label'=>'Báo cáo theo tháng','url'=>array('/report-month'),'visible'=>!Yii::app()->user->isGuest),
//                                array('label'=>'Tải báo cáo quảng cáo','url'=>array('/upload-report'),'visible'=>!Yii::app()->user->isGuest),
                            ),
                        ),
                    array('label'=>'Brandname', 'url'=>array('/Brandname/admin'),'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'Thành viên', 'url'=>array('/Members'),'visible'=>(Members::model()->getRoleSystem()==Members::ADMIN || Members::model()->getRoleSystem()==Members::DAILY)),
                    array('label'=>'Đăng nhập', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                    array('label'=>Yii::app()->user->name, 'url'=>'#',
                            'items'=>array(
                                array('label'=>'<i class="icon-user"></i> Thông tin cá nhân','url'=>array('/Members/default/view', 'id'=>YII::app()->user->id)),
                                array('label'=>'<i class="icon-cog"></i> Cài đặt','url'=>array('/prSystems'),
                                    'visible'=>Members::model()->getManagerSystem()
                                    ),
                                array('label'=>'<i class="icon-share"></i> Đăng xuất('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                            ),
                            'visible'=>!Yii::app()->user->isGuest),
                ),
            ),
        ),
    ));
    
    //dialog birth day
    $day = date('d');
    if(isset($_SESSION['popup']) && $_SESSION['popup'] == 1)
    {
        $_SESSION['popup']=0;
    $now = getdate();
    
    $month = $now["mon"]; 
    
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
                        'id'=>'mydialog',
                        // additional javascript options for the dialog plugin
                        'options'=>array(
                                'title'=>'Sinh nhật tháng '.date('m'),
                                'width'=> '900px',
                                'height' => '500',

                        ),
                ));
    
    //Lay thang
    $all_birthday_in_month = Contact::model()->getBirthday($month);
    if($all_birthday_in_month){
            $this->widget('bootstrap.widgets.TbGridView', array(
                'id'=>'history-grid',
                'dataProvider'=>Contact::model()->getBirthday($month),
                'columns'=>array(
                        array(
                            'name'=>'contact_ho',
                            'type'=>'raw',
                        ),
                        array(
                            'name'=>'contact_ten',
                            'type'=>'raw',
                        ),
                        array(
                            'name'=>'contact_phone',
                            'type'=>'raw',
                        ),
                        array(
                            'name'=>'contact_birthday',
                            'type'=>'raw',
                            'value'=>function($data){

                               if($data->contact_birthday)
                                    echo date('d/m/Y',  strtotime($data->contact_birthday));
                               else
                                   echo "";
                            }       
                        ),
                        array(
                            'name'=>'contact_gender',
                            'type'=>'raw',
                        ),
                        array(
                            'name'=>'contact_address',
                            'type'=>'raw',
                        ),
                        array(
                            'name'=>'contact_email',
                            'type'=>'raw',
                        ),
                        array(
                            'name'=>'contact_company',
                            'type'=>'raw',
                        ),
                        array(
                            'name'=>'contact_notes',
                            'type'=>'raw',
                        ),
                ),
        ));
    }
    
    $this->endWidget('zii.widgets.jui.CJuiDialog');
    }
    
    ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		<?php 
                        echo nl2br($config->config_copyright);
                ?><br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
