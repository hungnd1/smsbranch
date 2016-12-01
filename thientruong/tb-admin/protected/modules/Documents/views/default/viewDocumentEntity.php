<?php
/*@var $this Controller*/
/*@var $model Document*/

//$this->widget('bootstrap.widgets.TbGridView',array(
//    'id'=>'document-grid',
//    'dataProvider'=>$model,
//    'template'=>'{items}{pager}',
//    'hideHeader'=>true,
//    'columns'=>array(
//        array(
//            'header'=>false,
//            'type'=>'raw',
//            'name'=>'document_url',
//            'value'=>function($data){
//                return '<img src="'.YII::app()->baseUrl.$data->document_url.'" width="100" />';
//            },
//        ),
//        array(
//            'class'=>'bootstrap.widgets.tbButtonColumn',
//            'template'=>'{delete}'
//        )
//    ),
//));
?>
<div>
    <ul style="margin:0;">
        <?php 
            $entity_id = 0;
            foreach ($model->data as $items) {
                $entity_id = $items->document_entityid;
            echo '<li style="list-style:none;display:inline; margin:5px;">'
                    . '<img src="'.YII::app()->baseUrl.$items->document_url.'" width="100" />'
                    . '<a href="#" onclick="deleteDocument('.$items->document_id.'); return true;"><i class="icon-remove"  style="position: relative;right: 10px; top: -20px;"></i></a>'
                 . '</li>';
        } ?>
        
    </ul>
</div>

<script type="text/javascript">
    function deleteDocument(id){
        $.ajax({
            type:'POST',
            url:'<?php echo YII::app()->createUrl("Documents/default/delete"); ?>',
            data:{id:id},
            success:function(data){
                $('#content-document').load('<img src="<?php echo YII::app()->baseUrl ?>/images/loading.gif" />');
                $('#content-document').load('<?php echo $this->createUrl('/Documents/default/viewDocumentEntity',array('entity'=>'product','entity_id'=>$entity_id)) ?>');
            }
        })
    }
</script>
