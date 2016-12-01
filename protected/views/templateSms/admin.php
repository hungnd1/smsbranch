<?php
/* @var $this TemplateSmsController */
/* @var $model TemplateSms */

$button = '<a class="btn btn-default" href="'.$this->createUrl('templates/create').'" role="button"><i class="icon-plus"></i>Thêm tin nhắn mẫu</a>';
$this->renderPartial('/site/heade_content',array(
        'title'=>'Tin nhắn mẫu',
        'content_left'=>$button
)); 
?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'template-sms-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
                    'name'=>'template_name',
                    'type'=>'raw',
                    'value'=>function($data){
                        echo '<a href="'.$this->createUrl('update',array('id'=>$data->template_id)).'">'.$data->template_name.'</a>';
                    },
                ),
		'template_content',
                array(
                    'name'=>'template_date',
                    'type'=>'raw',
                    'value'=>'date("d-m-Y h:i")',
                ),
                array(
                    'name'=>'template_createby',
                    'type'=>'raw',
                    'value'=>'($data->template_createby ? MemberProfile::model()->getFullname($data->template_createby) : "")',
                    'filter'=>false
                ),
                array(
                    'class'=>'bootstrap.widgets.TbButtonColumn',
                    'template'=>'{update}{delete}'
                )
	))); ?>
