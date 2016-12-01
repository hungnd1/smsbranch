<?php
/* @var $this HistoryContactController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'History Contacts',
);

$this->menu=array(
	array('label'=>'Create HistoryContact', 'url'=>array('create')),
	array('label'=>'Manage HistoryContact', 'url'=>array('admin')),
);
?>

<h1>History Contacts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
