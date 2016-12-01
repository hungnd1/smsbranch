

<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6 no-js" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7 no-js" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9 ]><html class="ie ie9 no-js" lang="en"><![endif]-->
<!--[if (gte IE 10)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>

<title>
	Sản phẩm
</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="css/master.css" rel="stylesheet" />
<link href="css/bentley.css" rel="stylesheet" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />




	<link rel="stylesheet" type="text/css" href="slick/slick.css">
        <link rel="stylesheet" type="text/css" href="slick/slick-theme.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- Add jQuery library -->
	<script type="text/javascript" src="lib/jquery-1.10.1.min.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
	<script src="slick/slick.js" type="text/javascript" charset="utf-8"></script>
    
    <script type="text/javascript">
		$(document).on('ready', function() {
	      $(".regular").slick({
	        slidesToShow: 1,
	        slidesToScroll: 1,
	        autoplay: true,
	        autoplaySpeed: 3000,
	        fade:true,
	        cssEase:'linear'
	        
	      });
      
		});

		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			
		});
    </script>

</head>
<body>
<?php
 include  "include/db_function.php";
    $sql_block = "SELECT * FROM tb_blocks";
    $row_block = mysql_fetch_assoc(mysql_query($sql_block));
    $id = 0;
    if(isset($_GET['id']))
        $id = $_GET['id'];
    $sql_pro = "SELECT * FROM tb_products WHERE pro_id=".$id;
    $result_pro = mysql_query($sql_pro);
    $count_pro = mysql_num_rows($result_pro);
    if(!$count_pro && $count_pro<=0)
    {
        echo "Không tìm thấy sản phẩm";
        exit ();
    }
    $stt=0;
    $row_pro = mysql_fetch_assoc($result_pro);
    $path_image = PATH.'tb-admin/images/no-image.png';
    if($row_pro['pro_images']!="")
        $path_image = PATH.'tb-admin/uploads/'.$row_pro['pro_images'];
    $pro_title=$row_pro["pro_title"];
    $pro_summary = $row_pro["pro_summary"];$pro_content = $row_pro["pro_content"];
    $pro_specification = $row_pro["pro_specificationsen"];
    $pro_specifications = $row_pro["pro_specifications"];
    if(isset($_SESSION['lang']) && $_SESSION['lang']=='en'){
        if($row_pro['pro_titleen']!="")
            $pro_title = $row_pro["pro_titleen"];
        if($row_pro["pro_summaryen"]!="")
            $pro_summary = $row_pro["pro_summaryen"];
        if($row_pro["pro_contenten"]!="")
            $pro_content = $row_pro["pro_contenten"];
        if($row_pro["pro_specificationsen"])
            $pro_specification = $row_pro["pro_specificationsen"];
    }
?>

<header id="header" class="brand">
	<?php require_once 'header.php'; ?>
