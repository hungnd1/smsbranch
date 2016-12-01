<?php

    $this->widget('bootstrap.widgets.TbTabs', array(
                    'type'=>'tabs', // 'tabs' or 'pills'
                    'encodeLabel'=>false,
                    'tabs'=> 
                    array(
                                array('id'=>'tab1','label'=>'<strong>Giá trị mặc định</strong>',
                                                    'content'=>$this->renderPartial('_config_default',array(
                                                    ),true),'active'=>true,
                                                ),
                                array('id'=>'tab2','label'=>'<strong>Dịch ngôn ngữ</strong>', 
                                                'content'=> $this->renderPartial('_list_translate', array(
                                                    'translate'=>$translate
                                                ),true),
                                                'active'=>false)
                            )
    ));
?>