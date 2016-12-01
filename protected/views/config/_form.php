<?php
/* @var $this ConfigController */
/* @var $model Config */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'config-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'config_name'); ?>
		<?php echo $form->textField($model,'config_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'config_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'config_slogan'); ?>
		<?php echo $form->textField($model,'config_slogan',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'config_slogan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'config_copyright'); ?>
		<?php echo $form->textField($model,'config_copyright',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'config_copyright'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->