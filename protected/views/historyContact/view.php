<?php
/* @var $this HistoryContactController */
/* @var $model HistoryContact */

$this->breadcrumbs=array(
	'History Contacts'=>array('index'),
	$model->history_id,
);

$this->menu=array(
	array('label'=>'List HistoryContact', 'url'=>array('index')),
	array('label'=>'Create HistoryContact', 'url'=>array('create')),
	array('label'=>'Update HistoryContact', 'url'=>array('update', 'id'=>$model->history_id)),
	array('label'=>'Delete HistoryContact', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->history_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HistoryContact', 'url'=>array('admin')),
);
?>

<h1>View HistoryContact #<?php echo $model->history_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'history_contact_id',
		'history_id',
		'contact_id',
		'history_contact_ho',
		'history_contact_ten',
		'history_contact_phone',
		'history_contact_birthday',
		'history_contact_gender',
		'history_contact_address',
		'history_contact_email',
		'history_contact_company',
		'history_contact_notes',
		'history_contact_status',
	),
)); ?>
