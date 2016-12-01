<?php
/* @var $this HistoryController */
/* @var $model History */
$lable = ($type=='contact') ? 'danh bạ' : 'file excel';
$button = '';
$this->renderPartial('/site/heade_content',array(
        'title'=>'Gửi tin theo '.$lable,
        'content_left'=>$button
)); 
?>

<?php $this->renderPartial('_form', array('model'=>$model,'type'=>$type)); ?>