<?php
/* @var $this BlockController */
/* @var $model Block */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'block-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'block_logo'); ?>
		<?php echo $form->fileField($model,'block_logo',array('size'=>60,'maxlength'=>255,'class'=>'span6')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'block_header'); ?>
		<?php 
                            $this->widget('ckeditor.CKEditor', 
                            array( 'model'=>$model, 
                                'attribute'=>'block_header', 
                                'editorTemplate'=>'full', )); 
                ?>
	</div>
        <BR>
	<div class="row">
		<?php echo $form->labelEx($model,'block_footer'); ?>
		<?php 
                        $this->widget('ckeditor.CKEditor', 
                        array( 'model'=>$model, 
                            'attribute'=>'block_footer', 
                            'editorTemplate'=>'full', )); 
                ?>
	</div>
        <BR>
	<div class="row">
		<?php echo $form->labelEx($model,'block_footer_en'); ?>
		<?php 
                        $this->widget('ckeditor.CKEditor', 
                        array( 'model'=>$model, 
                            'attribute'=>'block_footer_en', 
                            'editorTemplate'=>'full', )); 
                ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>50,'class'=>'span6')); ?>
	</div>

	<div class="form-actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->