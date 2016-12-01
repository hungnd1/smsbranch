<?php
/* @var $this HistoryContactController */
/* @var $model HistoryContact */
/* @var $form CActiveForm */

?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
    <div>
<!--        <div class="form-group" style="float: left; width: 350px;">
		<?php //echo CHtml::label('Quyền','ContactCategorie_roles',array('style'=>'width: 100px;')); ?>
		<?php //echo CHtml::dropDownList('ContactCategorie[roles]','', Roles::model()->GetSubRoles(),array('class'=>'span2','onchange'=>'loadMember(this.value);return false;','display'=>'block')); ?>
	</div>-->
        <?php  if(Members::model()->getRoleSystem(YII::app()->user->id)!=Members::KHACHHANG) { ?>
            <div class="form-group" style="float: left; width: 288px;">
                    <?php echo CHtml::label('Thành viên','History_member_createby',array('style'=>'width: 100px;')); ?>
                    <?php echo CHtml::dropDownList('History[member_createby]',YII::app()->user->id, Members::model()->getMemberArray(),array('class'=>'span2','onchange'=>'loadBrabdname(this.value); return false;')); ?>
            </div>
        <?php  } ?>
        <div class="form-group" style="float: left; width: 415px;">
                <?php echo CHtml::label('Tên chiến dịch','History_member_createby',array('style'=>'width: 120px;')); ?>
                <?php echo CHtml::textField('History[history_campaingname]','',array('class'=>'span3')); ?>
        </div>
        <div class="form-group" style="float: left; width: 288px;">
                <?php echo CHtml::label('Brandname','History_member_createby',array('style'=>'width: 100px;')); ?>
                <?php //echo CHtml::dropDownList('History[history_brand_id]',YII::app()->user->id, Brandname::model()->getBrandname(YII::app()->user->id),array('class'=>'span2')); ?>
                <?php $this->widget('ext.select2.ESelect2',array(
                    'name'=>'History[history_brand_id]',
                    'data'=>Brandname::model()->getBrandname(YII::app()->user->id),
                    
                    'htmlOptions'=>array(
                      'multiple'=>'multiple',
                      'class'=>'span2',
                      'style'=>'margin-left:0;',
                        'placeholder'=> "All",
                    ),
                  )); ?>
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
    </div>

<?php $this->endWidget(); ?>

<script type="text/javascript">
    function loadBrabdname(member_id){
        $.ajax({
            'type':'POST',
            'url':'<?php echo $this->createUrl('/Brandname/LoadOptionBrandname');  ?>',
            'data':{member_id:member_id},
            success:function(data){
                $('#History_history_brand_id').html(data);
            }
        });
        //$('#HistoryContact_history_brandname').load('<?php echo $this->createUrl('/Brandname/LoadOptionBrandname');  ?>',{member_id:member_id});
        //.$('#ContactCategorie_members').toggle();
    }
</script>
