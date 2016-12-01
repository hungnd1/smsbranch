<?php
/* @var $this LinksController */
/* @var $data Links */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->link_id), array('view', 'id'=>$data->link_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_url')); ?>:</b>
	<?php echo CHtml::encode($data->link_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_description')); ?>:</b>
	<?php echo CHtml::encode($data->link_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_date')); ?>:</b>
	<?php echo CHtml::encode($data->link_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_status')); ?>:</b>
	<?php echo CHtml::encode($data->link_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('linxk_order')); ?>:</b>
	<?php echo CHtml::encode($data->linxk_order); ?>
	<br />


</div>