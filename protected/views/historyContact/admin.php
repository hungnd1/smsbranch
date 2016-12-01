<?php
/* @var $this HistoryContactController */
/* @var $model HistoryContact */

$button = '<a class="btn" href="#" onclick="exportExel();return false;" /><i class="icon-download-alt"></i> Xuất file excel</a>&nbsp;';
$this->renderPartial('/site/heade_content',array(
    'title'=>'Tìm kiếm',
    'content_left'=>$button
    )); 

Yii::app()->clientScript->registerScript('Tìm kiếm', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#history-contact-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'history-contact-grid',
        'type'=>'striped',
	'dataProvider'=>$model->search(20),
	'columns'=>array(
            array(
                    'name'=>'history_contact_phone',
                    'type'=>'raw',
                    'value'=>'$data->history_contact_phone',
                    'headerHtmlOptions'=>array('style'=>'width:120px;')
                ),
//		'history_contact_phone',
                'history_content',
                array(
                    'name'=>'content_number',
                    'type'=>'raw',
                    'value'=>'$data->content_number'
                ),
                array(
                    'name'=>'history_contact_status',
                    'type'=>'raw',
                    'value'=>'($data->history_contact_status<0) ? "Xem file kết quả" : PrSystemValueKey::model()->getSysVal("Trangthai")[$data->history_contact_status]'
                ),
                array(
                    'header'=>'Loại tin',
                    'type'=>'raw',
                    'value'=>'($data->history->history_type ? PrSystemValueKey::model()->getSysVal("SmsType")[$data->history->history_type] : "")'
                ),
                array(
                    'header'=>'Ngày gửi',
                    'type'=>'raw',
                    'value'=>'$data->history->history_startdate'
                ),
	),
)); 
?>
<script type="text/javascript">
    function exportExel(){
        var phone = $('#HistoryContact_history_contact_phone').val();
        var type = $('#HistoryContact_history_type').val();
        var status = $('#HistoryContact_history_contact_status').val();
        var fromdate = $('#HistoryContact_history_fromdate').val();
        var todate = $('#HistoryContact_history_todate').val();
        var createby = $('#HistoryContact_history_createby').val();
        
        var url = '<?php echo $this->createUrl('exportExcel'); ?>';
        window.open(url+'/phone/'+phone+'/type/'+type+'/status/'+status+'/fromdate/'+fromdate+'/todate/'+todate+'/createby/'+createby);
   
    }
</script>
