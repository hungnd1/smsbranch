<?php
/* @var $this LinksController */
/* @var $model Links */

$this->breadcrumbs=array(
	'Links'=>array('index'),
	$model->link_id,
);

$this->menu=array(
	array('label'=>'List Links', 'url'=>array('index')),
	array('label'=>'Create Links', 'url'=>array('create')),
	array('label'=>'Update Links', 'url'=>array('update', 'id'=>$model->link_id)),
	array('label'=>'Delete Links', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->link_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Links', 'url'=>array('admin')),
);
?>

<h1>View Links #<?php echo $model->link_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'link_id',
		'link_url',
		'link_description',
		'link_date',
		'link_status',
		'linxk_order',
	),
)); ?>
