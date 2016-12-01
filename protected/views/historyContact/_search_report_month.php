<?php
/* @var $this HistoryContactController */
/* @var $model HistoryContact */
/* @var $form CActiveForm */
$category_sms = array(''=>'Tất cả');
$category_sms = $category_sms + PrSystemValueKey::model()->getSysVal('SmsType');

$status_sms = array(''=>'Tất cả');
$status_sms = $status_sms + PrSystemValueKey::model()->getSysVal('Trangthai');

$brandname = Brandname::model()->getBrandname(YII::app()->user->id);
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
    <div>
        <?php if(Members::model()->getRoleSystem(YII::app()->user->id)!=Members::KHACHHANG) { ?>
        <div class="form-group" style="float: left; width: 350px;">
		<?php echo CHtml::label('Thành viên','HistoryContact_history_createby',array('style'=>'width: 100px;')); ?>
		<?php echo CHtml::dropDownList('HistoryContact[history_createby]',YII::app()->user->id, Members::model()->getMemberArray(),array('class'=>'span2','onchange'=>'loadBrabdname(this.value); return false;')); ?>
	</div>
        <?php } ?>
	<div class="form-group" style="float: left; width: 350px;height: 40px;">
		<?php echo CHtml::label('Tháng','HistoryContact_history_monthdate',array('style'=>'width: 100px;')); ?>
		<?php echo CHtml::textField('HistoryContact[history_monthdate]',date('m-Y'),array('class'=>'span2')); ?>
	</div>
        <div class="form-group" style="float: left; width: 350px;height: 40px;">
		<?php echo CHtml::label('Brandname','HistoryContact_history_brandname',array('style'=>'width: 100px;')); ?>
		<?php //echo CHtml::dropDownList('HistoryContact[history_brandname]','',$brandname,array('class'=>'span2')); ?>
                <?php $this->widget('ext.select2.ESelect2',array(
                    'name'=>'HistoryContact[history_brandname]',
                    'data'=>$brandname,
                    
                    'htmlOptions'=>array(
                      'multiple'=>'multiple',
                      'class'=>'span2',
                      'style'=>'margin-left:0;',
                        'placeholder'=> "All",
                    ),
                  )); ?>
	</div>

	<div class="form-group" style="float: left; width: 350px;">
		<?php echo CHtml::label('Loại tin','repot_type',array('style'=>'width: 100px;')); ?>
		<?php echo CHtml::dropDownList('HistoryContact[history_type]','',$category_sms,array('class'=>'span2')); ?>
	</div>
	<div class="form-group" style="float: left; width: 350px;">
		<?php echo CHtml::label('Trạng thái','history_contact_status',array('style'=>'width: 100px;')); ?>
		<?php echo CHtml::dropDownList('HistoryContact[history_contact_status]','',$status_sms,array('class'=>'span2')); ?>
	</div>

        
        <div class="form-group" id="telecom-search" style="float: left; width: 100%;">
            <?php echo CHtml::label('Nhà mạng','to_date',array('style'=>'width: 100px;')); ?>
            <input type="checkbox" id="telecom_all" value="Tất cả" checked=""><b>Tất cả</b>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="case" id="telecom_vietel" name="telecom" value="vietel" checked="">Viettel&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="case" id="telecom_mobifone" name="telecom" value="mobiFone" checked="">MobiFone&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="case" id="telecom_vinafone" name="telecom" value="vinaFone" checked="">VinaFone&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="case" id="telecom_vnmobile" name="telecom" value="Vietnamobile" checked="">Vietnamobile&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="case" id="telecom_gmobile" name="telecom" value="Gmobile" checked="">Gmobile&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="case" id="telecom_other" name="telecom" value="khac" checked="">Nhà mạng khác

	</div>

	<div class="form-group">
                <?php
                    $this->widget('bootstrap.widgets.TbButton',array(
                                'label'=>'Tìm kiếm',
                                'type'=>'none',
                                'size'=>'normal',
                                'encodeLabel'=>false,
                                'icon'=>'icon-search',
                                'buttonType'=>'submit',
                    ));
                ?>
	</div>
        <div class="form-group"></div>
    </div>

<?php $this->endWidget(); ?>

<script type="text/javascript">
    $(document).ready(function(){
        var from_date = $("#HistoryContact_history_monthdate").datepicker({
            format: "mm-yyyy",
            viewMode: "months", 
            minViewMode: "months"
        }).on('changeDate', function(ev) {
            from_date.hide();
        }).data('datepicker');	;
        
        $("#telecom_all").change(function () {
            $("input:checkbox").prop('checked', $(this).prop("checked"));
        });
        
        $(".case").change(function () {
            if($(".case").length==$(".case:checked").length){
                $("#telecom_all").prop("checked","checked");
            }else{
                $("#telecom_all").removeAttr("checked");
            }
        });
    });

    function loadBrabdname(member_id){
        $('#HistoryContact_history_brandname').load('<?php echo $this->createUrl('/Brandname/LoadOptionBrandname');  ?>',{member_id:member_id});
        //.$('#ContactCategorie_members').toggle();
    }
    
</script>