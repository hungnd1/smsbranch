<?php
/* @var $this ContactCategorieController */
/* @var $model ContactCategorie */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-categorie-form',
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
		<?php echo $form->labelEx($model,'category_name'); ?>
		<?php echo $form->textField($model,'category_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'category_name'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::label('Nhập dữ liệu', 'contact_excel') ?>
		<?php echo CHtml::fileField('file') ?>
                <?php
                    $this->widget('bootstrap.widgets.TbButton',array(
                                'label'=>'Tải file mẫu',
                                'type'=>'none',
                                'size'=>'normal',
                                'encodeLabel'=>false,
                                'icon'=>'icon-arrow-down',
                                'buttonType'=>'link',
                                'url'=>$this->createUrl('DownloadTemplate')
                    ));
                ?>
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