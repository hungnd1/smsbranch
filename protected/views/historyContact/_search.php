<?php
/* @var $this HistoryContactController */
/* @var $model HistoryContact */
/* @var $form CActiveForm */
$category_sms = array(''=>'Tất cả');
$category_sms = $category_sms + PrSystemValueKey::model()->getSysVal('SmsType');

$status_sms = array(''=>'Tất cả');
$status_sms = $status_sms + PrSystemValueKey::model()->getSysVal('Trangthai');
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
    <div>
        <?php  if(Members::model()->getRoleSystem(YII::app()->user->id)!=Members::KHACHHANG) { ?>
            <div class="form-group" style="float: left; width: 350px;">
                    <?php echo CHtml::label('Thành viên','HistoryContact_history_createby',array('style'=>'width: 100px;')); ?>
                    <?php echo CHtml::dropDownList('HistoryContact[history_createby]',YII::app()->user->id, Members::model()->getMemberArray(),array('class'=>'span2')); ?>
            </div>
        <?php } ?>
        <div class="form-group" style="float: left; width: 350px;">
		<?php echo $form->label($model,'history_contact_phone',array('style'=>'width: 100px;')); ?>
		<?php echo $form->textField($model,'history_contact_phone',array('class'=>'span2')); ?>
	</div>

	<div class="form-group" style="float: left; width: 350px;">
		<?php echo CHtml::label('Loại tin','loaitin',array('style'=>'width: 100px;')); ?>
		<?php echo CHtml::dropDownList('HistoryContact[history_type]','',$category_sms,array('class'=>'span2')); ?>
	</div>
	<div class="form-group" style="float: left; width: 350px;">
		<?php echo CHtml::label('Từ ngày','from_date',array('style'=>'width: 100px;')); ?>
		<?php echo CHtml::textField('HistoryContact[history_fromdate]','',array('class'=>'span2')); ?>
	</div>
	<div class="form-group" style="float: left; width: 350px;">
		<?php echo CHtml::label('Đến ngày','to_date',array('style'=>'width: 100px;')); ?>
		<?php echo CHtml::textField('HistoryContact[history_todate]','',array('class'=>'span2')); ?>
	</div> 
	<div class="form-group" style="float: left; width: 350px;">
		<?php echo $form->label($model,'history_contact_status',array('style'=>'width: 100px;')); ?>
		<?php echo $form->dropDownList($model,'history_contact_status',$status_sms,array('class'=>'span2')); ?>
	</div>
	<div class="form-group">
                <?php
                    $this->widget('bootstrap.widgets.TbButton',array(
                                'label'=>'Tìm kiếm',
                                'type'=>'none',
                                'size'=>'normal',
                                'encodeLabel'=>false,
                                'icon'=>'icon-search',
                                'buttonType'=>'submit',
                    ));
                ?>
	</div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
<script type="text/javascript">
    $(document).ready(function(){
        var from_date = $("#HistoryContact_history_fromdate").datepicker({
            format: 'dd-mm-yyyy'
        }).on('changeDate', function(ev) {
            from_date.hide();
        }).data('datepicker');	
        
        var to_date = $("#HistoryContact_history_todate").datepicker({
            format: 'dd-mm-yyyy'
        }).on('changeDate', function(ev) {
            to_date.hide();
        }).data('datepicker');	
    });
</script>