<?php
/* @var $this TemplateSmsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Template Sms',
);

$this->menu=array(
	array('label'=>'Create TemplateSms', 'url'=>array('create')),
	array('label'=>'Manage TemplateSms', 'url'=>array('admin')),
);
?>

<h1>Template Sms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
