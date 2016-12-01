<?php 
$model = new Page();
//ho tro truc tuyen
$allPost = $model->findByPk(5);
$video = $model->findByPk(6);
$news = Post::model()->getPost(21);
?>
<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
              <h5 href="#" class="list-group-item active"><span class="item-title">Hỗ trợ trực tuyến</span></h5>
              <div class="right-content"><?php echo $allPost['page_content'];?></div>
          </div>
            
          <div class="list-group">
              <h5 href="#" class="list-group-item active"><span class="item-title video">Video</span></h5>
              <div class="right-content"><?php echo $video['page_content'];?></div>
          </div>
          <div class="list-group">
              <h5 href="#" class="list-group-item active"><span class="item-title video">Tin tức</span></h5>
              <div class="right-content topviewscat">
                  <ul class="listviewcat">
                  <?php foreach ($news->data as $item) {   ?>
                        <li class="news_thumb">
                            <a href="<?php echo Yii::app()->createUrl('/post/view/id/'.$item->post_id);?>">
                                <img width="50" height="40"  src="<?php echo YII::app()->baseUrl; ?>/tb-admin/uploads/<?php echo $item->post_image; ?>" />
                                <?php echo $item->post_title; ?>
                            </a>
                        </li>
                  <?php } ?>
                    </ul>
                  <p style="text-align:right"><a href="<?php echo Yii::app()->createUrl('/category/view/id/21');?>" class="more">Xem thêm...</a></p>
              </div>
          </div>
</div><!--/.sidebar-offcanvas-->