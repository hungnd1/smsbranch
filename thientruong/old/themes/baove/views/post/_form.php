<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'post_cateidarr'); ?>
		<?php echo $form->textField($model,'post_cateidarr',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'post_cateidarr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_title'); ?>
		<?php echo $form->textField($model,'post_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'post_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_titleen'); ?>
		<?php echo $form->textField($model,'post_titleen',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'post_titleen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_summary'); ?>
		<?php echo $form->textArea($model,'post_summary',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'post_summary'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_summaryen'); ?>
		<?php echo $form->textArea($model,'post_summaryen',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'post_summaryen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_content'); ?>
		<?php echo $form->textArea($model,'post_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'post_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_contenten'); ?>
		<?php echo $form->textArea($model,'post_contenten',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'post_contenten'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_image'); ?>
		<?php echo $form->textField($model,'post_image',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'post_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_createdate'); ?>
		<?php echo $form->textField($model,'post_createdate'); ?>
		<?php echo $form->error($model,'post_createdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_memberid'); ?>
		<?php echo $form->textField($model,'post_memberid'); ?>
		<?php echo $form->error($model,'post_memberid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_sublink'); ?>
		<?php echo $form->textField($model,'post_sublink',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'post_sublink'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_typical'); ?>
		<?php echo $form->textField($model,'post_typical'); ?>
		<?php echo $form->error($model,'post_typical'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_status'); ?>
		<?php echo $form->textField($model,'post_status'); ?>
		<?php echo $form->error($model,'post_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_order'); ?>
		<?php echo $form->textField($model,'post_order'); ?>
		<?php echo $form->error($model,'post_order'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->