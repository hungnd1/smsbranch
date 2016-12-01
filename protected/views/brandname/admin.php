<?php
/* @var $this BrandnameController */
/* @var $model Brandname */

//$this->breadcrumbs=array(
//	'Brandnames'=>array('index'),
//	'Manage',
//);
//
//$this->menu=array(
//	array('label'=>'List Brandname', 'url'=>array('index')),
//	array('label'=>'Create Brandname', 'url'=>array('create')),
//);
$button="";
if(Members::model()->getRoleSystem(YII::app()->user->id)==Members::ADMIN)
    $button = '<a class="btn btn-default" href="'.$this->createUrl('create').'" role="button"><i class="icon-plus"></i>Thêm Brandname</a>';
$this->renderPartial('/site/heade_content',array(
    'title'=>'BrandName',
    'content_left'=>$button
)); 

Yii::app()->clientScript->registerScript('Tìm kiếm', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#brandname-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php //if(Members::model()->getRoleSystem(YII::app()->user->id)!=Members::KHACHHANG) { ?>
<!--<div class="search-form">-->
<?php //$this->renderPartial('_search',array(
	//'model'=>$model,
//)); ?>
<!--</div> search-form -->
<?php //} ?>
<?php
    $is_admin =false;
    if(Members::model()->getRoleSystem(YII::app()->user->id)==Members::ADMIN)
        $is_admin = TRUE;
    $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'brandname-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
		'brandname',
                array(
                    'name'=>'brand_member',
                    'type'=>'raw',
                    'value'=>'MemberProfile::model()->getFullname($data->brand_member)'
                ),
                array(
                    'name'=>'brand_balance',
                    'type'=>'raw',
                    'value'=>'number_format($data->brand_balance,0)." VND"'
                ),
                array(
                    'name'=>'brand_status',
                    'type'=>'raw',
                    'value'=>'PrSystemValueKey::model()->getSysVal("Trangthai_brand")[$data->brand_status]',
                ),

		array(
                    'class'=>'bootstrap.widgets.TbButtonColumn',
                    'template'=>'{update}{delete}',
                    'buttons'=>array(
                                    'update'=>array(
                                                    'visible'=>"$is_admin",
                                            ),
                    ),
		),
	),
)); ?>
