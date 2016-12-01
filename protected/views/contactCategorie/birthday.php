<?php
$this->renderPartial('/site/heade_content',array(
    'title'=>'Sinh nhật tháng '.date('m'),
    'content_left'=>'',
)); 
    $now = getdate();
    
    $month = $now["mon"]; 
$all_birthday_in_month = Contact::model()->getBirthday($month);
    if($all_birthday_in_month){
            $this->widget('bootstrap.widgets.TbGridView', array(
                'id'=>'history-grid',
                'dataProvider'=>Contact::model()->getBirthday($month),
                'columns'=>array(
                        array(
                            'name'=>'contact_ho',
                            'type'=>'raw',
                        ),
                        array(
                            'name'=>'contact_ten',
                            'type'=>'raw',
                        ),
                        array(
                            'name'=>'contact_phone',
                            'type'=>'raw',
                        ),
                        array(
                            'name'=>'contact_birthday',
                            'type'=>'raw',
                            'value'=>function($data){

                               if($data->contact_birthday)
                                    echo date('d/m/Y',  strtotime($data->contact_birthday));
                               else
                                   echo "";
                            }       
                        ),
                        array(
                            'name'=>'contact_gender',
                            'type'=>'raw',
                        ),
                        array(
                            'name'=>'contact_address',
                            'type'=>'raw',
                        ),
                        array(
                            'name'=>'contact_email',
                            'type'=>'raw',
                        ),
                        array(
                            'name'=>'contact_company',
                            'type'=>'raw',
                        ),
                        array(
                            'name'=>'contact_notes',
                            'type'=>'raw',
                        ),
                ),
        ));
    }

