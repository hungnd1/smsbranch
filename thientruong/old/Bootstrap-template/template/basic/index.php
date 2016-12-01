<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Carousel Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="template/basic/css/style_img_overlay.css" rel="stylesheet">
    <link href="template/basic/css/style.css" rel="stylesheet">
    <link href="template/basic/css/jquery.fancybox-1.3.4.css" rel="stylesheet">
    
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">THEBLUE</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
<!--      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>-->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="template/basic/images/14-new-year-wallpaper_1.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Example headline.</h1>
              <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
            </div>
          </div>
        </div>
<!--        <div class="item">
          <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Another example headline.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>One more for good measure.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
            </div>
          </div>
        </div>-->
      </div>
<!--      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>-->
<!--      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>-->
    </div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
            <img class="img-circle" src="template/basic/images/website.png" alt="website " width="160" height="160">
          <h2>Thiết kế website</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="template/basic/images/system.png" alt="system" width="160" height="160">
          <h2>Quản lý hệ thống</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="160" height="160">
          <h2>Cung cấp hosting</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

      <h2 style="border-bottom: 1px solid #ddd"><span class="block_title_label">Các mẫu website</span></h2>
      <div class="row featurette">
          <div id="effect-6" class="effects clearfix">
            <div class="img">
                <a title="Lorem ipsum dolor sit amet"><img src="template/basic/images/template/big/ecommerce.jpg" alt=""></a>
                <div class="overlay">
                    <a rel="example_group" href="./template/basic/images/template/big/ecommerce.jpg" title="Lorem ipsum dolor sit amet" class="expand">+</a>
                    <a href="" class="btn btn-lg btn-primary expand-detail">Chi tiết</a>
                    <a class="close-overlay hidden">x</a>
                </div>
            </div>
            <div class="img">
                <a title="Lorem ipsum dolor sit amet"><img src="template/basic/images/template/big/ecommerce.jpg" alt=""></a>
                <div class="overlay">
                    <a rel="example_group" href="./template/basic/images/template/big/ecommerce.jpg" title="Lorem ipsum dolor sit amet" class="expand">+</a>
                    <a href="" class="btn btn-lg btn-primary expand-detail">Chi tiết</a>
                    <a class="close-overlay hidden">x</a>
                </div>
            </div>
            <div class="img">
                <a title="Lorem ipsum dolor sit amet"><img src="template/basic/images/template/big/ecommerce.jpg" alt=""></a>
                <div class="overlay">
                    <a rel="example_group" href="./template/basic/images/template/big/ecommerce.jpg" title="Lorem ipsum dolor sit amet" class="expand">+</a>
                    <a href="" class="btn btn-lg btn-primary expand-detail">Chi tiết</a>
                    <a class="close-overlay hidden">x</a>
                </div>
            </div>
            <div class="img">
                <a title="Lorem ipsum dolor sit amet"><img src="template/basic/images/template/big/ecommerce.jpg" alt=""></a>
                <div class="overlay">
                    <a rel="example_group" href="./template/basic/images/template/big/ecommerce.jpg" title="Lorem ipsum dolor sit amet" class="expand">+</a>
                    <a href="" class="btn btn-lg btn-primary expand-detail">Chi tiết</a>
                    <a class="close-overlay hidden">x</a>
                </div>
            </div>
            <div class="img">
                <a title="Lorem ipsum dolor sit amet"><img src="template/basic/images/template/big/ecommerce.jpg" alt=""></a>
                <div class="overlay">
                    <a rel="example_group" href="./template/basic/images/template/big/ecommerce.jpg" title="Lorem ipsum dolor sit amet" class="expand">+</a>
                    <a href="" class="btn btn-lg btn-primary expand-detail">Chi tiết</a>
                    <a class="close-overlay hidden">x</a>
                </div>
            </div>  
            <div class="img">
                <a title="Lorem ipsum dolor sit amet"><img src="template/basic/images/template/big/ecommerce.jpg" alt=""></a>
                <div class="overlay">
                    <a rel="example_group" href="./template/basic/images/template/big/ecommerce.jpg" title="Lorem ipsum dolor sit amet" class="expand">+</a>
                    <a href="" class="btn btn-lg btn-primary expand-detail">Chi tiết</a>
                    <a class="close-overlay hidden">x</a>
                </div>
            </div>  
        </div>
      </div>
      

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->


    </div><!-- /.container -->
    
<!-- FOOTER -->
      <footer>
          <div class="row" style="width: 1170px; margin: auto;">

                <div class="col-md-4">
                    <h4>Về chúng tôi</h4>
                    <ul>
                        <li><a href="#">Giới thiệu</a></li>
                        <li><a href="#">Liên hệ</a></li>
                        <li><a href="#">Kho giao diện</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>Dịch vụ</h4>
                    <ul>
                        <li><a href="#">Thiết kế website</a></li>
                        <li><a href="#">Xây dựng phần mềm quản lý</a></li>
                        <li><a href="#">Cung cấp Hosting</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>Thông tin liên hệ</h4>
                    <ul>
                        <li><p><i class="glyphicon glyphicon-map-marker"></i> Số 42b, ngõ 13, đội 1, Tả Thanh Oai, Thanh Trì, Hà Nội</p></li>
                        <li><p><i class="glyphicon glyphicon-phone-alt"></i> 01678 761 554</p></li>
                        <li></li>
                    </ul>
                </div>
            </div>
          <div class="row copyright">
              © Copyright Nguyễn Văn Thông 2015 - <?php echo date('Y'); ?>
          </div>
      </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.1.11.3.js"></script>
    <script src="js/jquery-latest.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="template/basic/js/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="template/basic/js/jquery.fancybox-1.3.4.pack.js"></script>
    <script type="text/javascript" src="template/basic/js/modernizr.js"></script>
  </body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        if (Modernizr.touch) {
            // show the close overlay button
            $(".close-overlay").removeClass("hidden");
            // handle the adding of hover class when clicked
            $(".img").click(function(e){
                if (!$(this).hasClass("hover")) {
                    $(this).addClass("hover");
                }
            });
            // handle the closing of the overlay
            $(".close-overlay").click(function(e){
                e.preventDefault();
                e.stopPropagation();
                if ($(this).closest(".img").hasClass("hover")) {
                    $(this).closest(".img").removeClass("hover");
                }
            });
        } else {
            // handle the mouseenter functionality
            $(".img").mouseenter(function(){
                $(this).addClass("hover");
            })
            // handle the mouseleave functionality
            .mouseleave(function(){
                $(this).removeClass("hover");
            });
        }
        
        $("a[rel=example_group]").fancybox({
                'transitionIn'		: 'none',
                'transitionOut'		: 'none',
                'titlePosition' 	: 'over',
                'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
                        return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
                }
        });
        
    });
</script>