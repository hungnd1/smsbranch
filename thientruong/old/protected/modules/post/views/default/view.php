<?php
/* @var $this PostController */
/* @var $model Post */


?>
<div class="col-xs-12 col-sm-9">
<h4 class="the-article-title-bv"><?php echo $model->post_title; ?></h4>
<div class="the-article-description"><?php echo $model->post_summary;?></div>
<div class="the-article-content"><?php echo $model->post_content;?></div>
<div id="post_form_comment"></div>
<div id="post_view_comment"></div>
</div>
<script type="text/javascript">
    loadFormComment();
    loadViewComment();
    function loadFormComment(){
        //$('#post_coment').block();
        $('#post_form_comment').load('<?php echo $this->createUrl('/Comments/default/commentMember'); ?>',
        {entry:'<?php echo tbPost::ENTRY; ?>',entry_id:'<?php echo $model->post_id; ?>'});
    }
    function loadViewComment(){
        //$('#post_coment').block();
        $('#post_view_comment').load('<?php echo $this->createUrl('/Comments/default/viewListComment'); ?>',
            {entry:'<?php echo tbPost::ENTRY; ?>',entry_id:'<?php echo $model->post_id; ?>'});
    }
</script>