</header>

    	<main class="sticky-margins">
            <div id="used-car-details" class="grid row">
            	<div class="col lg-3-5 md-1-2 sm-1-1">
                	<section class="regular slider">
                            <a class="fancybox" href="<?php echo $path_image; ?>" rel="used-car-img" width="500px">
                                <img id="Images_0" src="<?php echo $path_image; ?>" title="Images_0" width="600" />
                            </a>
                            <?php 
                                $sql_pro_doc = "SELECT * FROM tb_document WHERE document_entity = 'product' AND document_entityid = '$id'";
                                $result_pro_doc = mysql_query($sql_pro_doc);$stt=0;
                                while ($row_doc = mysql_fetch_assoc($result_pro_doc)) {
                                    $stt++;
                                    $path_image_doc = PATH.'tb-admin/images/no-image.png';
                                    if($row_doc['document_url']!="")
                                        $path_image_doc = PATH.'tb-admin/'.$row_doc['document_url'];

                            ?>
                            <a class="fancybox" href="<?php echo $path_image_doc; ?>">
                                    <img id="Images_<?php echo $stt; ?>" src="<?php echo $path_image_doc; ?>" alt="Images_<?php echo $stt; ?>" width="600" style="cursor:pointer;" />
                                    </a>
                                    
                                <?php } ?>
                    </section>
                </div>
                <div class="col lg-2-5 md-1-2 sm-1-1"  id="used-details-summary">
                    
                    <h1><?php echo $pro_title; ?></h1>
                    
                    <p class="price">$<?php echo number_format($row_pro['pro_price'],2); ?></p>
                    <div style="border: 1px solid ghostwhite; margin-bottom: 5px;">
                        <?php echo $pro_summary;  ?>
                    </div>
                    <div class="widget cta-box" style="padding: 16px;">
                        <h3><?php echo translate('Liên hệ đại lý'); ?></h3>
                        <p><a href="tel:<?php echo $row_block['phone'] ?>"><?php echo $row_block['phone']; ?></a><br />
                    </div>
                </div>
				
            </div>
            
            <div class="grid row">
                <div class="col lg-1-1 resp-tabs clearfix" id="used-details-tabs">
                    <ul class="tab-controls">
                        <li><?php echo translate("Thông số kỹ thuật");?></li>
                        <li><?php echo translate("Mô tả");?></li>
                    </ul>
    
                    <div class="resp-tabs-container">
                        <div id="specification" class="clearfix">
                            <?php echo $pro_specification; ?>
                        </div><!-- Overview -->
                        
                        <div id="description" class="clearfix">
                        	<div class="col lg-1-1"> 
                        	<?php echo $pro_content; ?>
                            </div>
                        </div><!-- Description --> 
                    </div>
                </div>
            </div> 
  

<script>
	$(document).ready( function() {
								
		// Carry email address to stock alert form
		var code = null;
			$('#StockEmail_StockEmail').keypress(function (e) {
				code = (e.keyCode ? e.keyCode : e.which);
				if (code == 13) {
					goToStockAlert();
					e.preventDefault();
				}
			});
	
			$('.stock-btn').click(function () {
				goToStockAlert();
				return false;
			});
	
			function goToStockAlert() {
				var email = $('#StockEmail_StockEmail').val();
				var baseUrl = location.protocol + '//' + location.host;
				var url = baseUrl + "/bentley/stock-update/" + "?Email_Address=" + email;
	
		if (email == "Your Email" || email == "") {
			$('#StockEmail_StockEmail').addClass('invalid');
		} else {
			window.location.href = url;
		}
		}
		 
	});
</script> <div id="YouMightLike">
	
            <div class="grid row">
                <div class="col lg-1-1">
                    <section class="widget" id="featured">
                        <h3><?php echo translate("Sản phẩm liên quan");?></h3> 	
                        <div id="Similar_RepeaterUpdatePanel">
		
<?php
    $sql_cate_ = "SELECT * FROM tb_products WHERE pro_cateidarr=".$row_pro['pro_cateidarr']." LIMIT 0,8";
    $result_cate_ = mysql_query($sql_cate_);
    while ($row_cate_ = mysql_fetch_assoc($result_cate_)){
            $path_image = PATH.'tb-admin/images/no-image.png';
    if($row_cate_['pro_images']!="")
        $path_image = PATH.'tb-admin/uploads/'.$row_cate_['pro_images'];
?>
<div class="col lg-1-1">
	<a href="<?php echo PATH.'product.php?id='.$row_cate_['pro_id']; ?>">
            <img id="<?php echo $row_cate_['pro_title']; ?>" Border="0" src="<?php echo $path_image; ?>" width="600" height="170" />
	<h4><?php echo $row_cate_['pro_title'] ?></h4>	
	<p class="similar-price">$<?php echo $row_cate_['pro_price']; ?></p>
        <span class="button dark"><?php echo translate("Chi tiết");?></span>
    </a>
</div>
    <?php } ?>

	</div>
                          
                        <div class="clearfix"></div>
                    </section>
                </div>
            </div>
			
