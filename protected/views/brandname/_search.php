<?php
/* @var $this BrandnameController */
/* @var $model Brandname */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

        <div class="form-group" style="float: left; width: 420px;">
		<?php echo CHtml::label('Thành viên','Brandname_member_createby',array('style'=>'width: 100px;')); ?>
		<?php echo CHtml::dropDownList('Brandname[member_createby]',YII::app()->user->id, Members::model()->getMemberArray(),array('class'=>'span3')); ?>
	</div>
	<div class="form-group">
                <?php
                    $this->widget('bootstrap.widgets.TbButton',array(
                                'label'=>'Search',
                                'type'=>'none',
                                'size'=>'normal',
                                'encodeLabel'=>false,
                                'icon'=>'icon-search',
                                'buttonType'=>'submit',
                    ));
                ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->