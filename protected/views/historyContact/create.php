<?php
/* @var $this HistoryContactController */
/* @var $model HistoryContact */

$this->breadcrumbs=array(
	'History Contacts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HistoryContact', 'url'=>array('index')),
	array('label'=>'Manage HistoryContact', 'url'=>array('admin')),
);
?>

<h1>Create HistoryContact</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>