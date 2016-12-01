<?php
/* @var $this HistoryController */
/* @var $model History */
/* @var $form CActiveForm */
?>

<div class="form">

<?php 
$datacontact=array();
$option_type_arr=array();
$modelContent=new TemplateSms;
$allTeamplate = $modelContent->search();

$modelCategoryContact = new ContactCategorie;
$allCategory = $modelCategoryContact->search(false,-1);
$optionCategory='<select id="danhba" class="span5" >';
$optionCategory.='<option value="">Chọn danh bạ</option>';
$arrcontact = array();
foreach ($allCategory->data as $data)
{
    $arrcontact[$data['category_id']]=$data['category_name'];
}
$optionCategory .='</select>';

$optionTemplate='<select id="template" class="span4" onChange="insertContent();return false;">';
$optionTemplate.='<option value="">Chọn template mẫu</option>';
foreach ($allTeamplate->data as $data)
{
    $optionTemplate .='<option value='.$data['template_id'].'>'.$data['template_content'].'</option>';
}
$optionTemplate .='</select>';
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'history-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'history_campaingname'); ?>
		<?php echo $form->textField($model,'history_campaingname',array('size'=>60,'maxlength'=>100,'class'=>'span4')); ?>
		<?php echo $form->error($model,'history_campaingname'); ?>
	</div>
        
	<div class="form-group">
		<?php echo $form->labelEx($model,'history_type'); ?>
		<?php echo $form->dropDownList($model,'history_type',PrSystemValueKey::model()->getSysVal('SmsType'),array('class'=>'span4')); ?>
		<?php echo $form->error($model,'history_type'); ?>
	</div> 

	<div class="form-group">
		<?php echo $form->labelEx($model,'history_brand_id'); ?>
		<?php echo $form->dropDownList($model,'history_brand_id',Brandname::model()->getBrandname(YII::app()->user->id),array('class'=>'span4')); ?>
		<?php echo $form->error($model,'history_brand_id'); ?>
	</div>
        <div class="form-group" >
                <?php echo CHtml::label('Chọn tin nhắn mẫu', 'template') ?>
                <?php echo $optionTemplate;?>

        </div>
  
        <div class="form-group">
            <label for="template">&nbsp;</label>
            <?php echo $form->radioButton($model, 'history_is_schedule',array('value'=>'0','checked'=>'checked','onclick'=>'check_schedule(this.value)'));?> Gửi luôn&nbsp;&nbsp;&nbsp;&nbsp;
            <?php echo $form->radioButton($model, 'history_is_schedule',array('value'=>'1','onclick'=>'check_schedule(this.value)'));?> Đặt lịch gửi
        </div>
        
        <div class="form-group" id="view_send_schedule" style="display: none;">
            <?php echo $form->labelEx($model,'send_schedule'); ?>
            <?php $this->widget ('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker',
                array(
                    'model'=>$model, //Model object
                    'attribute'=>'send_schedule', //attribute name
                    'mode'=>'datetime', //use "time","date" or "datetime" (default)
                    'language'=>'',
                    'options'=>array(
                            'regional'=>'',
                            'timeFormat'=>'hh:mm:ss',
                            'dateFormat'=>'yy-mm-dd'
                        ) // jquery plugin options
                ));
            ?>
        </div>
        
        <div class="div_content" style="overflow: hidden; clear: both;">
            <div style="width: 54%;float: left;">
                <?php echo CHtml::label('Nội dung tin nhắn <span class="required">*</span>  ','template_content',array('style'=>'float:left;margin-right:20px;font-weight:bold')); ?>
                Số ký tự : <span id="lblcount" class="safe" style="color: green; font-weight: bold">0</span> ( Số tin : <span id="counter" class="safe" style="color: green; font-weight: bold">0</span>)
                <input hidden="true" id="insertPattern" type="button" value="insert pattern" />
                <?php echo $form->textArea($modelContent,'template_content',array('rows'=>6, 'cols'=>50,'class'=>'span5','style'=>'width: 506px;','onkeyup'=>'countChar();')); ?>
                <?php echo $form->error($modelContent,'template_content'); ?>
            </div>
            <div class="row" style="width: 46%;float: left;" >
                <br>
                    <table>
                        <tr>
                            <?php
                            $i=0;
                            foreach(TBApplication::listVariableContact() as $data){
                                $i++;
                            ?>
                            <td style="padding-bottom: 20px;"><input class="btn" style="margin-right: 30px;border-radius: 12px;padding: 0 10px; font-size: 12px;" type="button" id="" value="<?php echo $data['description'];?>" onclick= "insertEmoticonAtTextareaCursor('insertPattern','<?php echo $data['name'] ?>')"/></td>
                            <?php
                                if($i%5==0)
                                    echo '</tr><tr>';
                            }
                            ?>
                        </tr>
                    </table>
                    <br>
                    <p style="color: #666666;font-size: 13px;">Hệ thống sẽ hiện thị thông tin của 1 người tương ứng với giá trị bên trên.<br>ví dụ: Tên = "Nguyễn văn thông", Số diện thoại: "0987654", ...</p>

            </div>
        </div>
        <div class="div_content">
            <?php if($type =="contact"){ ?>
            <div class="form-group" style="clear: both;padding-left: 0;">

                    <?php echo CHtml::label('Chọn danh bạ','history_contact',array('style'=>'width: 100px;')); ?>
                    <?php $this->widget('ext.select2.ESelect2',array(
                        'name'=>'history_contact',
                        'data'=>$arrcontact,

                        'htmlOptions'=>array(
                          'multiple'=>'multiple',
                          'class'=>'span6',
                          'style'=>'margin-left:0;',
                            'placeholder'=> "Chọn danh bạ",
                            'onchange' => 'nhapdanhba()'
                        ),
                      )); ?>

            </div>
            <?php }?>
            <?php if($type=="excel"){ ?> 
            <div class="form-group" style="clear: both;">
                        <?php echo CHtml::label('Dữ liệu từ file excel', 'danhba') ?>
                        <?php echo '<input type="file"  style="width: 203px" id="file" name="file">';
                        echo '&nbsp;&nbsp;&nbsp;&nbsp;';
                        ?>
                        <?php
                            $this->widget('bootstrap.widgets.TbButton',array(
                                        'label'=>'Nhập dữ liệu',
                                        'type'=>'none',
                                        'size'=>'normal',
                                        'encodeLabel'=>false,
                                        'icon'=>'icon-arrow-up',
                                        'buttonType'=>'button',
                                        'htmlOptions'=> array('onclick' => 'nhapfile();return false;')
                            ));
                        ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php
                    $this->widget('bootstrap.widgets.TbButton',array(
                                'label'=>'Tải file mẫu',
                                'type'=>'none',
                                'size'=>'normal',
                                'encodeLabel'=>false,
                                'icon'=>'icon-arrow-down',
                                'buttonType'=>'link',
                                'url'=>$this->createUrl('contactCategorie/DownloadTemplate')
                    ));
                ?>
                </div>
            <?php } ?>
            </div>
