<?php
/* @var $this TemplateSmsController */
/* @var $model TemplateSms */
/* @var $form CActiveForm */
?>

<div class="form">
<?php 
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'template-sms-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
       <div >
            
		<?php echo $form->labelEx($model,'template_name'); ?>
		<?php echo $form->textField($model,'template_name',array('max'=>255,'class'=>'span5')); ?>
		<?php echo $form->error($model,'template_name'); ?>
	</div>
        <div>
            <div  style="width: 45%;float: left">

                    <?php echo $form->labelEx($model,'template_content'); ?>
                <input hidden="true" id="insertPattern" type="button" value="insert pattern" />
                    <?php echo $form->textArea($model,'template_content',array('rows'=>6, 'cols'=>50,'class'=>'span5')); ?>
                    <?php echo $form->error($model,'template_content'); ?>
            </div>
            <div style="float: left; width: 55%;">
                <p>Thêm nội dung tin nhắn:</p>
                
                <table>
                    <tr>
                        <?php
                        $i=0;
                        foreach(TBApplication::listVariableContact() as $data){
                            $i++;
                        ?>
                        <td style="padding-bottom: 20px;"><input class="btn" style="margin-right: 30px;border-radius: 12px;padding: 0 15px;" type="button" id="" value="<?php echo $data['description'];?>" onclick= "insertEmoticonAtTextareaCursor('insertPattern','<?php echo $data['name'] ?>')"/></td>
                        <?php
                            if($i%5==0)
                                echo '</tr><tr>';
                        }
                        ?>
                    </tr>
                </table>
                <p style="color: #666666;font-size: 13px;">Hệ thống sẽ hiện thị thông tin của 1 người tương ứng với giá trị bên trên.<br>ví dụ: Tên = "Nguyễn văn thông", Số diện thoại: "0987654", ...</p>
            </div>
        </div>

        <div class="form-actions" style="clear: both;">
            <?php $this->widget('bootstrap.widgets.TbButton',array(
                'buttonType'=>'submit',
                'type'=>'primary',
                'label'=>$model->isNewRecord ? 'Thêm' : 'Sửa',
                'icon'=>'icon-ok',
                'ajaxOptions'=>array(
                    'type'=>'POST',
                ),
            )); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>

    
function insertEmoticonAtTextareaCursor(ID,text) {
    ID="insertPattern";
    var txtarea = $("#"+ID).next('textArea')[0];
    var scrollPos = txtarea.scrollTop;
    var strPos = 0;
    var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ? 
    "ff" : (document.selection ? "ie" : false ) );
    if (br == "ie") { 
        txtarea.focus();
        var range = document.selection.createRange();
        range.moveStart ('character', -txtarea.value.length);
        strPos = range.text.length;
    }
    else if (br == "ff") strPos = txtarea.selectionStart;
    
    var front = (txtarea.value).substring(0,strPos); 
    var back = (txtarea.value).substring(strPos,txtarea.value.length); 
    txtarea.value=front+text+back;
    strPos = strPos + text.length;
    if (br == "ie") { 
        txtarea.focus();
        var range = document.selection.createRange();
        range.moveStart ('character', -txtarea.value.length);
        range.moveStart ('character', strPos);
        range.moveEnd ('character', 0);
        range.select();
    }
    else if (br == "ff") {
        txtarea.selectionStart = strPos;
        txtarea.selectionEnd = strPos;
        txtarea.focus();
    }
    txtarea.scrollTop = scrollPos;
}
    
</script>
    