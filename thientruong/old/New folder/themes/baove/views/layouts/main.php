<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Off Canvas Template for Bootstrap</title>
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/baove/offcanvas.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/baove/style.css">

  </head>

  <body>
<?php require_once 'header.php'; ?>
<!--/row-->
          
    <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
          <div class="col-xs-12 col-sm-12">
                <p class="pull-right visible-xs">
                  <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
                </p>
                <div class="jumbotron">
                  <h1>Hello, world!</h1>
                  <p>This is an example to show the potential of an offcanvas layout pattern in Bootstrap. Try some responsive-range viewport sizes to see it in action.</p>
                </div>
          </div>
        <div class="col-xs-12 col-sm-9">
          <div class="row">
              <h1 class="line-title"><span>Giới thiệu</span></h1>
            <div class="media">
              <div class="media-left">
                <a href="#">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/baove/Capture.PNG" alt="images" style="width: 200px;">
                </a>
              </div>
              <div class="media-body">
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
              </div>
            </div>
            
          </div>
            <div class="row">
                <h1 class="line-title"><span>Dịch vụ</span></h1>
                <div class="col-sm-6 col-md-4">
                  <div class="thumbnail">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/baove/Capture.PNG" alt="images">
                    <div class="caption">
                      <h4>Thumbnail label</h4>
                      <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
                      <p><a href="#" class="btn btn-default" role="button">Chi tiết &raquo;</a></p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-4">
                 <div class="thumbnail">
                   <img src="<?php echo Yii::app()->baseUrl; ?>/images/baove/Capture.PNG" alt="images">
                   <div class="caption">
                     <h4>Thumbnail label</h4>
                     <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
                     <p><a href="#" class="btn btn-default" role="button">Chi tiết &raquo;</a></p>
                   </div>
                 </div>
               </div>
                <div class="col-sm-6 col-md-4">
                  <div class="thumbnail">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/baove/Capture.PNG" alt="images">
                    <div class="caption">
                      <h4>Thumbnail label</h4>
                      <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
                      <p><a href="#" class="btn btn-default" role="button">Chi tiết &raquo;</a></p>
                    </div>
                  </div>
                </div>
          </div><!--/row-->
          
          <div class="row">
            <h1 class="line-title"><span>Lĩnh vực cung ứng</span></h1>
            <div class="media">
              <div class="media-left">
                <a href="#">
                  <img class="media-object" src="<?php echo Yii::app()->baseUrl; ?>/images/baove/Capture.PNG" alt="images">
                </a>
              </div>
              <div class="media-body">
                <h4 class="media-heading">Media heading</h4>
                <div>
                    
                </div>
              </div>
            </div>
          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <a href="#" class="list-group-item active">Hỗ trợ trực tuyến</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
          </div>
            
          <div class="list-group">
            <a href="#" class="list-group-item active">Video</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
          </div>
        </div><!--/.sidebar-offcanvas-->
      </div><!--/row-->

      <hr>
<?php echo $content; ?>
      <footer>
        <p>&copy; 2015 Company, Inc.</p>
      </footer>

    </div><!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.min.1.11.3.js"></script>
    <script src="<?php echo Yii::app()->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->baseUrl; ?>/js/baove/offcanvas.js"></script>
  </body>
</html>
