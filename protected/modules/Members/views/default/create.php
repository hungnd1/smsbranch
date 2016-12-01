<?php
/* @var $this DefaultController */
/* @var $model Members */
/* @var $memberProfileModel MemberProfile */ 
?>
<div id="lb-container-header">
    <div style="margin-left: -10px" class="lb-header-right">
        <h3>Thêm thành viên</h3>
    </div>
    <div class="lb-header-left">
        <a class="btn btn-default" href="<?php echo $this->createUrl('index'); ?>" role="button"><i class="icon-share-alt"></i>Quay lại</a>
    </div>
</div>
<?php $this->renderPartial('_form', array('model'=>$model,'memberProfileModel'=>$memberProfileModel)); ?>