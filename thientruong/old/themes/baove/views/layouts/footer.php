
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//lienket
$link_ar=Links::model()->findAll();
$i=0;
?>
<div class="row multiple-items">
<!--    <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="5000" id="myCarousel">
      <div class="carousel-inner">-->
          <?php 
          foreach ($link_ar as $link)
          {
              echo '<div><h3><a href="'.$link['link_url'].'">';
                        if($link['link_image'] !=""){
                            echo '<img style="width:60%;"  src="'.YII::app()->baseUrl.'/tb-admin/uploads/'.$link['link_image'].'" width="1125" alt="side1">';
                        }
                        else
                        {
                            echo '<img style="width:60%;"  src="'.YII::app()->baseUrl.'/images/baove/Capture.PNG" width="1125" alt="side1">';
                        }
              echo '</a></h3></div>';
          }
          ?>



 </div>
    

</div>

    <div class="row footer">
      <div class="col-md-2">
          <img width="100%" src="<?php echo YII::app()->baseUrl; ?>./images/baove/logo1.png" alt="logo"  />
      </div>
      <div class="col-md-6">
          <h4>Thông tin liên hệ</h4>
          <ul>
              <li><p><h5>CÔNG TY TNHH DỊCH VỤ BẢO VỆ HƯNG THỊNH PHÁT</h5></p></li>
              <li><p> Lô NV 5.29 Khu chức năng đô thị Tây Mỗ, Phường Đại Mỗ,Quận Nam Từ Liêm, TP Hà Nội </p></li>
              <li><p> SĐT: 0463 273 898. Hotline: 0913 397 818 - 0986 736 966</p></li>
              <li><p> Website: baovehungthinhphat.vn</p></li>
          </ul>
      </div>
      <div class="col-md-4">
          <h4>Về chúng tôi</h4>
          <ul>
              <li><a href="<?php echo Yii::app()->createUrl('/page/view/id/4');?>">Giới thiệu</a></li>
              <li><a href="<?php echo Yii::app()->createUrl('/site/contact');?>">Đóng góp ý kiến</a></li>
          </ul>
      </div>
  </div>
