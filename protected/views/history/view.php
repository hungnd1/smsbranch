<?php
/* @var $this HistoryController */
/* @var $model History */

    $button = '<button class="btn" onclick="exportExcel();"/><i class="icon-download-alt"></i> Xuất file excel</button>&nbsp;';
    $button .= '<a class="btn btn-default" href="'.$this->createUrl('admin').'" role="button"><i class="icon-share-alt"></i>Quay lại</a>';
    $this->renderPartial('/site/heade_content',array(
        'title'=>'Chi tiết nhật ký',
        'content_left'=>$button
)); 
?>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
        'type'=>'bordered striped',
	'attributes'=>array(
		'history_campaingname',
                array(
                    'name'=>'history_brand_id',
                    'type'=>'raw',
                    'value'=>  Brandname::model()->findByPk($model->history_brand_id)->brandname,
                ),
                array(
                    'name'=>'history_startdate',
                    'type'=>'raw',
                    'value'=>date('d-m-Y H:i:s',  strtotime($model->history_startdate)),
                ),
                array(
                    'name'=>'history_status',
                    'type'=>'raw',
                    'value'=>PrSystemValueKey::model()->getSysVal("Trangthai_sms")[$model->history_status],
                ),
		'history_total',
		
		
	),
)); ?>
<?php if(Members::model()->getRoleSystem(YII::app()->user->id)==Members::ADMIN && $model->history_type==2 && $model->history_is_schedule==0){?>
<h4> Tải file kết quả lên: </h4>
<?php
$this->widget('ext.EAjaxUpload.EAjaxUpload',
        array(
                'id'=>'uploadFile',
                'config'=>array(
                       'action'=>$this->createUrl('UploadFileResult',array('id'=>$model->history_id)),
                       'allowedExtensions'=>array("doc","docx","xls","xlsx","png"),//array("jpg","jpeg","gif","exe","mov" and etc...
                       'sizeLimit'=>100*1024*1024,// maximum file size in bytes
                       'minSizeLimit'=>1*1024,// minimum file size in bytes
                       'onComplete'=>"js:function(id, fileName, responseJSON){
                                UpdateStatusResultByExcel(); 
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
<?php
    $this->widget('bootstrap.widgets.TbButton',array(
                'label'=>'Tải file mẫu',
                'type'=>'none',
                'size'=>'normal',
                'encodeLabel'=>false,
                'icon'=>'icon-arrow-down',
                'buttonType'=>'link',
                'url'=>$this->createUrl('DownloadTemplate')
    ));
?>
<?php }?>
<?php 
if($model->status_schudule==0 && $model->history_status==1){
    
$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'history-contact-grid',
	'dataProvider'=>  $modelContact->search(20,-1),
	'filter'=>$modelContact,
	'columns'=>array(
                array(
                    'name'=>'history_contact_phone',
                    'type'=>'raw',
                    'value'=>'$data->history_contact_phone',
                    'headerHtmlOptions'=>array('style'=>'width:150px;')
                ),
                array(
                    'header'=>'Họ tên',
                    'type'=>'raw',
                    'value'=>'$data->history_contact_ho." ".$data->history_contact_ten',
                    'headerHtmlOptions'=>array('style'=>'width:150px;')
                ),
                array(
                    'name'=>'history_content',
                    'type'=>'raw',
                    'value'=>'$data->history_content',
                ),
                array(
                    'name'=>'content_number',
                    'type'=>'raw',
                    'value'=>'$data->content_number',
                    'headerHtmlOptions'=>array('style'=>'width:50px;')
                ),
                array(
                    'name'=>'history_contact_status',
                    'type'=>'raw',
                    'value'=>'($data->history_contact_status<0) ? "" : PrSystemValueKey::model()->getSysVal("Trangthai")[$data->history_contact_status]',
                    'headerHtmlOptions'=>array('style'=>'width:80px;'),
                    'visible'=>'($data->history_contact_status<0)'
                ),
	),
)); 

}else {
    $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'history-contact-schedule-grid',
	'dataProvider'=> $modelContactSchedule->search(20,-1),
	'filter'=>$modelContactSchedule,
	'columns'=>array(
                array(
                    'header'=>'Số điện thoại',
                    'name'=>'history_contact_phone',
                    'type'=>'raw',
                    'value'=>'$data->history_contact_phone',
                    'headerHtmlOptions'=>array('style'=>'width:150px;')
                ),
                array(
                    'header'=>'Họ tên',
                    'type'=>'raw',
                    'value'=>'$data->history_contact_ho." ".$data->history_contact_ten',
                    'headerHtmlOptions'=>array('style'=>'width:200px;')
                ),
                array(
                    'header'=>'Nội dung',
                    'name'=>'history_content',
                    'type'=>'raw',
                    'value'=>'$data->history_content',
                ),
                array(
                    'header'=>'Số tin',
                    'name'=>'content_number',
                    'type'=>'raw',
                    'value'=>'$data->content_number',
                    'headerHtmlOptions'=>array('style'=>'width:150px;')
                ),
                
	),
)); 
}         
?>
<style type="text/css">
#uploadFile {
  float:left;
  width:250px;
}
</style>
<script type="text/javascript">
    function exportExcel()
    {
//        alert('tere');
        var id = <?php echo $model->history_id ?>;
        window.open('<?php echo $this->createUrl("exportExcel",array('id'=>$model->history_id)) ?>','_target');
    }
    
    function UpdateStatusResultByExcel(){
    $.blockUI({
           'message':'Đang gửi...'
       }); 
    $.ajax({
            type:"POST",
            url : "<?php echo $this->createUrl('updateStatusResultByExcel');?>",
            data: {history_id:<?php echo $model->history_id ?>},
            success:function(response){
                response=jQuery.parseJSON(response);
                if(response.status=='success'){
                   if(response.phone_error!='')
                   	alert("Các số trong file excel không khớp với danh bạ là: "+response.phone_error);
                   location.reload(); 
                }
                else
                    $.unblockUI();
            }
        });
    }
</script>