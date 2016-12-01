<?php
/*
 * @var $this Defaultcontrol
 * @var $model Member
 */
$rolesArray = Roles::model()->GetRoles(Roles::PR_QUERY_RETURN_TYPE_DROPDOWN_ARRAY);
?>
<h1>Thay đổi thông tin cá nhân</h1>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'pr-members-form',
        'type'=>'horizontal',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
)); ?>
<p class="note">Các trường đánh dấu <span class="required">*</span> là bắt buộc.</p>
        <?php echo $form->textFieldRow($model,'pr_member_profile_display_name',array('class'=>'span4'))?>
        <?php echo $form->textFieldRow($modelMember,'pr_member_email',array('class'=>'span4'))?>
        <?php 
            if(Members::model()->getManagerSystem())
                echo $form->dropDownListRow($modelMember,'pr_roles_id',$rolesArray); 
        ?>
        <?php echo $form->textFieldRow($model,'pr_member_profile_phone',array('class'=>'span4'))?>
        <?php echo $form->textAreaRow($model,'pr_member_profile_address',array('class'=>'span6','rows'=>'5'))?>
        <?php echo $form->textAreaRow($model,'pr_member_copyright',array('class'=>'span6','rows'=>'5'))?>
	<div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton',array(
                'buttonType'=>'submit',
                'type'=>'primary',
                'label'=>$model->isNewRecord ? 'Create' : 'Save',
                'ajaxOptions'=>array(
                    'type'=>'POST',
                ),
            )); ?>
	</div>
<?php $this->endWidget(); ?>