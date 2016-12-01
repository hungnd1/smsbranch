<?php
/* @var $this HistoryContactController */
/* @var $model HistoryContact */

$this->breadcrumbs=array(
	'History Contacts'=>array('index'),
	$model->history_id=>array('view','id'=>$model->history_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List HistoryContact', 'url'=>array('index')),
	array('label'=>'Create HistoryContact', 'url'=>array('create')),
	array('label'=>'View HistoryContact', 'url'=>array('view', 'id'=>$model->history_id)),
	array('label'=>'Manage HistoryContact', 'url'=>array('admin')),
);
?>

<h1>Update HistoryContact <?php echo $model->history_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>