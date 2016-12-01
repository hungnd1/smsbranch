<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<?php
/* @var $this SiteController */

//$this->pageTitle=Yii::app()->name;
$config = Config::model()->find('domain="'.YII::app()->params['domain'].'"');
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>$config->config_slogan." ".CHtml::encode($config->config_name),
    'htmlOptions'=>array('style'=>'text-align:center;')
)); ?>

<?php $this->endWidget(); ?>


