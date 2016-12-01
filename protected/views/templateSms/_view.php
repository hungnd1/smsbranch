<?php
/* @var $this TemplateSmsController */
/* @var $data TemplateSms */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('template_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->template_id), array('view', 'id'=>$data->template_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('template_content')); ?>:</b>
	<?php echo CHtml::encode($data->template_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('template_date')); ?>:</b>
	<?php echo CHtml::encode($data->template_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('template_createby')); ?>:</b>
	<?php echo CHtml::encode($data->template_createby); ?>
	<br />


</div>