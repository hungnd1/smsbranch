<?php
/* @var $this BrandnameController */
/* @var $model Brandname */

$this->breadcrumbs=array(
	'Brandnames'=>array('index'),
	$model->brand_id,
);

$this->menu=array(
	array('label'=>'List Brandname', 'url'=>array('index')),
	array('label'=>'Create Brandname', 'url'=>array('create')),
	array('label'=>'Update Brandname', 'url'=>array('update', 'id'=>$model->brand_id)),
	array('label'=>'Delete Brandname', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->brand_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Brandname', 'url'=>array('admin')),
);
?>

<h1>View Brandname #<?php echo $model->brand_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'brand_id',
		'brandname',
		'brand_createdate',
		'brand_status',
		'brand_expires',
		'brand_createby',
		'brand_member',
	),
)); ?>
