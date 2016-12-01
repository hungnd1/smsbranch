<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'=>'contact-grid',
            'dataProvider'=>$modelContact->search(),
            'filter'=>$modelContact,
            'columns'=>array(
                    array(
                        'class' => 'editable.EditableColumn',
                        'type'=>'raw',
                        'name'=>'contact_hoten',
                        'value'=>'$data->contact_hoten',
                        'footer'=>  CHtml::textField("contact_hoten", "", array('class'=>'span1')),
                        'editable'=>array(
                                'type'      =>'text',
                                'url'       =>$this->createUrl('Contact/UpdateLineContact'),
                                'placement' =>'right',
                                'inputclass'=>'span3',
                            ),
                    ),
                    array(
                        'class' => 'editable.EditableColumn',
                        'type'=>'raw',
                        'name'=>'contact_phone',
                        'value'=>'$data->contact_phone',
                        'footer'=>  CHtml::textField("contact_phone", "", array('class'=>'span1')),
                        'editable'=>array(
                                'type'      =>'text',
                                'url'       =>$this->createUrl('Contact/UpdateLineContact'),
                                'placement' =>'right',
                                'inputclass'=>'span3',
                            ),
                    ),
                    array(
                        'class' => 'editable.EditableColumn',
                        'type'=>'raw',
                        'name'=>'contact_address',
                        'value'=>'$data->contact_address',
                        'footer'=>  CHtml::textField("contact_address", "", array('class'=>'span2')),
                        'editable'=>array(
                                'type'      =>'textarea',
                                'url'       =>$this->createUrl('Contact/UpdateLineContact'),
                                'placement' =>'right',
                                'inputclass'=>'span3',
                            ),
                    ),
                    array(
                        'class' => 'editable.EditableColumn',
                        'type'=>'raw',
                        'name'=>'contact_email',
                        'value'=>'$data->contact_email',
                        'footer'=>  CHtml::textField("contact_email", "", array('class'=>'span1')),
                        'editable'=>array(
                                'type'      =>'text',
                                'url'       =>$this->createUrl('Contact/UpdateLineContact'),
                                'placement' =>'right',
                                'inputclass'=>'span3',
                            ),
                    ),
                    array(
                        'class' => 'editable.EditableColumn',
                        'type'=>'raw',
                        'name'=>'contact_company',
                        'value'=>'$data->contact_company',
                        'footer'=>  CHtml::textField("contact_company", "", array('class'=>'span1')),
                        'editable'=>array(
                                'type'      =>'text',
                                'url'       =>$this->createUrl('Contact/UpdateLineContact'),
                                'placement' =>'right',
                                'inputclass'=>'span3',
                            ),
                    ),
                    array(
                        'class' => 'editable.EditableColumn',
                        'name'  => 'contact_birthday',
                        'headerHtmlOptions' => array('style' => 'width: 100px'),
                        'footer'=>  CHtml::textField("contact_birthday", "", array('class'=>'span1')),
                        'editable' => array(
                            'type'          => 'date',
                            'viewformat'    => 'dd/mm/yyyy',
                            'url'           => $this->createUrl('Contact/UpdateLineContact'),
                            'placement'     => 'right',
                        ) 
                    ),
                    array(
                        'class' => 'editable.EditableColumn',
                        'type'=>'raw',
                        'name'=>'contact_gender',
                        'value'=>'$data->contact_gender',
                        'footer'=>  CHtml::textField("contact_gender", "", array('class'=>'span1')),
                        'editable'=>array(
                                'type'      =>'text',
                                'url'       =>$this->createUrl('Contact/UpdateLineContact'),
                                'placement' =>'right',
                                'inputclass'=>'span3',
                            ),
                    ),
    //                array(
    //                    'class' => 'editable.EditableColumn',
    //                    'type'=>'raw',
    //                    'name'=>'contact_notes',
    //                    'value'=>'$data->contact_notes',
    //                    'footer'=>  CHtml::textField("contact_notes", "",  array('class'=>'span1')),
    //                    'editable'=>array(
    //                            'type'      =>'textarea',
    //                            'url'       =>$this->createUrl('Contact/UpdateLineContact'),
    //                            'placement' =>'right',
    //                            'inputclass'=>'span3',
    //                        ),
    //                ),
                    array(
                        'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{delete}',
                        'deleteButtonUrl'=>'Yii::app()->createUrl("Contact/delete", array("id"=>$data->contact_id))',
                        'htmlOptions'=>array('style'=>'width:50px;text-align:center'),
                        'footer'=>  CHtml::button('Add', array('onclick'=>'AjaxAddLineContact();return false;')),
                    )
            ),
    )); 
    ?>

<script type="text/javascript">
    function AjaxAddLineContact()
    {

        var category_id = '<?php echo $model->category_id; ?>';
        var name = $('#contact_hoten').val();
        var phone = $('#contact_phone').val();
        var address = $('#contact_address').val();
        var birthday = $('#contact_birthday').val();
        var email = $('#contact_email').val();
        var company = $('#contact_company').val();
        var gender = $('#contact_gender').val();
        var notes = $('#contact_notes').val();
        if(phone=="")
        {
            alert("Bạn phải nhập số điện thoại.");
            return false;
        }
        $.ajax({
            type:'POST',
            url:'<?php echo $this->createUrl('Contact/create'); ?>',
            data:{contact_hoten:name,contact_phone:phone,contact_address:address,contact_birthday:birthday,
                contact_email:email,contact_company:company,contact_gender:gender,contact_notes:notes,category_id:category_id},
            success:function(data){
                $.fn.yiiGridView.update("contact-grid");
            }
        });
    }
</script>