<?php

/* @var $this HistoryController */

/* @var $model History */

$button = '<a class="btn" href="#" onclick="exportExel();return false;" /><i class="icon-download-alt"></i> Xuất file excel</a>&nbsp;';

$this->renderPartial('/site/heade_content',array(

    'title'=>'Báo cáo theo ngày',

    'content_left'=>$button

    )); 



Yii::app()->clientScript->registerScript('Tìm kiếm', "

$('.search-button').click(function(){

	$('.search-form').toggle();

	return false;

});

$('.search-form form').submit(function(){

	$('#report-contact-grid').yiiGridView('update', {

		data: $(this).serialize()

	});

	return false;

});

");

?>



<div class="search-form" style="display:block">

<?php $this->renderPartial('_search_report'); ?>

</div><!-- search-form -->



<?php $this->widget('bootstrap.widgets.TbGridView', array(

	'id'=>'report-contact-grid',

	'dataProvider'=>  $model->search(),

	'columns'=>array(

                array(

                    'name'=>'history_contact_phone',

                    'type'=>'raw',

                    'value'=>'$data->history_contact_phone',

                    'headerHtmlOptions'=>array('style'=>'width:120px;')

                ),

                array(

                    'name'=>'history_content',

                    'type'=>'raw',

                    'value'=>'$data->history_content',

                ),

                array(

                    'header'=>'Brandname',

                    'type'=>'raw',

                    'value'=>function($data){
                        if(Brandname::model()->findByPk($data->history->history_brand_id))
                            return Brandname::model()->findByPk($data->history->history_brand_id)->brandname;
                        return "";
                    },

                    'headerHtmlOptions'=>array('style'=>'width:120px;')

                ),

                array(

                    'header'=>'Ngày gửi',

                    'type'=>'raw',

                    'value'=>'date("d-m-Y H:i:s",strTotime($data->history->history_startdate))',

                    'headerHtmlOptions'=>array('style'=>'width:80px;')

                ),

                array(

                    'name'=>'content_number',

                    'type'=>'raw',

                    'value'=>'$data->content_number',

                    'headerHtmlOptions'=>array('style'=>'width:50px;')

                ),

                array(

                    'header'=>'Loại tin',

                    'type'=>'raw',

                    'value'=>'($data->history->history_type ? PrSystemValueKey::model()->getSysVal("SmsType")[$data->history->history_type]: "")',

                    'headerHtmlOptions'=>array('style'=>'width:150px;')

                ),

                array(

                    'name'=>'history_contact_status',

                    'type'=>'raw',

                    'value'=>'($data->history_contact_status<0) ? "" : PrSystemValueKey::model()->getSysVal("Trangthai")[$data->history_contact_status]',

                    'headerHtmlOptions'=>array('style'=>'width:80px;')

                ),

	),

)); 



            

?>

<script type="text/javascript">
    function exportExel(){
        var brandname = $('#HistoryContact_history_brandname').val();
        var type = $('#HistoryContact_history_type').val();
        var status = $('#HistoryContact_history_contact_status').val();
        var fromdate = $('#HistoryContact_history_fromdate').val();
        var todate = $('#HistoryContact_history_todate').val();
        var createBy = $('#HistoryContact_history_createby').val();
        var telecom = getIDSelectInput();
        var url = '<?php echo $this->createUrl('ExportExcelFlow'); ?>';
        window.open(url+'/brandname/'+brandname+'/type/'+type+'/status/'+status+'/fromdate/'+fromdate+'/todate/'+todate+'/telecoms/'+telecom+'/createBy/'+createBy);
    }

    function getIDSelectInput(){

        var IDinput = "";

        var checkbox = document.getElementsByName('telecom');

        for(var i=0; i< checkbox.length; i++) {

            if(checkbox[i].checked)

            {

                IDinput += checkbox[i].value+',';

            }

        }

        return IDinput;

    }

</script>