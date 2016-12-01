<?php
/* @var $this BlockController */
/* @var $data Block */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('block_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->block_id), array('view', 'id'=>$data->block_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('block_logo')); ?>:</b>
	<?php echo CHtml::encode($data->block_logo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('block_header')); ?>:</b>
	<?php echo CHtml::encode($data->block_header); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('block_footer')); ?>:</b>
	<?php echo CHtml::encode($data->block_footer); ?>
	<br />


</div>