<?php
/* @var $this DefaultController */
/* @var $systemValueModel PrSystemValueKey */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pr-system-value-key-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
        'id'=>'gridview_system_key_value',
        'type'=>'striped bordered condensed',
        'dataProvider'=>$systemValueModel->search(),
        'template'=>"{items}",
        'columns'=>array(
            array(
                'header'=>'#',
                'type'=>'raw',
                'value'=>'$data->pr_primary_key',
            ),
            array(
                'class' => 'editable.EditableColumn',
                'header'=>'Title',
                'name'=>'pr_system_title',
                'type'=>'raw',
                'value'=>'$data->pr_system_title',
                'editable' => array(
                       'url'        => $this->createUrl('updateLineSystemValueKey'),
                       'placement'  => 'right',
                       'inputclass' => 'span3',
                     ),
                'htmlOptions'=>array('style'=>'width:250px;'),
                'footer'=> CHtml::textField('pr_system_title','',array()),
            ),
            array(
                'class' => 'editable.EditableColumn',
                'header'=>'Values',
                'type'=>'raw',
                'name'=>'pr_system_value_key',
                'value'=>'$data->pr_system_value_key',
                'editable'=>array(
                        'type'      =>'textarea',
                        'url'       =>$this->createUrl('updateLineSystemValueKey'),
                        'placement' =>'right',
                        'inputclass'=>'span3',
//                        'onShown' => 'js: function() {
//                            var $tip = $(this).data("editableContainer").tip();
//                            $tip.find("textarea").val("123");
//                        }'
                    ),
                'footer'=> CHtml::textArea('pr_system_value_key','',array('cols'=>'70','rows'=>'1')),

            ),
            array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'template' => '{delete}',
                'deleteButtonUrl'=>'Yii::app()->createUrl("/prSystems/default/deleteLineSystemValueKey", array("id" => $data->pr_primary_key))',
                'htmlOptions'=>array('style'=>'width: 50px;text-align: center;'),
                'footer'=> CHtml::button('Add',array('name'=>'AddLineSystemValueKey','onclick'=>'AjaxAddLineSystemKeyValue();')),
            ),
        ),
    )); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
    function AjaxAddLineSystemKeyValue()
    {
        var data = $('pr-system-value-key-form').serialize();
        var pr_system_title = $('#pr_system_title').val();
        var pr_system_value_key = $('#pr_system_value_key').val();
        $.ajax({
            type:'POST',
            url:'<?php echo $this->createUrl('addLineSystemValueKey'); ?>',
            data:{pr_system_title:pr_system_title,pr_system_value_key:pr_system_value_key},
            beforeSend: function(data)
            {
                //code..
            },
            success:function(response)
            {
                $.fn.yiiGridView.update('gridview_system_key_value');
            },
            error: function(data){
                //code...
            }
        });
    }
</script>