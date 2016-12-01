<?php
/* @var $this BrandnameController */
/* @var $data Brandname */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->brand_id), array('view', 'id'=>$data->brand_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brandname')); ?>:</b>
	<?php echo CHtml::encode($data->brandname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_createdate')); ?>:</b>
	<?php echo CHtml::encode($data->brand_createdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_status')); ?>:</b>
	<?php echo CHtml::encode($data->brand_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_expires')); ?>:</b>
	<?php echo CHtml::encode($data->brand_expires); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_createby')); ?>:</b>
	<?php echo CHtml::encode($data->brand_createby); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_member')); ?>:</b>
	<?php echo CHtml::encode($data->brand_member); ?>
	<br />


</div>