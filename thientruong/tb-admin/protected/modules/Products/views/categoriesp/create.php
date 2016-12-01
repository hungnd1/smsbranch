<?php
/* @var $this CategoriespController */
/* @var $model Categoriesp */

$this->breadcrumbs=array(
	'Categoriesp'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Categoriesp', 'url'=>array('index')),
	array('label'=>'Manage Categoriesp', 'url'=>array('admin')),
);
?>

<h1>Danh mục sản phẩm</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>