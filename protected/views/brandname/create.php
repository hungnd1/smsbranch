<?php
/* @var $this BrandnameController */
/* @var $model Brandname */

//$this->breadcrumbs=array(
//	'Brandnames'=>array('index'),
//	'Create',
//);
//
//$this->menu=array(
//	array('label'=>'List Brandname', 'url'=>array('index')),
//	array('label'=>'Manage Brandname', 'url'=>array('admin')),
//);
$button = '';
$this->renderPartial('/site/heade_content',array(
        'title'=>'Tạo mới Brandname',
        'content_left'=>$button
));
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>