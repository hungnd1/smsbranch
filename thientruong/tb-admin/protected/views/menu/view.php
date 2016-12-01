<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs=array(
	'Menus'=>array('index'),
	$model->menu_id,
);

$this->menu=array(
	array('label'=>'List Menu', 'url'=>array('index')),
	array('label'=>'Create Menu', 'url'=>array('create')),
	array('label'=>'Update Menu', 'url'=>array('update', 'id'=>$model->menu_id)),
	array('label'=>'Delete Menu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->menu_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Menu', 'url'=>array('admin')),
);
?>

<h1>View Menu #<?php echo $model->menu_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'menu_id',
		'entity_id',
		'entity_type',
		'position',
		'status',
	),
)); ?>
