<?php
/* @var $this LinksController */
/* @var $model Links */

$this->breadcrumbs=array(
	'Links'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Links', 'url'=>array('index')),
	array('label'=>'Manage Links', 'url'=>array('admin')),
);
?>

<h1>Thêm liên kết</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>