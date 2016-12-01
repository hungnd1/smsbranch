<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>
<div class="col-xs-12 col-sm-9">
    <h1 class="line-title category"><span>Liên hệ</span></h1>

    <div class="form"style="width: 70%">

    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'contact-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                    'validateOnSubmit'=>true,
            ),
            'htmlOptions'=>array('class'=>'form-horizontal')
    )); ?>
        <p class="note">Các thông tin có dấu <span class="errorMessage">*</span> là bắc buộc phải nhập.</p><br>

            <?php //echo $form->errorSummary($model); ?>

            <div class="form-group">
                    <?php echo $form->labelEx($model,'contact_title',array('class'=>'col-sm-2 control-label')); ?>
                    <div class="col-sm-10">
                    <?php echo $form->textField($model,'contact_title',array('class'=>'form-control')); ?>
                    <?php echo $form->error($model,'contact_title'); ?>
                    </div>
            </div>

            <div class="form-group">
                    <?php echo $form->labelEx($model,'contact_phone',array('class'=>'col-sm-2 control-label')); ?>
                    <div class="col-sm-10">
                    <?php echo $form->textField($model,'contact_phone',array('class'=>'form-control')); ?>
                    <?php echo $form->error($model,'contact_phone'); ?>
                    </div>
            </div>

            <div class="form-group">
                    <?php echo $form->labelEx($model,'contact_email',array('class'=>'col-sm-2 control-label')); ?>
                    <div class="col-sm-10">
                    <?php echo $form->textField($model,'contact_email',array('class'=>'form-control')); ?>
                    <?php echo $form->error($model,'contact_email'); ?>
                    </div>
            </div>

            <div class="form-group">
                    <?php echo $form->labelEx($model,'contact_address',array('class'=>'col-sm-2 control-label')); ?>
                <div class="col-sm-10">
                    <?php echo $form->textField($model,'contact_address',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
                    <?php echo $form->error($model,'contact_address'); ?>
                </div>
            </div>

            <div class="form-group">
                    <?php echo $form->labelEx($model,'contact_content',array('class'=>'col-sm-2 control-label')); ?>
                <div class="col-sm-10">
                    <?php echo $form->textArea($model,'contact_content',array('rows'=>8,'maxlength'=>128,'class'=>'form-control')); ?>
                    <?php echo $form->error($model,'contact_content'); ?>
                </div>
            </div>

            <?php if(CCaptcha::checkRequirements()): ?>
<!--            <div class="form-group">
                    <?php echo $form->labelEx($model,'verifyCode',array('class'=>'col-sm-2 control-label')); ?>
                    <div class="col-sm-10">
                    <div>
                    <?php $this->widget('CCaptcha'); ?>
                    <?php echo $form->textField($model,'verifyCode',array('class'=>'form-control')); ?>
                    </div>
                    <?php echo $form->error($model,'verifyCode'); ?>
                    </div>
            </div>-->
            <?php endif; ?>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
                    <?php echo CHtml::submitButton('Gửi',array('class'=>'btn btn-primary')); ?>
        </div></div>
        </div>
    <?php $this->endWidget(); ?>

    </div><!-- form -->