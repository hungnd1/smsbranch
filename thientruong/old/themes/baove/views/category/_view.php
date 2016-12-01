
<div class="media category">
  <div class="media-left">
    <a href="#">
      <?php if($data->post_image){ ?>
        <img width="160" class="media-object" src="<?php echo YII::app()->baseUrl.'/tb-admin/uploads/'.$data->post_image ?>" alt="image">
      <?php } else{?>
        <img width="160" class="media-object" src="<?php echo YII::app()->baseUrl.'/images/baove/Capture.PNG' ?>" alt="image">
      <?php }?>
    </a>
  </div>
  <div class="media-body">
      <h4 class="media-heading"><a href="<?php echo Yii::app()->createUrl('/post/view/id/'.$data->post_id);?>"><?php echo $data->post_title; ?></a></h4>
    <p style="min-height: 60px;"><?php echo TBApplication::getSummary($data->post_summary, false, 450); ?></p>
    <p style="text-align:right;"><a href="<?php echo Yii::app()->createUrl('/post/view/id/'.$data->post_id);?>" class="more" role="button">Xem chi tiết...</a></p>
  </div>
</div>

