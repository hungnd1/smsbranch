<?php 
//lay tat ca danh muc
$allCa = tbCategories::model()->getAllCategory(1,0);
?>
<div class="container">
    <div class="col-xs-6 col-sm-3 header" ><a href="#" class="thumbnail" style="border: 0;"><img src="<?php echo YII::app()->baseUrl; ?>./images/baove/logo.png" alt="logo"  /></a></div>
    <div class="col-xs-6 col-sm-9 header">
        <h2 >CÔNG TY TNHH DỊCH VỤ BẢO VỆ HƯNG THỊNH PHÁT</h2>
        <h4 >Thương hiệu lớn - Trách nhiệm cao - Kỹ luật thép</h4>
    </div>
    <div class="col-xs-6 col-sm-4 search">
        <div class="social_icons"><a href="#" >
                <i class="share-facbook"></i></a>
            <a href="#"><i class="share-google"></i></a>
            <a href="#"><i class="share-twitter"></i></a>
        </div>
        <div class="input-group">
          <input type="text" class="form-control" id="input_search" placeholder="Nhập từ khóa...">
          <span class="input-group-btn">
              <button class="btn btn-default" type="button" onclick="search();return false;">Tìm kiếm</button>
          </span>
        </div><!-- /input-group -->
      </div><!-- /.col-lg-6 -->
</div>
<nav class="navbar navbar-fixed-top navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!--<a class="navbar-brand" href="#">Project name</a>-->
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown"><a href="<?php echo Yii::app()->createUrl('site/index');?>">Trang chủ</a></li>
        
        <?php 
        foreach ($allCa as $data)
        {
            $post_dv=array();
            $post_dv=  tbCategories::model()->getAllCategory(1,$data['cate_id']);
            if(count($post_dv)>0)
                echo '<li class="dropdown"><a href="'.Yii::app()->createUrl('/category/view/id/'.$data['cate_id']).'">'.$data['cate_title'].'';
            else 
                echo '<li class=""><a href="'.Yii::app()->createUrl('/category/view/id/'.$data['cate_id']).'">'.$data['cate_title'].'';
            echo '<ul class="dropdown-menu sub-menu" id="yw5">';
            foreach ($post_dv as $data1)
            {
                $title_dv="";
                if($data1['cate_title']!="")
                   $title_dv=$data1['cate_title'];
                echo '<li ><a href="'.Yii::app()->createUrl('/category/view/id/'.$data1['cate_id']).'">'.$data1['cate_title'].'</a></li>';
           }
           echo '</ul></a></li>'; 
        }
        
        ?>
       <li><a href="<?php echo YII::app()->createUrl('site/contact');?>">Liên hệ</a></li>
      </ul>
<!--        <div class="col-sm-3 col-md-3 pull-right">
            <form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="q">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
        </div>-->
    </div><!-- /.nav-collapse -->
  </div><!-- /.container -->
  
</nav><!-- /.navbar -->

<script type="text/javascript">
    $(document).ready(function(){
        $('.multiple-items').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows:false,
        });
    })
    function search(){
        var keyword = $('#input_search').val();
        $('.col-xs-12.col-sm-9').load('<?php echo YII::app()->createUrl('/site/search'); ?>',{keyword:keyword});
        $('.col-xs-12.col-sm-12').html('');
    }
</script>