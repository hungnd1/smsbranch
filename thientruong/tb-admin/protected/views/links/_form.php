<?php
/* @var $this LinksController */
/* @var $model Links */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'links-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'link_url',array('class'=>"control-label")); ?>
            <div class="controls-row">
		<?php echo $form->textField($model,'link_url',array('class'=>'span6','maxlength'=>255)); ?>
            </div>
	</div>
        
	<div class="control-group">
		<?php echo $form->labelEx($model,'link_image',array('class'=>"control-label")); ?>
            <div class="controls-row">
		<?php echo $form->fileField($model,'link_image'); ?>
            </div>
        </div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'link_description',array('class'=>"control-label")); ?>
            <div class="controls-row">
                <?php
                    $this->widget('application.extensions.cleditor.ECLEditor', array(
                        'model'=>$model,
                        'attribute'=>'link_description', //Model attribute name. Nome do atributo do modelo.
                        'options'=>array(
                            'width'=>'700',
                            'height'=>200,
                            'useCSS'=>true,
                        ),
                        'value'=>$model->link_description, //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
                    ));
                ?>
            </div>
	</div>


	<div class="control-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->