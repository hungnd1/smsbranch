<div class="col-xs-12 col-sm-9">
    <h1 class="the-article-title-bv"><span>Lĩnh vực cung ứng</span></h1>
        <?php  
        foreach ($post_dv as $data)
        {
            
                    $image_dv="";
                    $title_dv="";
                    $content_post_dv="";
                    if($data['post_title']!="")
                        $title_dv=$data['post_title'];
                    if($data['post_summary']!="")
                        $content_post_dv=$data['post_summary'];
                    if($data['post_image']!="")
                        $image_dv=$data['post_image'];

                ?>
                <div class="col-sm-6 col-md-4" style="height: 200px">
                  <div class="thumbnail" >
                    <?php 
                        if($image_dv !=""){
                            echo '<img style="width:200px;height:200px" src="'.YII::app()->baseUrl.'/tb-admin/uploads/'.$image_dv.'" width="1070" alt="side1">';

                        }
                        else
                        {
                            echo '<img style="width:200px;height:200px"  src="'.YII::app()->baseUrl.'/images/baove/Capture.PNG" width="1070" alt="side1">';
                        }
                    ?>
                      <div class="caption" style="height:216px">
                          <h4><a href="<?php echo Yii::app()->createUrl('/post/default/view/id/'.$data['post_id']);?>" class="more" role="button"><?php echo $title_dv;?></a></h4>
                      <p style="height:98px"><?php echo substr($content_post_dv,0,200);?></p>
                      <p style="text-align:right"><a href="<?php echo Yii::app()->createUrl('/post/default/view/id/'.$data['post_id']);?>" class="more" role="button">Chi tiết &raquo;</a></p>
                    </div>
                  </div>
                </div>
                <?php 
                
            
        }
        ?>
    
</div>