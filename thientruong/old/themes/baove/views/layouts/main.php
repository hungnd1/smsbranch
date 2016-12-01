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
    <link href='https://fonts.googleapis.com/css?family=Lobster&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css"/>
    <link href="<?php echo Yii::app()->baseUrl; ?>/thientruong/css/master.css" rel="stylesheet" />
    
    <script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.min.1.11.3.js"></script>
    <script src="<?php echo Yii::app()->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->baseUrl; ?>/js/baove/offcanvas.js"></script>
    <script src="<?php echo Yii::app()->baseUrl; ?>/js/slick.min.js"></script>
    
    <script src="<?php echo Yii::app()->baseUrl; ?>/thientruong/js/modernizr.js"></script>
   <script src="<?php echo Yii::app()->baseUrl; ?>/thientruong/code.jquery.com/jquery-1.9.1.js"></script>
    <script src="<?php echo Yii::app()->baseUrl; ?>/thientruong/code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="<?php echo Yii::app()->baseUrl; ?>/thientruong/js/plugins.js"></script>
    <script src="<?php echo Yii::app()->baseUrl; ?>/thientruong/js/global.js"></script>
    <script src="<?php echo Yii::app()->baseUrl; ?>/thientruong/js/linearicons.js"></script>
      <script src="<?php echo Yii::app()->baseUrl; ?>/thientruong/js/group-home.js"></script>
  </head>

  <body>
<?php //require_once 'header.php'; ?>
<!--/row-->
    <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
          <?php require_once 'content.php'; ?>
          <?php //require_once 'menuleft.php';?>
      </div><!--/row-->
      
      <footer>
          <?php //require_once 'footer.php';?>
        <p>&copy; 2015 Company, Inc.</p>
      </footer>

    </div><!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  </body>
</html>
