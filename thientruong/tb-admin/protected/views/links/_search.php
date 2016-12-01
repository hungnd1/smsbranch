<?php
/* @var $this LinksController */
/* @var $model Links */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'link_id'); ?>
		<?php echo $form->textField($model,'link_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'link_url'); ?>
		<?php echo $form->textField($model,'link_url',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'link_description'); ?>
		<?php echo $form->textArea($model,'link_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'link_date'); ?>
		<?php echo $form->textField($model,'link_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'link_status'); ?>
		<?php echo $form->textField($model,'link_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'linxk_order'); ?>
		<?php echo $form->textField($model,'linxk_order'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->