<!--        <input type="checkbox" id="check_all" />Check All-->
        <div id="contact_data"></div>
        <br><br>
	<div class="row" style="margin: auto;width: 100%;text-align: center;">
		<?php 
                    echo '<button class="btn btn-primary" onClick="save_history();return false;"><i class="icon-ok"></i> Gửi tin</button>&nbsp;&nbsp;&nbsp;&nbsp;';
                    echo '<button class="btn btn-danger" onClick="cancel_history();return false;"><i class="icon-ban-circle"></i> Hủy</button>';
                ?>
	</div>

<?php $this->endWidget(); 
//if(isset($_POST["submit"]))
//{

//        }
$datacontact=array();
$datacontact =  json_encode($datacontact);
$test="hoang thi hoang";

//echo str_replace('$tuoi$', 'nhu','$tuoi$sdfaf$email$afaf$tuoi$$dienthoai$');
//
?>

</div><!-- form -->
<script src="<?php echo YII::app()->baseUrl?>/js/handsontable/handsontable.removeRow.js"></script>
<link rel="stylesheet" href="<?php echo YII::app()->baseUrl?>/css/handsontable/handsontable.removeRow.css">
<script data-jsfiddle="example1">

function nhapdanhba()
{
    var danhba=$('#history_contact').val();
    var content=$('#TemplateSms_template_content').val();

    if(danhba=="")
    {
        alert("Bạn chưa chọn danh bạ");
        return false;
    }
    if(content=="")
    {
        alert("Bạn chưa nhập nội dung tin nhắn.");
        return false;
    }
 
 
    $.ajax({
        type:'POST',
        url : "<?php echo $this->createUrl('getDanhba');?>",
        data:{                    
                danhba:danhba,
                content:content
             },
        success:function(response){
            var responseJSON = jQuery.parseJSON(response);
            if(responseJSON.status=="success")
            {
               $('#contact_data').html("");
               arr_contact(responseJSON.getdata);
            }
        }
    });
}
function nhapfile()
{
    var file=$('#file').val();
    var danhba=$('#danhba').val();
    var content=$('#TemplateSms_template_content').val();
    if(file=="")
    {
        alert("Bạn chưa chọn file");
        return false;
    }
    if(content=="")
    {
        alert("Bạn chưa nhập nội dung tin nhắn.");
        return false;
    }
   var formData = new FormData();
    formData.append('file', $('input[type=file]')[0].files[0]);
    formData.append('content', content);
    $.ajax({
      url: "<?php echo $this->createUrl('ImportExcel'); ?>",
      type: "POST",
      data: formData,
      enctype: 'multipart/form-data',
      processData: false,  // tell jQuery not to process the data
      contentType: false,  // tell jQuery not to set contentType
      success:function(response){
                var responseJSON = jQuery.parseJSON(response);
                if(responseJSON.status=="success")
                {
                   $('#contact_data').html("");
                   arr_contact(responseJSON.getdata);
                }
       }
    });  
}
var hot;
function arr_contact(people)
{
             var
              contact_data = document.getElementById('contact_data'),
              settings1,
              ipValidatorRegexp,
              emailValidator;

              ipValidatorRegexp = /^(?:\b(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\b|null)$/;
              emailValidator = function (value, callback) {
              setTimeout(function(){
                if (/.+@.+/.test(value)) {
                  callback(true);
                }
                else {
                  callback(false);
                }
              }, 1000);
            };

            settings1 = {
              data: people,
              colWidths: [120,140,230,100,390,50],
              //minSpareRows: 1,
              rowHeaders: true,
              contextMenu: true,
              removeRowPlugin: true,
              height: 350,
              stretchH: 'last',
              colHeaders: ['Số điện thoại','Họ tên','Địa chỉ','Ngày sinh','Nội dung tin nhắn','Số tin','id'],
              columns: [
//                {data: 'available',type: 'checkbox'},
                {data: 'contact_phone',readOnly: true},
                {data: 'contact_ten',readOnly: true},
                {data: 'contact_address',readOnly: true},
                {data: 'contact_birthday',readOnly: true},
                {data: 'contact_content',readOnly: true},
                {data: 'content_number',readOnly: true},
                {data: 'contact_id',readOnly: true},
                
              ],
            };
            
            
            
            hot = new Handsontable(contact_data, settings1);
                    
}
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
    countChar();
}

