<?php
/* @var $this ConfigController */
/* @var $data Config */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('config_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->config_id), array('view', 'id'=>$data->config_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('config_name')); ?>:</b>
	<?php echo CHtml::encode($data->config_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('config_slogan')); ?>:</b>
	<?php echo CHtml::encode($data->config_slogan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('config_copyright')); ?>:</b>
	<?php echo CHtml::encode($data->config_copyright); ?>
	<br />


</div>