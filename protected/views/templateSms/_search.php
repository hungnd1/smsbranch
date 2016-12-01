<?php
/* @var $this TemplateSmsController */
/* @var $model TemplateSms */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'template_id'); ?>
		<?php echo $form->textField($model,'template_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'template_content'); ?>
		<?php echo $form->textArea($model,'template_content',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'template_date'); ?>
		<?php echo $form->textField($model,'template_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'template_createby'); ?>
		<?php echo $form->textField($model,'template_createby'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->