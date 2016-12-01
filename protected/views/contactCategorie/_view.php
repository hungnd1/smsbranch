<?php
/* @var $this ContactCategorieController */
/* @var $data ContactCategorie */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->category_id), array('view', 'id'=>$data->category_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_name')); ?>:</b>
	<?php echo CHtml::encode($data->category_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_createby')); ?>:</b>
	<?php echo CHtml::encode($data->category_createby); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_status')); ?>:</b>
	<?php echo CHtml::encode($data->category_status); ?>
	<br />


</div>