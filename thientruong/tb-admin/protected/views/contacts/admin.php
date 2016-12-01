<?php
/* @var $this ContactsController */
/* @var $model Contacts */

$this->breadcrumbs=array(
	'Contacts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Contacts', 'url'=>array('index')),
	array('label'=>'Create Contacts', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#contacts-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="ad_header">
    <div class="ad-header-back">
        <a href="#" onclick="goBack(); return false;"><i class="icontb-left"></i></a>
        <a href="#" onclick="reload(); return false;"><i class="icontb-reload"></i></a>
        <a href="#" onclick="goNext(); return false;"><i class="icontb-right"></i></a>
    </div>
    <div class="ad-header-title"><h1><?php echo YII::t('lang','Liên hệ'); ?></h1></div>
</div>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridview', array(
	'id'=>'contacts-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'contact_id',
		'contact_title',
		'contact_phone',
		'contact_content',
		'contact_email',
		'contact_address',
                'contact_date',
                array(
                    'type'=>'raw',
                    'name'=>'contact_status',
                    'value'=>function($data){
                        echo CHtml::dropDownList('contact_status', $data->contact_status, Contacts::getStatusContact(),
                                array('class'=>'span2','onchange'=>"updateStatusContact(".$data->contact_id.",this.value); return false;"));
                    },
                    'htmlOptions'=>array('width'=>'70'),
                ),
		/*
		'contact_order',
		'contact_status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<script type="text/javascript">
    function updateStatusContact(contact_id,contact_status){
        $('#content').block();
        $.ajax({
            url:'<?php echo $this->createUrl('UpdateStatus') ?>',
            type:'POST',
            data:{contact_id:contact_id,contact_status:contact_status},
            success:function(){
                $.fn.yiiGridView.update("contacts-grid");
                $('#content').unblock();
            }
        });
    }
</script>