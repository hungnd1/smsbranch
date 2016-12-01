<?php
/* @var $this ContactCategorieController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Contact Categories',
);

$this->menu=array(
	array('label'=>'Create ContactCategorie', 'url'=>array('create')),
	array('label'=>'Manage ContactCategorie', 'url'=>array('admin')),
);
?>

<h1>Contact Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
