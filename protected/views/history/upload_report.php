<?php
/* @var $this HistoryController */
/* @var $model History */
/* @var $form CActiveForm */

    $this->renderPartial('/site/heade_content',array(
        'title'=>'Tải báo cáo tin nhắn quảng cáo',
        'content_left'=>''));
?>

<div class="form">
<?php 
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
		<?php echo $form->labelEx($model,'history_brand_id'); ?>
		<?php echo $form->dropDownList($model,'history_brand_id',Brandname::model()->getBrandname(YII::app()->user->id),array('class'=>'span4')); ?>
		<?php echo $form->error($model,'history_brand_id'); ?>
	</div>
        
	<div class="form-group">
		<?php echo CHtml::label('Nhập dữ liệu', 'contact_excel') ?>
		<?php echo CHtml::fileField('file') ?>
	</div>
	<div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton',array(
                'buttonType'=>'submit',
                'type'=>'nomarl',
                'label'=>$model->isNewRecord ? 'Thêm' : 'Sửa',
                'icon'=>'icon-ok',
                'ajaxOptions'=>array(
                    'type'=>'POST',
                ),
            )); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->
    