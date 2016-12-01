<?php
/*
 * @var $this DefaultController
 * @var $rolesModel
 */
?>
<div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pr-system-value-key-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<?php
    $this->widget('bootstrap.widgets.TbGridView',array(
                'id'=>'gridview_roles',
                'type'=>'striped bordered condensed',
                'dataProvider'=>$rolesModel->search(),
                'template'=>"{items}",
                'columns'=>
                    array(
                        array(
                            'header'=>'#',
                            'type'=>'raw',
                            'value'=>'$data->pr_primary_key',
                        ),
                        array(
                            'class' => 'editable.EditableColumn',
                            'header'=>'Name',
                            'type'=>'raw',
                            'name'=>'pr_roles_name',
                            'value'=>'$data->pr_roles_name',
                            'footer'=> CHtml::textField("role_name", "", array()),
                            'editable' => array(
                                   'url'        => $this->createUrl('updateLineRoles'),
                                   'placement'  => 'right',
                                   'inputclass' => 'span3',
                                 ),
                        ),
                        array(
                            'class' => 'editable.EditableColumn',
                            'header'=>'Description',
                            'type'=>'raw',
                            'name'=>'pr_roles_description',
                            'value'=>'$data->pr_roles_description',
                            'footer'=>  CHtml::textArea("role_description", "", array('cols'=>'70','rows'=>'1')),
                            'editable'=>array(
                                    'type'      =>'textarea',
                                    'url'       =>$this->createUrl('updateLineRoles'),
                                    'placement' =>'right',
                                    'inputclass'=>'span3',
                                ),
                        ),
                        array(
                          'header'=>'Status',
                          'type'=>'raw',
                          'value'=>'($data->pr_roles_status==1)
                                            ? "<a href=\'#\' onclick=\'ajaxUpdateStatusRoles(".$data->pr_primary_key.");return false;\' rel=\'tooltip\' value=\'$data->pr_roles_status\' data-original-title=\'Show\'><i class=\'icon-ok\'></i></a>"
                                            : "<a href=\'#\' onclick=\'ajaxUpdateStatusRoles(".$data->pr_primary_key.");return false;\' rel=\'tooltip\' value=\'$data->pr_roles_status\' data-original-title=\'Hide\'><i class=\'icon-remove\'></i></a>"',
                          'htmlOptions'=>array('style'=>'width:50px;text-align:center;'),
                        ),
                        array(
                            'class'=>'bootstrap.widgets.TbButtonColumn',
                            'template'=>'{delete}',
                            'deleteButtonUrl'=>'Yii::app()->createUrl("prSystems/default/deleteLineRoles", array("id"=>$data->pr_primary_key))',
                            'htmlOptions'=>array('style'=>'width:50px;text-align:center'),
                            'footer'=>  CHtml::button('Add', array('onclick'=>'AjaxAddLineRoles();return false;')),
                        )
                    )
            ));
?>
<?php $this->endWidget(); ?>    
</div>
<script>
    function AjaxAddLineRoles()
    {
        var role_name = $('#role_name').val();
        var role_description = $('#role_description').val();
        $.ajax({
            type:'POST',
            url:'<?php echo $this->createUrl('addLineRoles'); ?>',
            data:{role_name:role_name,role_description:role_description},
            beforeSend:function(data)
            {
                //code..
            },
            success: function(response)
            {
                $.fn.yiiGridView.update("gridview_roles");
            },
            error: function(data)
            {
                //code...
            }
        });
    }
    function ajaxUpdateStatusRoles(value)
    {
        $.ajax({
            type:'POST',
            url:'<?php echo $this->createUrl('updateLineStatusRoles'); ?>',
            data:{id:value},
            beforeSend:function(data)
            {
                //code...
            },
            success: function(response)
            {
                $.fn.yiiGridView.update("gridview_roles");
            },
            error: function(data)
            {
                //Code...
            }
        });
    }
    
</script>

