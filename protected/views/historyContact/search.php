<?php 

$button = '<button class="btn" onclick="exportExcel();"/><i class="icon-download-alt"></i> Xuất file excel</button>&nbsp;';
$this->renderPartial('/site/heade_content',array(
    'title'=>'Tìm kiếm',
    'content_left'=>$button
    )); 

$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'history-contact-grid',
	'dataProvider'=>  $modelContact->search(),
	'filter'=>$modelContact,
	'columns'=>array(
		'history_contact_ho',
		'history_contact_ten',
		'history_contact_phone',
		'history_contact_birthday',
		
		'history_contact_gender',
		'history_contact_address',
		'history_contact_email',
		'history_contact_company',
		
		
//		array(
//			'class'=>'CButtonColumn',
//		),
	),
)); 

