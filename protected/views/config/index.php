<?php
/* @var $this ConfigController */
/* @var $dataProvider CActiveDataProvider */

//$this->breadcrumbs=array(
//	'Configs',
//);

//$this->menu=array(
//	array('label'=>'Create Config', 'url'=>array('create')),
//	array('label'=>'Manage Config', 'url'=>array('admin')),
//);
$domain = YII::app()->params['domain'];
$model = Config::model()->find('domain="'.$domain.'"');
if(!$model)
    Config::model()->addConfig($domain);
?>


    <?php
        $this->widget('editable.EditableDetailView', array(
        'data'       => $model,
        
        //you can define any default params for child EditableFields 
        'url'        => $this->createUrl('/Config/UpdateLineConfig'), //common submit url for all fields
        'emptytext'  => 'no value',
        //'apply' => false, //you can turn off applying editable to all attributes
          
        'attributes' => array(
            array(
                'name' => 'config_name',
                'editable' => array(
                    'type'        => 'text',
                    'inputclass' => 'input-large',
                    'emptytext'  => 'special emptytext',                
                    'placement'   => 'right',
                ),
            ),
            array(
                'name' => 'config_slogan',
                'editable' => array(
                    'type'        => 'textarea',
                    'inputclass' => 'input-large',
                    'emptytext'  => 'special emptytext',                
                    'placement'   => 'right',
                )
            ),
            array(
                'name' => 'config_copyright',
                'editable' => array(
                    'type'        => 'textarea',
                    'inputclass' => 'input-large',
                    'emptytext'  => 'special emptytext',                
                    'placement'   => 'right',
                )
            ),
        )
        ));
    ?>
<div style="overflow: hidden;">
    <div style="width:140px;float: left;">
        <div >
          <?php echo CHtml::image(Config::model()->getLogo($model->domain), 'images_user', array('width'=>'100','class'=>'images_circle','id'=>'config_logo'))?>  
        </div>
    </div>

</div>
<br>
 <?php
            $this->widget('ext.EAjaxUpload.EAjaxUpload',
                    array(
                            'id'=>'uploadFile',
                            'config'=>array(
                                   'action'=>$this->createUrl('/Config/Logo',array('domain'=>$model->domain)),
                                   'allowedExtensions'=>array("jpg","jpeg","gif","png"),//array("jpg","jpeg","gif","exe","mov" and etc...
                                   'sizeLimit'=>10*1024*1024,// maximum file size in bytes
                                   'minSizeLimit'=>1*1024,// minimum file size in bytes
                                   'onComplete'=>"js:function(id, fileName, responseJSON){
                                       $('#config_logo').attr('src','".Yii::app()->getBaseUrl()."/uploads/'+fileName);
                                       $('#uploadFile .qq-upload-list').html('');
                                    }",
                                   'messages'=>array(
                                                     'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                                     'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                                     'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                                     'emptyError'=>"{file} is empty, please select files again without it.",
                                                     'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                                                    ),
                                   'showMessage'=>"js:function(message){ alert(message); }"
                                  )
                    ));
?>