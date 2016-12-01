<?php
/* @var $this HistoryContactController */
/* @var $data HistoryContact */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('history_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->history_id), array('view', 'id'=>$data->history_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('history_contact_id')); ?>:</b>
	<?php echo CHtml::encode($data->history_contact_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_id')); ?>:</b>
	<?php echo CHtml::encode($data->contact_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('history_contact_hoten')); ?>:</b>
	<?php echo CHtml::encode($data->history_contact_hoten); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('history_contact_phone')); ?>:</b>
	<?php echo CHtml::encode($data->history_contact_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('history_contact_birthday')); ?>:</b>
	<?php echo CHtml::encode($data->history_contact_birthday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('history_contact_gender')); ?>:</b>
	<?php echo CHtml::encode($data->history_contact_gender); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('history_contact_address')); ?>:</b>
	<?php echo CHtml::encode($data->history_contact_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('history_contact_email')); ?>:</b>
	<?php echo CHtml::encode($data->history_contact_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('history_contact_company')); ?>:</b>
	<?php echo CHtml::encode($data->history_contact_company); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('history_contact_notes')); ?>:</b>
	<?php echo CHtml::encode($data->history_contact_notes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('history_contact_status')); ?>:</b>
	<?php echo CHtml::encode($data->history_contact_status); ?>
	<br />

	*/ ?>

</div>