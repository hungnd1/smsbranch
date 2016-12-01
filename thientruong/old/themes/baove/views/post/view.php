<div class="col-xs-12 col-sm-9">
    <h3 class="title"><?php echo $model->post_title ?>
        <p class="post-on">Đăng ngày: <?php echo date('d-m-Y',  strtotime($model->post_createdate));?></p>
    </h3>
    
    <p style="color: #666; font-weight: bold;"><?php echo $model->post_summary; ?></p>
    <div style="margin-top: 20px;">
    <p style="color: #666; font-weight: bold;"><?php echo $model->post_content; ?></p>
    </div>
</div>
