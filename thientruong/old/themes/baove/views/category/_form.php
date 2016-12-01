<?php
/* @var $this CategoryController */
/* @var $model Category */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cate_title'); ?>
		<?php echo $form->textField($model,'cate_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'cate_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cate_summany'); ?>
		<?php echo $form->textArea($model,'cate_summany',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'cate_summany'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cate_sublink'); ?>
		<?php echo $form->textField($model,'cate_sublink',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'cate_sublink'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cate_parent'); ?>
		<?php echo $form->textField($model,'cate_parent'); ?>
		<?php echo $form->error($model,'cate_parent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cate_order'); ?>
		<?php echo $form->textField($model,'cate_order'); ?>
		<?php echo $form->error($model,'cate_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cate_image'); ?>
		<?php echo $form->textField($model,'cate_image',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'cate_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cate_status'); ?>
		<?php echo $form->textField($model,'cate_status'); ?>
		<?php echo $form->error($model,'cate_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->