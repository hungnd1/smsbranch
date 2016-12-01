<?php
/* @var $this HistoryController */
/* @var $model History */

$button = '';
$this->renderPartial('/site/heade_content',array(
        'title'=>'Nhật ký gửi SMS',
        'content_left'=>$button
));

Yii::app()->clientScript->registerScript('Tìm kiếm', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#history-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

?>
<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'history-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		array(
                    'name'=>'history_campaingname',
                    'type'=>'raw',
                    'value'=>function($data){
                        echo '<a href="'.$this->createUrl("view",array("id"=>$data->history_id)).'">'.$data->history_campaingname.'</a>';
                    },
                ),
		array(
                    'name'=>'history_type',
                    'type'=>'raw',
                    'value'=>function($data){
                       $SmsType_arr = PrSystemValueKey::model()->getSysVal('SmsType');
                       if($data->history_type)
                            echo $SmsType_arr[$data->history_type];
                       else
                           echo "";
                    }       
                ),  
		array(
                    'name'=>'history_brand_id',
                    'type'=>'raw',
                    'value'=>function($data){
                        echo Brandname::model()->findByPk($data->history_brand_id)->brandname;
                    }     
                ),                           
		array(
                    'name'=>'history_startdate',
                    'type'=>'raw',
                    'value'=>'$data->history_startdate',
                    'headerHtmlOptions'=>array('style'=>'width:120px;text-align:center'),  
                ),  
		array(
                    'name'=>'history_total',
                    'type'=>'raw',
                    'value'=>'$data->history_total',
                    'filter'=> CHtml::activeTextField($model, 'history_total',array('class'=>'span1')),
                    'htmlOptions'=>array('style'=>'text-align:center'),
                    'headerHtmlOptions'=>array('style'=>'width:80px;text-align:center'),
                ),
		array(
                    'header'=>'Trạng thái',
                    'name'=>'history_status',
                    'type'=>'raw',
                    'value'=>'PrSystemValueKey::model()->getSysVal("Trangthai_sms")[$data->history_status]',
                    'headerHtmlOptions'=>array('style'=>'width:120px;'),
                ),      
		array(
                    'name'=>'member_createby',
                    'type'=>'raw',
                    'value'=>'MemberProfile::model()->getFullname($data->member_createby)',
                    'headerHtmlOptions'=>array('style'=>'width:120px;'),
                ), 
                array(
                    'name'=>'send_schedule',
                    'type'=>'raw',
                    'value'=>'($data->status_schudule) ? $data->send_schedule : ""',
                    'headerHtmlOptions'=>array('style'=>'width:120px;'),
                ),   
		array(
                    'class'=>'bootstrap.widgets.TbButtonColumn',
                    'template'=>'{view}{delete}'
		),
	),
));?>
