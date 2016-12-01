<?php
/* @var $this DefaultController */
/* Model
 * @var $systemValueModel
 */
?>
<h2>Cài đặt</h2>
<div class="container-systems">
    <?php $this->widget('bootstrap.widgets.TbTabs', array(
        'type'=>'tabs',
        'placement'=>'above', // 'above', 'right', 'below' or 'left'
        'tabs'=>array(
            array('label'=>'Thông hệ thống',
                'content'=>$this->renderPartial('//config/index',array(),true),
                'active'=>true),
            array('label'=>'Giá trị mặt định',
                'content'=>$this->renderPartial('_form_system_lookup_value',array('systemValueModel'=>$systemValueModel),true),
                'active'=>false),
//            array('label'=>'Quyền hệ thống', 
//                'content'=>$this->renderPartial('_form_system_roles', array('rolesModel'=>$rolesModel), true)),
//            array('label'=>'Translation', 'content'=>$this->renderPartial('_form_system_translation', array('translationModel'=>$translationModel),true)),
        ),
    )); ?>
</div>
