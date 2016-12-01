<?php
/* @var $this BrandnameController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Brandnames',
);

$this->menu=array(
	array('label'=>'Create Brandname', 'url'=>array('create')),
	array('label'=>'Manage Brandname', 'url'=>array('admin')),
);
?>

<h1>Brandnames</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
