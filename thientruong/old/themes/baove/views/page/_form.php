<?php
/* @var $this PageController */
/* @var $model Page */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'page-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'page_title'); ?>
		<?php echo $form->textField($model,'page_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'page_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page_image'); ?>
		<?php echo $form->textField($model,'page_image',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'page_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page_content'); ?>
		<?php echo $form->textArea($model,'page_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'page_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page_contenten'); ?>
		<?php echo $form->textArea($model,'page_contenten',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'page_contenten'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page_titleen'); ?>
		<?php echo $form->textField($model,'page_titleen',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'page_titleen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page_sublink'); ?>
		<?php echo $form->textField($model,'page_sublink',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'page_sublink'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page_tag'); ?>
		<?php echo $form->textField($model,'page_tag',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'page_tag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page_createdate'); ?>
		<?php echo $form->textField($model,'page_createdate'); ?>
		<?php echo $form->error($model,'page_createdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page_parent'); ?>
		<?php echo $form->textField($model,'page_parent'); ?>
		<?php echo $form->error($model,'page_parent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page_status'); ?>
		<?php echo $form->textField($model,'page_status'); ?>
		<?php echo $form->error($model,'page_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page_order'); ?>
		<?php echo $form->textField($model,'page_order'); ?>
		<?php echo $form->error($model,'page_order'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->