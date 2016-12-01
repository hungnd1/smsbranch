<?php
/* @var $this ContactCategorieController */
/* @var $model ContactCategorie */

//$this->breadcrumbs=array(
//	'Contact Categories'=>array('index'),
//	'Create',
//);

//$this->menu=array(
//	array('label'=>'List ContactCategorie', 'url'=>array('index')),
//	array('label'=>'Manage ContactCategorie', 'url'=>array('admin')),
//);
$button = '<a class="btn btn-default" href="'.$this->createUrl('admin').'" role="button"><i class="icon-share-alt"></i>Quay lại</a>';
$this->renderPartial('/site/heade_content',array(
        'title'=>'Tạo danh bạ',
        'content_left'=>$button
));
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>