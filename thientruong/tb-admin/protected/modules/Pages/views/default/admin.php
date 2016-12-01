<?php
/* @var $this PagesController */
/* @var $model Pages */

$this->breadcrumbs=array(
	'Pages'=>array('index'),
	'Manage',
);
?>
<div class="ad_header">
    <div class="ad-header-back">
        <a href="#" onclick="goBack(); return false;"><i class="icontb-left"></i></a>
        <a href="#" onclick="reload(); return false;"><i class="icontb-reload"></i></a>
        <a href="#" onclick="goNext(); return false;"><i class="icontb-right"></i></a>
    </div>
    <div class="ad-header-title"><h1><?php echo YII::t('lang','Danh sách menu'); ?></h1></div>
    <div class="ad-header-action">
        <?php 
            $this->widget('bootstrap.widgets.TbButton',array(
                        'label'=>'<i class="icon-plus"></i>&nbsp;'.YII::t('lang','Thêm'),
                        'type'=>'none',
                        'size'=>'normal',
                        'encodeLabel'=>false,
                        'buttonType'=>'link',
                        'htmlOptions'=>array('data-workspace'=>'1'),
                        'url'=>  $this->createUrl('create'),
            ));
           $this->widget('bootstrap.widgets.TbButton',array(
                        'label'=>'<i class="icon-remove"></i>&nbsp;'.YII::t('lang','Xóa Nhiều'),
                        'type'=>'danger',
                        'size'=>'normal',
                        'encodeLabel'=>false,
                        'buttonType'=>'button',
                        'htmlOptions'=> array('onclick' => 'DeleteAllPage()'),
            ));
        ?>
    </div>
</div>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'pages-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'rowCssClassExpression'=>'"items[]_{$data->page_id}"',
        'type'=>'striped condensed',
        'template'=>"{items}{pager}",
	'columns'=>array(
//                array(
//                    'header'=>'',
//                    'type'=>'raw',
//                    'value'=>'\'<i class="icon-move"></i>\'',
//                    'headerHtmlOptions'=>array('style'=>'width:20px;'),
//                    'htmlOptions'=>array('class'=>'cate-move')
//                ),
                array(
                    'type'=>'raw',
                    'name'=>'page_id',
                    'value'=>'$data->page_id',
                    'filter'=>false
                ),
                array(
                    'type'=>'raw',
                    'name'=>'page_title',
                    'value'=>function($data){
                        return '<a href="'.YII::app()->createUrl("Pages/default/admin",array("id"=>$data->page_id)).'">'.$data->page_title.'</a>';
                    },
                    'htmlOptions'=>array('width'=>'200px;')
                ),
		array(
                   'name'=>'page_image',
                   'type'=>'raw',
                   'filter'=>FALSE,
                   'value'=>function($data){
                        return '<img width="100" src="'.Yii::app()->baseUrl.'/uploads/'.$data->page_image.'" alt="'.$data->page_title.'" />';
                   }
                ),    
//                array(
//                    'type'=>'raw',
//                    'name'=>'page_content',
//                    'value'=>'$data->page_content',
//                    'filter'=>false,
//                    'htmlOptions'=>array('width'=>'500px;')
//                ),
//                array(
//                    'type'=>'raw',
//                    'name'=>'page_tag',
//                    'value'=>'$data->page_tag',
//                ),

//                array(
//                    'type'=>'raw',
//                    'name'=>'cate_id',
//                    'value'=>function($data){
//                        $category = Categoriesp::model()->findByPk($data->cate_id);
//                        if($category)
//                            echo $category->cate_title;
//                    },
//                    'htmlOptions'=>array('width'=>'200px;')
//                ),   
                array(
                    'type'=>'raw',
                    'name'=>'page_createdate',
                    'value'=>'date(TBApplication::getFormatDate(),strtotime($data->page_createdate))',
                    'htmlOptions'=>array('width'=>'140px;')
                ),
                array(
                    'header'=>'Trạng thái',
                    'type'=>'raw',
                    'value'=>function($data){
                        if($data->page_status == 1)
                            echo '<a href="#" onclick="updateStatus('.$data->page_id.',0)"><i class="icon-ok"></i></a>';
                        else
                            echo '<a href="#" onclick="updateStatus('.$data->page_id.',1)"><i class="icon-remove"></i></a>';
                    },
                    'headerHtmlOptions'=>array('style'=>'text-align:center','width'=>'70'),
                    'htmlOptions'=>array('style'=>'text-align:center')
                ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'afterDelete' => 'function(link,success,data) {return false; }'
		),
                array(
                    'header'=>'<input type="checkbox" name="selectall" onclick="checkSelectAll()" id="selectall"/>',
                    'type'=>'raw',
                    'value'=>'\'<input type="checkbox" value="\'.$data->page_id.\'" onclick="checkSelectCase()" name="case" class="case"/>\'',
                ),
	),
)); 
$str_js = "
        var fixHelper = function(e, ui) {
            ui.children().each(function() {
                $(this).width($(this).width());
            });
            return ui;
        };
 
        $('#pages-grid table.items tbody').sortable({
            forcePlaceholderSize: true,
            forceHelperSize: true,
            cursor: 'move',
            handle: '.cate-move',
            items: 'tr',
            update : function () {
                serial = $('#pages-grid table.items tbody').sortable('serialize', {key: 'items[]', attribute: 'class'});
                $.ajax({
                    'url': '" . $this->createUrl('sortGridView') . "',
                    'type': 'post',
                    'data': serial,
                    'success': function(data){
                    },
                    'error': function(request, status, error){
                        alert('We are unable to set the sort order at this time.  Please try again in a few minutes.');
                    }
                });
            },
            helper: fixHelper
        }).disableSelection();
    ";
 
Yii::app()->clientScript->registerScript('sortable-categoy', $str_js);
              
?>

<script type="text/javascript">
    function DeleteAllPage(){
        var arr_page_id = getIDSelectInput();
        $.ajax({
                type: 'Post',
                url: '<?php echo $this->createURL("deleteAll"); ?>',
                data:arr_page_id,
                beforeSend:function(){
                    
                    if(arr_page_id =="" )
                    {
                        alert("Bạn chưa chọn record nào để xóa");
                        $('#content').unblock();
                        return false;
                    }
                    else if(confirm('Bạn có muốn xóa record này không?')){
                        $('#content').block();
                        return true;
                    }
                    else{
                        $('#content').unblock();
                        return false;
                    }
                },
            //'processData' => false,
                success:function(data){ 
                    $.fn.yiiGridView.update("pages-grid");
                    $('#content').unblock();
                },
        });
    }
    
    function updateStatus(page_id,status){
            $.ajax({
                type: 'Post',
                url: '<?php echo $this->createURL("updateStatus"); ?>',
                data:{page_id:page_id,status:status},
                success:function(data){ 
                    $.fn.yiiGridView.update("pages-grid");
                    $('#content').unblock();
                },
        });
    }
</script>