<?php
/* @var $this BrandnameController */
/* @var $model Brandname */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'brandname-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'brandname'); ?>
		<?php echo $form->textField($model,'brandname',array('size'=>20,'maxlength'=>20,'class'=>'span3')); ?>
		<?php echo $form->error($model,'brandname'); ?>
	</div>
        
	<div class="form-group">
		<?php echo $form->labelEx($model,'brand_username'); ?>
		<?php echo $form->textField($model,'brand_username',array('size'=>20,'maxlength'=>50,'class'=>'span3')); ?>
		<?php echo $form->error($model,'brand_username'); ?>
	</div>
        
	<div class="form-group">
		<?php echo $form->labelEx($model,'brand_password'); ?>
		<?php echo $form->textField($model,'brand_password',array('size'=>20,'maxlength'=>100,'class'=>'span3')); ?>
		<?php echo $form->error($model,'brand_password'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'sotin'); ?>
		<?php echo $form->textField($model,'sotin',array('size'=>20,'maxlength'=>12,'class'=>'span3')); ?>
		<?php echo $form->error($model,'sotin'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'dongia'); ?>
		<?php echo $form->textField($model,'dongia',array('size'=>20,'maxlength'=>12,'class'=>'span3')); ?>
		<?php echo $form->error($model,'dongia'); ?>
	</div>
        
	<div class="form-group">
		<?php echo $form->labelEx($model,'brand_member'); ?>
                <?php $this->widget('ext.select2.ESelect2',array(
                  'name'=>'Brandname[brand_member]',
                  'data'=>  Members::model()->getMemberArray(),
                    'htmlOptions'=>array(
                        'style'=>'width:270px;'
                    ),
                )) ?>
		<?php echo $form->error($model,'brand_member'); ?>
	</div>

	<div class="form-group">
                <?php $dvalue = (isset($model->brand_expires) ? date('d-m-Y',  strtotime($model->brand_expires)) : date('d-m-Y')); ?>
		<?php echo $form->labelEx($model,'brand_expires'); ?>
		<?php echo $form->textField($model,'brand_expires',array('class'=>'span3','value'=>$dvalue)); ?>
		<?php echo $form->error($model,'brand_expires'); ?>
	</div>

	<div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton',array(
                'buttonType'=>'submit',
                'type'=>'primary',
                'label'=>$model->isNewRecord ? 'Thêm' : 'Sửa',
                'icon'=>'icon-ok',
                'ajaxOptions'=>array(
                    'type'=>'POST',
                ),
            )); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
    $(document).ready(function(){
        var from_date = $("#Brandname_brand_expires").datepicker({
            format: 'dd-mm-yyyy'
        }).on('changeDate', function(ev) {
            from_date.hide();
        }).data('datepicker');	
    });
</script>