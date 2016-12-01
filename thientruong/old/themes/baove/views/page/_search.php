<?php
/* @var $this PageController */
/* @var $model Page */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'page_id'); ?>
		<?php echo $form->textField($model,'page_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'page_title'); ?>
		<?php echo $form->textField($model,'page_title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'page_image'); ?>
		<?php echo $form->textField($model,'page_image',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'page_content'); ?>
		<?php echo $form->textArea($model,'page_content',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'page_contenten'); ?>
		<?php echo $form->textArea($model,'page_contenten',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'page_titleen'); ?>
		<?php echo $form->textField($model,'page_titleen',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'page_sublink'); ?>
		<?php echo $form->textField($model,'page_sublink',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'page_tag'); ?>
		<?php echo $form->textField($model,'page_tag',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'page_createdate'); ?>
		<?php echo $form->textField($model,'page_createdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'page_parent'); ?>
		<?php echo $form->textField($model,'page_parent'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'page_status'); ?>
		<?php echo $form->textField($model,'page_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'page_order'); ?>
		<?php echo $form->textField($model,'page_order'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->