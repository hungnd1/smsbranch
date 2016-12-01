<?php
/* @var $this HistoryContactController */
/* @var $model HistoryContact */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'history-contact-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'history_contact_id'); ?>
		<?php echo $form->textField($model,'history_contact_id'); ?>
		<?php echo $form->error($model,'history_contact_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_id'); ?>
		<?php echo $form->textField($model,'contact_id'); ?>
		<?php echo $form->error($model,'contact_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'history_contact_hoten'); ?>
		<?php echo $form->textField($model,'history_contact_hoten',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'history_contact_hoten'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'history_contact_phone'); ?>
		<?php echo $form->textField($model,'history_contact_phone'); ?>
		<?php echo $form->error($model,'history_contact_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'history_contact_birthday'); ?>
		<?php echo $form->textField($model,'history_contact_birthday'); ?>
		<?php echo $form->error($model,'history_contact_birthday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'history_contact_gender'); ?>
		<?php echo $form->textField($model,'history_contact_gender'); ?>
		<?php echo $form->error($model,'history_contact_gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'history_contact_address'); ?>
		<?php echo $form->textField($model,'history_contact_address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'history_contact_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'history_contact_email'); ?>
		<?php echo $form->textField($model,'history_contact_email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'history_contact_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'history_contact_company'); ?>
		<?php echo $form->textField($model,'history_contact_company',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'history_contact_company'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'history_contact_notes'); ?>
		<?php echo $form->textField($model,'history_contact_notes',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'history_contact_notes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'history_contact_status'); ?>
		<?php echo $form->textField($model,'history_contact_status'); ?>
		<?php echo $form->error($model,'history_contact_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->