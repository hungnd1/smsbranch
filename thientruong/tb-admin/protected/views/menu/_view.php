<?php
/* @var $this MenuController */
/* @var $data Menu */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->menu_id), array('view', 'id'=>$data->menu_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entity_id')); ?>:</b>
	<?php echo CHtml::encode($data->entity_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entity_type')); ?>:</b>
	<?php echo CHtml::encode($data->entity_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position')); ?>:</b>
	<?php echo CHtml::encode($data->position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>