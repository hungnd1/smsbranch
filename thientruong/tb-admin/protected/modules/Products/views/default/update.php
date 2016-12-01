<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->pro_id=>array('view','id'=>$model->pro_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Products', 'url'=>array('index')),
	array('label'=>'Create Products', 'url'=>array('create')),
	array('label'=>'View Products', 'url'=>array('view', 'id'=>$model->pro_id)),
	array('label'=>'Manage Products', 'url'=>array('admin')),
);
?>

<h1>Sửa sản phẩm</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>