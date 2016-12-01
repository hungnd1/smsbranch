<?php
/* @var $this ContactController */
/* @var $model Contact */

$this->breadcrumbs=array(
	'Contacts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Contact', 'url'=>array('index')),
	array('label'=>'Create Contact', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('Tìm kiếm', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#contact-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Contacts</h1>

<?php  echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php  $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div> <!--search-form--> 

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'contact-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'contact_id',
                array(
                    'class' => 'editable.EditableColumn',
                    'header'=>'Description',
                    'type'=>'raw',
                    'name'=>'contact_hoten',
                    'value'=>'$data->contact_hoten',
                    'footer'=>  CHtml::textArea("contact_hoten", "", array('cols'=>'70','rows'=>'1')),
                    'editable'=>array(
                            'type'      =>'textarea',
                            'url'       =>$this->createUrl('updateLineRoles'),
                            'placement' =>'right',
                            'inputclass'=>'span3',
                        ),
                ),
                array(
                    'class' => 'editable.EditableColumn',
                    'header'=>'Description',
                    'type'=>'raw',
                    'name'=>'contact_phone',
                    'value'=>'$data->contact_phone',
                    'footer'=>  CHtml::textArea("contact_phone", "", array('cols'=>'70','rows'=>'1')),
                    'editable'=>array(
                            'type'      =>'textarea',
                            'url'       =>$this->createUrl('updateLineRoles'),
                            'placement' =>'right',
                            'inputclass'=>'span3',
                        ),
                ),
                array(
                    'class' => 'editable.EditableColumn',
                    'header'=>'Description',
                    'type'=>'raw',
                    'name'=>'contact_address',
                    'value'=>'$data->contact_address',
                    'footer'=>  CHtml::textArea("contact_address", "", array('cols'=>'70','rows'=>'1')),
                    'editable'=>array(
                            'type'      =>'textarea',
                            'url'       =>$this->createUrl('updateLineRoles'),
                            'placement' =>'right',
                            'inputclass'=>'span3',
                        ),
                ),
                array(
                    'class' => 'editable.EditableColumn',
                    'header'=>'Description',
                    'type'=>'raw',
                    'name'=>'contact_email',
                    'value'=>'$data->contact_email',
                    'footer'=>  CHtml::textArea("contact_email", "", array('cols'=>'70','rows'=>'1')),
                    'editable'=>array(
                            'type'      =>'textarea',
                            'url'       =>$this->createUrl('updateLineRoles'),
                            'placement' =>'right',
                            'inputclass'=>'span3',
                        ),
                ),
                array(
                    'class' => 'editable.EditableColumn',
                    'header'=>'Description',
                    'type'=>'raw',
                    'name'=>'contact_company',
                    'value'=>'$data->contact_company',
                    'footer'=>  CHtml::textArea("contact_company", "", array('cols'=>'70','rows'=>'1')),
                    'editable'=>array(
                            'type'      =>'textarea',
                            'url'       =>$this->createUrl('updateLineRoles'),
                            'placement' =>'right',
                            'inputclass'=>'span3',
                        ),
                ),
                array(
                    'class' => 'editable.EditableColumn',
                    'header'=>'Description',
                    'type'=>'raw',
                    'name'=>'contact_birthday',
                    'value'=>'$data->contact_birthday',
                    'footer'=>  CHtml::textArea("contact_birthday", "", array('cols'=>'70','rows'=>'1')),
                    'editable'=>array(
                            'type'      =>'textarea',
                            'url'       =>$this->createUrl('updateLineRoles'),
                            'placement' =>'right',
                            'inputclass'=>'span3',
                        ),
                ),
                array(
                    'class' => 'editable.EditableColumn',
                    'header'=>'Description',
                    'type'=>'raw',
                    'name'=>'contact_gender',
                    'value'=>'$data->contact_gender',
                    'footer'=>  CHtml::textArea("contact_gender", "", array('cols'=>'70','rows'=>'1')),
                    'editable'=>array(
                            'type'      =>'textarea',
                            'url'       =>$this->createUrl('updateLineRoles'),
                            'placement' =>'right',
                            'inputclass'=>'span3',
                        ),
                ),
                array(
                    'class' => 'editable.EditableColumn',
                    'header'=>'Description',
                    'type'=>'raw',
                    'name'=>'contact_notes',
                    'value'=>'$data->contact_notes',
                    'footer'=>  CHtml::textArea("contact_notes", "", array('cols'=>'70','rows'=>'1')),
                    'editable'=>array(
                            'type'      =>'textarea',
                            'url'       =>$this->createUrl('updateLineRoles'),
                            'placement' =>'right',
                            'inputclass'=>'span3',
                        ),
                ),
                array(
                    'class'=>'bootstrap.widgets.TbButtonColumn',
                    'template'=>'{delete}',
                    'deleteButtonUrl'=>'Yii::app()->createUrl("prSystems/default/deleteLineRoles", array("id"=>$data->pr_primary_key))',
                    'htmlOptions'=>array('style'=>'width:50px;text-align:center'),
                    'footer'=>  CHtml::button('Add', array('onclick'=>'AjaxAddLineRoles();return false;')),
                )
	),
)); ?>
