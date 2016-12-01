<?php
/* @var $this BrandnameController */
/* @var $model Brandname */

//$this->breadcrumbs=array(
//	'Brandnames'=>array('index'),
//	$model->brand_id=>array('view','id'=>$model->brand_id),
//	'Update',
//);
//
//$this->menu=array(
//	array('label'=>'List Brandname', 'url'=>array('index')),
//	array('label'=>'Create Brandname', 'url'=>array('create')),
//	array('label'=>'View Brandname', 'url'=>array('view', 'id'=>$model->brand_id)),
//	array('label'=>'Manage Brandname', 'url'=>array('admin')),
//);
$button = '';
$this->renderPartial('/site/heade_content',array(
        'title'=>'Chỉnh sửa Brandname',
        'content_left'=>$button
));
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>