function insertContent()
{
    var tem_calue=$("#template option:selected").text();
    if($("#template").val()!="")
    {
        $('#TemplateSms_template_content').val(tem_calue);
    }
    else{
        $('#TemplateSms_template_content').val('');
    }
            countChar();
            nhapdanhba();
}

function save_history()
{
    var danhba=$('#history_contact').val();
    var History_history_campaingname = $('#History_history_campaingname').val();
    var History_history_brand_id = $('#History_history_brand_id').val();
    var history_type = $('#History_history_type').val();
    var TemplateSms_template_content = $('#TemplateSms_template_content').val();
    var send_schedule = $('send_schedule').val();
    var checkedradio  = $('[name="History[history_is_schedule]"]:radio:checked').val();
    var History_send_schedule = $('#History_send_schedule').val();
    
    if(History_history_campaingname=="")
    {
        alert("Bạn phải nhập tên chiến dịch.");
        return false;
    }
    if(TemplateSms_template_content=="")
    {
        alert("Bạn phải nhập tên nội dung tin nhắn.");
        return false;
    }
   var formData = new FormData();
    formData.append('history_campaingname', History_history_campaingname);
        formData.append('danhba', danhba);
    formData.append('history_brand_id', History_history_brand_id);
    formData.append('content', TemplateSms_template_content);
    formData.append('history_type', history_type);
    formData.append('send_schedule', checkedradio);
    formData.append('History_send_schedule', History_send_schedule);
    if('<?php echo $type; ?>' == 'excel')
    {
        var file=$('#file').val();
        formData.append('file', $('input[type=file]')[0].files[0]);
    }
    else
    {
        
    }
  
    var contact_id ="";
    var i=0;
    
//    $('.htCore tbody tr td:nth-child(5)').each(function() {
//            contact_id+=$(this).text()+",";
//    });
    formData.append('contact', hot.getDataAtCol(6));
//    formData.append('check', hot.getDataAtCol(0));
//    formData.append('message', message_arr);
//    formData.append('sotin', sotin);
    $.blockUI({
        'message':'Đang gửi...'
    }); 
    $.ajax({
            type:"POST",
            url : "<?php echo $this->createUrl('create',array('type'=>$type));?>",
            data: formData,
            enctype: 'multipart/form-data',
            processData: false,  // tell jQuery not to process the data
            contentType: false,  // tell jQuery not to set contentType
            success:function(response){
                response=jQuery.parseJSON(response);
                if(response.status=='success')
                    window.open('<?php echo YII::app()->baseUrl; ?>/history/view/id/'+response.history_id,'_self');
                else
                    $.unblockUI();
            }
        });
}

function cancel_history()
{
    window.location("<?php echo Yii::app()->baseUrl;?>/send");
}
function countChar() {
    var min = 0,
        len = $('#TemplateSms_template_content').val().length,
        lbl = $('#lblcount');
    var ch=0;
    if(min <0) {
        lbl.text(0);
    } else {
        ch = min + len;
        lbl.text(ch);
    }
    var sotin=0;
    if(ch==0)
      sotin=0;  
    else
      sotin = parseInt(ch)/160+1;
    $('#counter').text(Math.floor(sotin));
}

function locdau(str){
    //code by Minit - www.canthoit.info - 13-05-2009
    //str= str.toLowerCase();
    str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
    str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
    str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
    str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
    str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
    str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
    str= str.replace(/đ/g,"d");
    //str= str.replace(/\^|\[|\]|~/g," ");
    //str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
    //str= str.replace(/^\-+|\-+$/g,"");//cắt bỏ ký tự - ở đầu và cuối chuỗi
    return str;
}
function check_schedule(value){
    if(value==1)
        $('#view_send_schedule').css({'display':'block'});
    else
        $('#view_send_schedule').css({'display':'none'});
}
$('#TemplateSms_template_content').keyup(function(){
    var str = $('#TemplateSms_template_content').val();
    str = locdau(str);
    $('#TemplateSms_template_content').val(str);
});

</script>
    