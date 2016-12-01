<?php
/* @var $this ContactController */
/* @var $data Contact */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->contact_id), array('view', 'id'=>$data->contact_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode($data->category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_hoten')); ?>:</b>
	<?php echo CHtml::encode($data->contact_hoten); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_phone')); ?>:</b>
	<?php echo CHtml::encode($data->contact_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_birthday')); ?>:</b>
	<?php echo CHtml::encode($data->contact_birthday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_gender')); ?>:</b>
	<?php echo CHtml::encode($data->contact_gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_address')); ?>:</b>
	<?php echo CHtml::encode($data->contact_address); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_email')); ?>:</b>
	<?php echo CHtml::encode($data->contact_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_company')); ?>:</b>
	<?php echo CHtml::encode($data->contact_company); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_notes')); ?>:</b>
	<?php echo CHtml::encode($data->contact_notes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_createby')); ?>:</b>
	<?php echo CHtml::encode($data->member_createby); ?>
	<br />

	*/ ?>

</div>