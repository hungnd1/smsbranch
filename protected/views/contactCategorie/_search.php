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
        <div class="form-group" style="float: left; width: 420px;">
		<?php echo CHtml::label('Thành viên','ContactCategorie_members',array('style'=>'width: 100px;')); ?>
		<?php echo CHtml::dropDownList('ContactCategorie[members]',YII::app()->user->id, Members::model()->getMemberArray(),array('class'=>'span3')); ?>
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
<!-- search-form -->
<script type="text/javascript">
    function loadMember(roles_id){
        $('#ContactCategorie_members').load('<?php echo $this->createUrl('LoadOptionMember');  ?>',{roles:roles_id});
        //.$('#ContactCategorie_members').toggle();
    }
</script>
