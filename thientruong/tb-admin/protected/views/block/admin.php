<?php
/* @var $this BlockController */
/* @var $model Block */

$this->breadcrumbs=array(
	'Blocks'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Block', 'url'=>array('index')),
	array('label'=>'Create Block', 'url'=>array('create')),
);
?>

<h1>Quản lý khối</h1>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'block-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
                    'name'=>'block_logo',
                    'type'=>'raw',
                   'value'=>function($data){
                        if($data->block_logo)
                            return '<img height="80" style="height:80px;" src="'.Yii::app()->baseUrl.'/uploads/'.$data->block_logo.'" alt="logo" />';
                        else return"";
                   }
                ),
                array(
                    'name'=>'block_footer',
                    'type'=>'raw',
                    'value'=>'$data->block_footer'
                ),
                array(
                    'name'=>'block_footer_en',
                    'type'=>'raw',
                    'value'=>'$data->block_footer_en'
                ),     
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                                            'template'=>'{update}'
		),
	),
)); ?>
