<?php
/* @var $this PageController */
/* @var $data Page */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->page_id), array('view', 'id'=>$data->page_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_title')); ?>:</b>
	<?php echo CHtml::encode($data->page_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_image')); ?>:</b>
	<?php echo CHtml::encode($data->page_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_content')); ?>:</b>
	<?php echo CHtml::encode($data->page_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_contenten')); ?>:</b>
	<?php echo CHtml::encode($data->page_contenten); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_titleen')); ?>:</b>
	<?php echo CHtml::encode($data->page_titleen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_sublink')); ?>:</b>
	<?php echo CHtml::encode($data->page_sublink); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('page_tag')); ?>:</b>
	<?php echo CHtml::encode($data->page_tag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_createdate')); ?>:</b>
	<?php echo CHtml::encode($data->page_createdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_parent')); ?>:</b>
	<?php echo CHtml::encode($data->page_parent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_status')); ?>:</b>
	<?php echo CHtml::encode($data->page_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_order')); ?>:</b>
	<?php echo CHtml::encode($data->page_order); ?>
	<br />

	*/ ?>

</div>