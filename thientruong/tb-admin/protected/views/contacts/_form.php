<?php
/* @var $this ContactsController */
/* @var $model Contacts */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contacts-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_title'); ?>
		<?php echo $form->textField($model,'contact_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'contact_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_phone'); ?>
		<?php echo $form->textField($model,'contact_phone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'contact_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_content'); ?>
		<?php echo $form->textArea($model,'contact_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'contact_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_email'); ?>
		<?php echo $form->textField($model,'contact_email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'contact_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_address'); ?>
		<?php echo $form->textField($model,'contact_address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'contact_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_order'); ?>
		<?php echo $form->textField($model,'contact_order'); ?>
		<?php echo $form->error($model,'contact_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_status'); ?>
		<?php echo $form->textField($model,'contact_status'); ?>
		<?php echo $form->error($model,'contact_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->