<?php
/* @var $this BlockController */
/* @var $model Block */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'block_id'); ?>
		<?php echo $form->textField($model,'block_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'block_logo'); ?>
		<?php echo $form->textField($model,'block_logo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'block_header'); ?>
		<?php echo $form->textArea($model,'block_header',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'block_footer'); ?>
		<?php echo $form->textArea($model,'block_footer',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->