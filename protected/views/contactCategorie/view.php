<?php
/* @var $this ContactCategorieController */
/* @var $model ContactCategorie */

?>
<div id="lb-container-header">
    <div style="margin-left: -10px" class="lb-header-right">
        <h3>
            <?php
             $this->widget('editable.EditableField', array(
                'type'      => 'text',
                'model'     => $model,
                'attribute' => 'category_name',
                'url'       => $this->createUrl('contactCategorie/UpdateLineContactCategoty'), 
                'placement' => 'right',
            ));
            ?>
        </h3>
    </div>
    <div class="lb-header-left">
        <a class="btn btn-default" href="<?php echo $this->createUrl('admin'); ?>" role="button"><i class="icon-share-alt"></i>Quay lại</a>
    </div>
</div>

<div class="form-group highlight">
    <form method="post" enctype="multipart/form-data" id="form_contact">
        <?php echo CHtml::label('Nhập dữ liệu', 'contact_excel') ?>
        <?php echo CHtml::fileField('file') ?>
            <?php
            $this->widget('bootstrap.widgets.TbButton',array(
                        'label'=>'Nhập dữ liệu',
                        'type'=>'none',
                        'size'=>'normal',
                        'encodeLabel'=>false,
                        'icon'=>'icon-arrow-up',
                        'buttonType'=>'button',
                        'htmlOptions'=> array('onclick' => 'ImportDataExcel();return false;')
            ));
        ?>
        <?php
            $this->widget('bootstrap.widgets.TbButton',array(
                        'label'=>'Tải file mẫu',
                        'type'=>'none',
                        'size'=>'normal',
                        'encodeLabel'=>false,
                        'icon'=>'icon-arrow-down',
                        'buttonType'=>'link',
                        'url'=>$this->createUrl('DownloadTemplate')
            ));
        ?>
        </form>
</div>
<div id="grid-date-contact">
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'=>'contact-grid',
            'dataProvider'=>$modelContact->search(),
            'filter'=>$modelContact,
            'columns'=>array(
                    array(
                        'class' => 'editable.EditableColumn',
                        'type'=>'raw',
                        'name'=>'contact_ho',
                        'value'=>'$data->contact_ho',
                        'footer'=>  CHtml::textField("contact_ho", "", array('class'=>'span1')),
                        'editable'=>array(
                                'type'      =>'text',
                                'url'       =>$this->createUrl('Contact/UpdateLineContact'),
                                'placement' =>'right',
                                'inputclass'=>'span2',
                            ),
                    ),
                    array(
                        'class' => 'editable.EditableColumn',
                        'type'=>'raw',
                        'name'=>'contact_ten',
                        'value'=>'$data->contact_ten',
                        'footer'=>  CHtml::textField("contact_ten", "", array('class'=>'span1')),
                        'editable'=>array(
                                'type'      =>'text',
                                'url'       =>$this->createUrl('Contact/UpdateLineContact'),
                                'placement' =>'right',
                                'inputclass'=>'span2',
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
                        'footer'=>  CHtml::button('Thêm', array('onclick'=>'AjaxAddLineContact();return false;')),
                    )
            ),
    )); 
    ?>
</div>
<script data-jsfiddle="common" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        var from_date = $("#contact_birthday").datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function(ev) {
            from_date.hide();
        }).data('datepicker');	
    });

    function AjaxAddLineContact()
    {

        var category_id = '<?php echo $model->category_id; ?>';
        var ho = $('#contact_ho').val();
        var ten = $('#contact_ten').val();
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
            data:{contact_ho:ho,contact_ten:ten,contact_phone:phone,contact_address:address,contact_birthday:birthday,
                contact_email:email,contact_company:company,contact_gender:gender,contact_notes:notes,category_id:category_id},
            success:function(data){
                //$.fn.yiiGridView.update("contact-grid");
                location.reload();
            }
        });
    }
    function ImportDataExcel()
    {
       var file = $('#file').val();
       if(file=="")
       {
           alert("Bạn chưa chọn file exel");
           return false;
       }
       var fd = new FormData(document.getElementById("form_contact"));
        $.ajax({
          url: "<?php echo $this->createUrl('ImportDataExel',array('category_id'=>$model->category_id)); ?>",
          type: "POST",
          data: fd,
          enctype: 'multipart/form-data',
          processData: false,  // tell jQuery not to process the data
          contentType: false,  // tell jQuery not to set contentType
          dataType: "json", 
        }).done(function( data ) {
            $.fn.yiiGridView.update("contact-grid");
            
        });
    }
    
    function searchDate()
    {
        var from_date=$('#fromDate').val();
        var to_date=$('#toDate').val();
        //var category_id = '<?php echo $model->category_id; ?>';
        $.ajax({
          url: "<?php echo $this->createUrl('view',array('id'=>$model->category_id)); ?>",
          type: "POST",
          data: {form_date:from_date, to_date:to_date},
        }).done(function( data ) {
            $.fn.yiiGridView.update("contact-grid");
        });
    }
</script>