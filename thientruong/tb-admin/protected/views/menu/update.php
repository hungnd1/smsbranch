<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs=array(
	'Menus'=>array('index'),
	$model->menu_id=>array('view','id'=>$model->menu_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Menu', 'url'=>array('index')),
	array('label'=>'Create Menu', 'url'=>array('create')),
	array('label'=>'View Menu', 'url'=>array('view', 'id'=>$model->menu_id)),
	array('label'=>'Manage Menu', 'url'=>array('admin')),
);
?>

<h1>Sửa Menu</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>