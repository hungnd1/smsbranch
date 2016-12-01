<?php
/* @var $this TemplateSmsController */
/* @var $model TemplateSms */

$this->breadcrumbs=array(
	'Template Sms'=>array('index'),
	$model->template_id,
);

$this->menu=array(
	array('label'=>'List TemplateSms', 'url'=>array('index')),
	array('label'=>'Create TemplateSms', 'url'=>array('create')),
	array('label'=>'Update TemplateSms', 'url'=>array('update', 'id'=>$model->template_id)),
	array('label'=>'Delete TemplateSms', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->template_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TemplateSms', 'url'=>array('admin')),
);
?>

<h1>View TemplateSms #<?php echo $model->template_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'template_id',
		'template_content',
		'template_date',
		'template_createby',
	),
)); ?>
