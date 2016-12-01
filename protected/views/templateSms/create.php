<?php
/* @var $this TemplateSmsController */
/* @var $model TemplateSms */

$button = '<a class="btn btn-default" href="'.$this->createUrl('admin').'" role="button"><i class="icon-share-alt"></i>Quay lại</a>';
$this->renderPartial('/site/heade_content',array(
        'title'=>'Tạo tin nhắn mẫu',
        'content_left'=>$button
)); 
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>