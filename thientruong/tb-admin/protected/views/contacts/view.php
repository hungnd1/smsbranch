<?php
/* @var $this ContactsController */
/* @var $model Contacts */

$this->breadcrumbs=array(
	'Contacts'=>array('index'),
	$model->contact_id,
);

$this->menu=array(
	array('label'=>'List Contacts', 'url'=>array('index')),
	array('label'=>'Create Contacts', 'url'=>array('create')),
	array('label'=>'Update Contacts', 'url'=>array('update', 'id'=>$model->contact_id)),
	array('label'=>'Delete Contacts', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->contact_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Contacts', 'url'=>array('admin')),
);
?>

<h1>View Contacts #<?php echo $model->contact_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'contact_id',
		'contact_title',
		'contact_phone',
		'contact_content',
		'contact_email',
		'contact_address',
		'contact_order',
		'contact_status',
	),
)); ?>
