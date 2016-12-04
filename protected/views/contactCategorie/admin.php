<?php
/* @var $this ContactCategorieController */
/* @var $model ContactCategorie */

$button = '<a class="btn btn-default" href="'.$this->createUrl('create').'" role="button"><i class="icon-plus"></i>Thêm danh bạ</a>';
$this->renderPartial('/site/heade_content',array(
    'title'=>'Danh bạ',
    'content_left'=>$button
)); 

Yii::app()->clientScript->registerScript('Tìm kiếm', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#contact-categorie-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php if(Members::model()->getRoleSystem(YII::app()->user->id)!=Members::KHACHHANG_ADMIN && Members::model()->getRoleSystem(YII::app()->user->id)!=Members::KHACHHANG_DAILY && Members::model()->getRoleSystem(YII::app()->user->id)!=Members::KHACHHANGDAILY_CAPDUOI) { ?>
<div class="search-form" style="display:block">
<?php  $this->renderPartial('_search'); ?>
</div> <!--search-form -->
<?php } ?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'contact-categorie-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                    'name'=>'category_name',
                    'type'=>'raw',
                    'value'=>function($data){
                        echo '<a href="'.YII::app()->createUrl("ContactCategorie/view",array("id"=>$data->category_id)).'">'.$data->category_name.'</a>';
                    },
                    'filter'=> CHtml::activeTextField($model, 'category_name',array('style'=>'width:356px;')),
                ),
                array(
                    'name'=>'category_createby',
                    'type'=>'raw',
                    'value'=>'($data->category_createby ? MemberProfile::model()->getFullname($data->category_createby) : "")',
                    'filter'=>false
                ),
                array(
                    'class'=>'bootstrap.widgets.TbButtonColumn',
                    'template'=>'{view}{delete}'
                )
	),
)); ?>
