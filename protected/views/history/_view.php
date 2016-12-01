<?php
/* @var $this HistoryController */
/* @var $data History */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('history_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->history_id), array('view', 'id'=>$data->history_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('history_campaingname')); ?>:</b>
	<?php echo CHtml::encode($data->history_campaingname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('history_brand_id')); ?>:</b>
	<?php echo CHtml::encode($data->history_brand_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('history_startdate')); ?>:</b>
	<?php echo CHtml::encode($data->history_startdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('history_status')); ?>:</b>
	<?php echo CHtml::encode($data->history_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('history_total')); ?>:</b>
	<?php echo CHtml::encode($data->history_total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('history_notes')); ?>:</b>
	<?php echo CHtml::encode($data->history_notes); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('history_type')); ?>:</b>
	<?php echo CHtml::encode($data->history_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('history_mobile')); ?>:</b>
	<?php echo CHtml::encode($data->history_mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_createby')); ?>:</b>
	<?php echo CHtml::encode($data->member_createby); ?>
	<br />

	*/ ?>

</div>