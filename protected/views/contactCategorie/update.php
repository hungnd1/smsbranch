<?php
/* @var $this ContactCategorieController */
/* @var $model ContactCategorie */

$this->breadcrumbs=array(
	'Contact Categories'=>array('index'),
	$model->category_id=>array('view','id'=>$model->category_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ContactCategorie', 'url'=>array('index')),
	array('label'=>'Create ContactCategorie', 'url'=>array('create')),
	array('label'=>'View ContactCategorie', 'url'=>array('view', 'id'=>$model->category_id)),
	array('label'=>'Manage ContactCategorie', 'url'=>array('admin')),
);
?>

<h1>Update ContactCategorie <?php echo $model->category_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>