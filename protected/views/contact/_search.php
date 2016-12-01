<?php
/* @var $this ContactController */
/* @var $model Contact */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'contact_id'); ?>
		<?php echo $form->textField($model,'contact_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'category_id'); ?>
		<?php echo $form->textField($model,'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_phone'); ?>
		<?php echo $form->textField($model,'contact_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_birthday'); ?>
		<?php echo $form->textField($model,'contact_birthday'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_gender'); ?>
		<?php echo $form->textField($model,'contact_gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_address'); ?>
		<?php echo $form->textField($model,'contact_address',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_email'); ?>
		<?php echo $form->textField($model,'contact_email',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_company'); ?>
		<?php echo $form->textField($model,'contact_company',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_notes'); ?>
		<?php echo $form->textField($model,'contact_notes',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_createby'); ?>
		<?php echo $form->textField($model,'member_createby'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Tìm kiếm'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->