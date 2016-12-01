<?php echo ' <h1 class="line-title"><span>Kết quả tìm kiếm</span></h1>';
     
     foreach ($post_search as $data_search){
//         echo '<pre>';
//         print_r($data_search);
     ?>
        <div class="row">
           
          <div class="media">
            <div class="media-left">
              <?php 
                  if($data_search['post_image'] !=""){
                      echo '<img style="width:161px;height:161px;padding-top:13px;" src="'.YII::app()->baseUrl.'/tb-admin/uploads/'.$data_search['post_image'].'" width="1070" alt="side1">';

                  }
                  else
                  {
                      echo '<img style="width:161px;height:161px;padding-top:13px;"  src="'.YII::app()->baseUrl.'/images/baove/Capture.PNG" width="1070" alt="side1">';
                  }
                  ?>
            </div>
            <div class="media-body">
                <h4><?php echo $data_search['post_title'];?></h4>
                <p style="min-height:121px"><?php echo substr($data_search['post_summary'],0,500);?></p>
                <p style="float:right"><a href="<?php echo Yii::app()->createUrl('/post/default/view/id/'.$data_search['post_id']);?>" class="more" role="button">Xem chi tiết...</a></p>
              
            </div>
          </div>

        </div>
  <?php
     }
  ?>
