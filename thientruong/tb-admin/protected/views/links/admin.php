<?php
/* @var $this LinksController */
/* @var $model Links */

$this->breadcrumbs=array(
	'Links'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Links', 'url'=>array('index')),
	array('label'=>'Create Links', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#links-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Liên kết</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridview', array(
	'id'=>'links-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                    'name'=>'link_id',
                    'filter'=>FALSE,
                ),
		array(
                   'name'=>'link_image',
                   'type'=>'raw',
                   'filter'=>FALSE,
                   'value'=>function($data){
                        return '<img height="80" style="height:80px;" src="'.Yii::app()->baseUrl.'/uploads/'.$data->link_image.'" alt="'.$data->link_image.'" />';
                   }
                ),
                array(
                    'name'=>'link_description',
                    'type'=>'raw',
                    'value'=>'$data->link_description'
                ),
		'link_url',      
                array(
                    'type'=>'raw',
                    'name'=>'link_status',
                    'filter'=>FALSE,
                    'value'=>  function ($data){
                        if($data->link_status==0)
                            return '<a href="#" onclick="updatePostStatus('.$data->link_id.',1)"><i class="icon-remove"></i></a>';
                        else
                            return '<a href="#" onclick="updatePostStatus('.$data->link_id.',0)"><i class="icon-ok"></i></a>';
                    },
                    'htmlOptions'=>array(
                        'style'=>'text-align:center;width:80px',
                    ),
                ),    
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'headerHtmlOptions'=>array(
                            'style'=>'text-align:center;width:80px',
                        ),
		),
	),
)); ?>
<script type="text/javascript">
    function updatePostStatus(id,status){
        $.ajax({
            type:'POST',
            url:'<?php echo $this->createUrl('updateStatus'); ?>',
            data:{id:id,status:status},
            success:function(data){
                $.fn.yiiGridView.update("links-grid");
            }
        });
    }
</script>