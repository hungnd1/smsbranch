<?php
/* @var $this ContactController */
/* @var $model Contact */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->textField($model,'category_id'); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_hoten'); ?>
		<?php echo $form->textField($model,'contact_hoten',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'contact_hoten'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_phone'); ?>
		<?php echo $form->textField($model,'contact_phone'); ?>
		<?php echo $form->error($model,'contact_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_birthday'); ?>
		<?php echo $form->textField($model,'contact_birthday'); ?>
		<?php echo $form->error($model,'contact_birthday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_gender'); ?>
		<?php echo $form->textField($model,'contact_gender'); ?>
		<?php echo $form->error($model,'contact_gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_address'); ?>
		<?php echo $form->textField($model,'contact_address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'contact_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_email'); ?>
		<?php echo $form->textField($model,'contact_email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'contact_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_company'); ?>
		<?php echo $form->textField($model,'contact_company',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'contact_company'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_notes'); ?>
		<?php echo $form->textField($model,'contact_notes',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'contact_notes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_createby'); ?>
		<?php echo $form->textField($model,'member_createby'); ?>
		<?php echo $form->error($model,'member_createby'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->