<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs=array(
	'Menus'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Menu', 'url'=>array('index')),
	array('label'=>'Create Menu', 'url'=>array('create')),
);
?>

<h1>Danh sách menu</h1>
<div style="border: 1px solid #DDD; padding: 10px; border-radius: 10px; background: #eee;">
    <h4>Thêm menu</h4>
    <table style="width: 60%;">
        <tr>
            <td width="34%">Liên kết dến trang</td>
            <td>
                <?php 
                    $list = CHtml::listData(Pages::model()->findAll(), 
                                        'page_id', 'page_title');
                    echo CHtml::dropDownList('trang', '',$list, array()); 
                ?>
            </td>
            <td><?php echo CHtml::button("Thêm",array('class'=>'btn','onclick'=>'addLinkPage();')); ?></td>
        </tr>
        <tr>
            <td>Liên kết đến danh mục sản phẩm</td>
            <td><?php
                    $list = CHtml::listData(Categoriesp::model()->findAll(), 
                                    'cate_id', 'cate_title');
                    echo CHtml::dropDownList('categorysp', '',$list, array());
                ?>
            </td>
            <td><?php echo CHtml::button("Thêm",array('class'=>'btn','onclick'=>'addLinkCategory();')); ?></td>
        </tr>
    </table>
</div>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'menu-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'rowCssClassExpression'=>'"items[]_{$data->menu_id}"',
        'type'=>'striped condensed',
        'template'=>"{items}{pager}",
	'columns'=>array(
                array(
                    'header'=>'',
                    'type'=>'raw',
                    'value'=>'\'<i class="icon-move"></i>\'',
                    'headerHtmlOptions'=>array('style'=>'width:20px;'),
                    'htmlOptions'=>array('class'=>'cate-move')
                ),
		array(
                    'name'=>'entity_id',
                    'value'=>function($data){
                        if($data->entity_type=='Page')
                            echo '<a href="'.YII::app()->createUrl("Menu/admin",array("id"=>$data->menu_id)).'">'.Pages::model ()->findByPk($data->entity_id)->page_title.'</a>';
                        else if($data->entity_type=='Category')
                            echo '<a href="'.YII::app()->createUrl("Menu/admin",array("id"=>$data->menu_id)).'">'.Categoriesp::model ()->findByPk($data->entity_id)->cate_title.'</a>';
                        else echo "";
                    }
                ),
		'entity_type',
                array(
                    'header'=>'Menu con',
                    'name'=>'parent_id',
                    'value'=>function($data){
                        $cate_child = Menu::model()->getPageByParentId($data->menu_id);
                        foreach ($cate_child->data as $item) {
                            if($item->entity_type=='Page')
                                echo Pages::model ()->findByPk($item->entity_id)->page_title;
                            else if($item->entity_type=='Category')
                                echo Categoriesp::model ()->findByPk($item->entity_id)->cate_title;
                            else echo "";
                        }
                    },
                    'filter'=>false,
                    'htmlOptions'=>array('width'=>'150px;')
                ), 
		array(
                    'name'=>'position',
                    'value'=>function($data){
                        echo Menu::$position[$data->position];
                    }
                ),
                array(
                    'header'=>'Trạng thái',
                    'type'=>'raw',
                    'value'=>function($data){
                        if($data->status== 1)
                            echo '<a href="#" onclick="updateStatus('.$data->menu_id.',0)"><i class="icon-ok"></i></a>';
                        else
                            echo '<a href="#" onclick="updateStatus('.$data->menu_id.',1)"><i class="icon-remove"></i></a>';
                    },
                    'headerHtmlOptions'=>array('style'=>'text-align:center','width'=>'70'),
                    'htmlOptions'=>array('style'=>'text-align:center')
                ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'afterDelete' => 'function(link,success,data) {return false; }',
                        'template'=>'{update}{delete}'
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
 
        $('#menu-grid table.items tbody').sortable({
            forcePlaceholderSize: true,
            forceHelperSize: true,
            cursor: 'move',
            handle: '.cate-move',
            items: 'tr',
            update : function () {
                serial = $('#menu-grid table.items tbody').sortable('serialize', {key: 'items[]', attribute: 'class'});
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
    function addLinkPage(){
        var entity_id = $('#trang').val();
        var entity_type = 'Page';
        $.ajax({
            type:'POST',
            'url':'<?php echo $this->createUrl('create'); ?>',
            data:{entity_id:entity_id,entity_type:entity_type},
            success:function(){
                $.fn.yiiGridView.update("menu-grid");
            }
        });
    }
    function addLinkCategory(){
        var entity_id = $('#categorysp').val();
        var entity_type = 'Category';
        $.ajax({
            type:'POST',
            'url':'<?php echo $this->createUrl('create'); ?>',
            data:{entity_id:entity_id,entity_type:entity_type},
            success:function(){
                $.fn.yiiGridView.update("menu-grid");
            }
        });
    }
    function updateStatus(menu_id,status){
            $.ajax({
                type: 'Post',
                url: '<?php echo $this->createURL("updateStatus"); ?>',
                data:{menu_id:menu_id,status:status},
                success:function(data){ 
                    $.fn.yiiGridView.update("menu-grid");
                    $('#content').unblock();
                },
        });
    }
</script>