</div>
            
        </main>
        
        <div id="social-share" class="tablet-hide" data-cms-node="58">
    <div class="grid row" data-cms-node="59">
        <div class="col lg-1-1" data-cms-node="60">
            <!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
    <a href="#" title="Facebook" rel="nofollow" class="addthis_button_facebook at300b"></a>
    <a href="#" title="Tweet" rel="nofollow" class="addthis_button_twitter at300b"></a>
    <a href="#" title="Pinterest" target="_blank" rel="nofollow" class="addthis_button_pinterest_share at300b"></a>
    <a href="#" title="Google+" target="_blank" rel="nofollow" class="addthis_button_google_plusone_share small-mobile-hide"></a>
    <a href="#" rel="nofollow" class="addthis_counter addthis_bubble_style"></a>
</div>

<script type="text/javascript">// <![CDATA[
var addthis_config = {
        "data_track_addressbar" : false
    };
    var addthis_share = {
        url : window.location.href.match(/^[^\#\?]+/)[0]
    };
// ]]></script>
<script type="text/javascript" src="s7.addthis.com/js/300/addthis_widget.js"></script>
<!-- /s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5228db7b5638de45 -->
        </div>
    </div>
</div>
<div id="live-chat" class="tablet-hide" data-cms-node="61">
    <div class="grid row" data-cms-node="62">
        <div class="col lg-1-1" data-cms-node="63">
        	<div class="live-chat-icon" data-cms-node="64">                
             <!-- BoldChat Live Chat Button HTML v5.00 (Type=Web,ChatButton=HRO Chat button1,Website=HR Owen Website) -->
                <script type="text/javascript">
                  var bccbId = Math.random(); document.write(unescape('%3Cdiv id=' + bccbId + '%3E%3C/div%3E'));
                  window._bcvma = window._bcvma || [];
                  _bcvma.push(["setAccountID", "897265519338758685"]);
                  _bcvma.push(["setParameter", "WebsiteID", "1221188298347044572"]);
                  _bcvma.push(["addStatic", {type: "chat", bdid: "4530181058084085051", id: bccbId}]);
                  var bcLoad = function(){
                    if(window.bcLoaded) return; window.bcLoaded = true;
                    var vms = document.createElement("script"); vms.type = "text/javascript"; vms.async = true;
                    vms.src = ('https:'==document.location.protocol?'https://':'http://') + "vmss.boldchat.com/aid/897265519338758685/bc.vms4/vms.js";
                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(vms, s);
                  };
                  if(window.pageViewer && pageViewer.load) pageViewer.load();
                  else if(document.readyState=="complete") bcLoad();
                  else if(window.addEventListener) window.addEventListener('load', bcLoad, false);
                  else window.attachEvent('onload', bcLoad);
                </script>
                <!-- /BoldChat Live Chat Button HTML v5.00 -->
            </div>
        </div>
    </div>
</div>




<div id="shortlist-sticky" class="tablet-hide">
    <div class="grid row">
        <div class="col lg-1-1">
        	<div class="shortlist-icon">
                <span class="shortlist-count">
<!--
    ///////////////////////////////////////////////////
    Start of COGNumberOfResults_V1
    ///////////////////////////////////////////////////
-->
0
<!--
    ///////////////////////////////////////////////////
    End of COGNumberOfResults_V1
    ///////////////////////////////////////////////////
--></span>
                <a title="Favourites" href="/bentley/approved-used/favourites"><img src="img/used-cars/shortlist.gif"  alt="Favourites" /></a>
            </div>
        </div>
    </div>
</div>

<div class="hide">
    <div id="Shortlist_RepeaterUpdatePanel">
	






</div>
    
</div>


<div id="sticky-mobile-links" class="tablet-show">
    <div class="grid row">
        <div class="col lg-1-1">
            <!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
    <a href="#" title="Facebook" rel="nofollow" class="addthis_button_facebook at300b"></a>
    <a href="#" title="Tweet" rel="nofollow" class="addthis_button_twitter at300b"></a>
    <a href="#" title="Pinterest" target="_blank" rel="nofollow" class="addthis_button_pinterest_share at300b"></a>
    <a href="#" title="Google+" target="_blank" rel="nofollow" class="addthis_button_google_plusone_share small-mobile-hide"></a>
    <a href="#" rel="nofollow" class="addthis_counter addthis_bubble_style"></a>
</div>

<script type="text/javascript">// <![CDATA[
var addthis_config = {
        "data_track_addressbar" : false
    };
    var addthis_share = {
        url : window.location.href.match(/^[^\#\?]+/)[0]
    };
// ]]></script>
<script type="text/javascript" src="s7.addthis.com/js/300/addthis_widget.js"></script>
<!-- /s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5228db7b5638de45 -->
			<div class="other-links">
                <div class="live-chat-icon">
                	<!-- BoldChat Live Chat Button HTML v5.00 (Type=Web,ChatButton=HRO Chat Button3,Website=HR Owen Website) -->
<script type="text/javascript">
  var bccbId = Math.random(); document.write(unescape('%3Cdiv id=' + bccbId + '%3E%3C/div%3E'));
  window._bcvma = window._bcvma || [];
  _bcvma.push(["setAccountID", "897265519338758685"]);
  _bcvma.push(["setParameter", "WebsiteID", "1221188298347044572"]);
  _bcvma.push(["addStatic", {type: "chat", bdid: "2615959671024689927", id: bccbId}]);
  var bcLoad = function(){
    if(window.bcLoaded) return; window.bcLoaded = true;
    var vms = document.createElement("script"); vms.type = "text/javascript"; vms.async = true;
    vms.src = ('https:'==document.location.protocol?'https://':'http://') + "vmss.boldchat.com/aid/897265519338758685/bc.vms4/vms.js";
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(vms, s);
  };
  if(window.pageViewer && pageViewer.load) pageViewer.load();
  else if(document.readyState=="complete") bcLoad();
  else if(window.addEventListener) window.addEventListener('load', bcLoad, false);
  else window.attachEvent('onload', bcLoad);
</script>
<!-- /BoldChat Live Chat Button HTML v5.00 -->
                </div>
                <div class="shortlist-icon">
                	<a title="Favourites" href="/bentley/approved-used/favourites">
                    <span class="shortlist-count-mobile">
<!--
    ///////////////////////////////////////////////////
    Start of COGNumberOfResults_V1
    ///////////////////////////////////////////////////
-->
0
<!--
    ///////////////////////////////////////////////////
    End of COGNumberOfResults_V1
    ///////////////////////////////////////////////////
--></span>
                    <img src="img/used-cars/shortlist-mobile.gif" alt="Favourites" /></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="footer">
    <div id="footer-inner">
        <?php require_once 'footer.php'; ?>
    </div>
</div>

  

<script type="text/javascript">
//<![CDATA[
Sys.Application.add_init(function() {
    $create(Sys.Extended.UI.FilteredTextBoxBehavior, {"ValidChars":"-1234567890","id":"COGCodeWeaverDeposit_V1_ctl00"}, null, null, $get("COGCodeWeaverDeposit_V1_Deposit"));
});
Sys.Application.add_init(function() {
    $create(Sys.Extended.UI.TextBoxWatermarkBehavior, {"ClientStateFieldID":"StockEmail__ClientState","WatermarkText":"Your Email","id":"StockEmail_ctl00"}, null, null, $get("StockEmail_StockEmail"));
});
//]]>
</script>
</form>
  <!--cms-disable-->
<script src="js/plugins.js"></script>
<script src="js/global.js"></script>
<script src="js/linearicons.js"></script>
<!--/cms-disable-->

  <script src="js/used-car-results.js"></script>


</body>
</html>
