<?php
/* @var $this ContactsController */
/* @var $data Contacts */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->contact_id), array('view', 'id'=>$data->contact_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_title')); ?>:</b>
	<?php echo CHtml::encode($data->contact_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_phone')); ?>:</b>
	<?php echo CHtml::encode($data->contact_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_content')); ?>:</b>
	<?php echo CHtml::encode($data->contact_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_email')); ?>:</b>
	<?php echo CHtml::encode($data->contact_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_address')); ?>:</b>
	<?php echo CHtml::encode($data->contact_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_order')); ?>:</b>
	<?php echo CHtml::encode($data->contact_order); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_status')); ?>:</b>
	<?php echo CHtml::encode($data->contact_status); ?>
	<br />

	*/ ?>

</div>