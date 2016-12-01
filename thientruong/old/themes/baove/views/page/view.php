<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Pages'=>array('index'),
	$model->page_id,
);
?>
<div class="col-xs-12 col-sm-9">
    <h4 class="title">Giới thiệu</h4>

<?php echo $model->page_content; ?>
</div>