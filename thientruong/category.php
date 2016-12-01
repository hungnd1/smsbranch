
<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6 no-js" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7 no-js" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9 ]><html class="ie ie9 no-js" lang="en"><![endif]-->
<!--[if (gte IE 10)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head><meta http-equiv="X-UA-Compatible" content="IE=edge" /><title>
	Danh sách sản phẩm
</title>
<meta name="description" content="Flying Spur " />
<meta name="keywords" content="Flying Spur, " />
<meta name="author" content="Bluesky Interactive" />
<meta name="robots" content="index,follow,noodp,noydir" />
<meta charset="utf-8" />
<link rel="canonical" href="www.hrowen.co.uk/bentley/used-bentley/flying-spur" />
<link href="css/master.css" rel="stylesheet" />
<link href="css/bentley.css" rel="stylesheet" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" /><link rel="icon" href="favicon.ico" type="image/x-icon" />
<script src="js/modernizr.js"></script>
<script src="code.jquery.com/jquery-1.9.1.js"></script>
<script src="maps.google.com/maps/api/js_-788706587.jpg"></script>

</head>
<body class="used-cars">
<?php
 include  "include/db_function.php";
 
?>

<header id="header" class="brand">
    <header id="header" class="brand">
    <?php require_once 'header.php'; ?>
    </header>
</header>
        
        <main class="sticky-margins">
            
            <div id="used-car-details" class="grid row">
                <div class="col lg-1-1">
                    <?php echo $count_page['page_content']; ?>
                </div>
            </div>
            
        </main>
        
            
        	
            
            <div class="sticky" id="results-controls">
                <div class="grid row">
                    <div class="col lg-1-1">                        
<?php
 include  "include/Pagination.php";
 $cate_id = -1;$mid=-1;
 if(isset($_GET['cate_id']))
    $cate_id = $_GET['cate_id'];
 if(isset($_GET['mid']))
     $mid = $_GET['mid'];
 $cate_arr[]=$cate_id;
 // Lấy page con
$sql_menu_sub = mysql_fetch_assoc(mysql_query("SELECT menu_id FROM `tb_menu` WHERE status=1 AND entity_id='".$cate_id."'"));
if($sql_menu_sub['menu_id']!="" && isset($sql_menu_sub['menu_id'])){
$sql_page = "SELECT * FROM `tb_menu` WHERE status=1 AND parent_id='".$sql_menu_sub['menu_id']."'";
$result_page = mysql_query($sql_page);
$result_page_count = mysql_num_rows($result_page);
if(count($result_page_count)>0){
    
    while ($row_page = mysql_fetch_assoc($result_page)) {
        $cate_arr[]=$row_page['entity_id'];
    }
}
}
$sql_cate = "SELECT * FROM tb_products WHERE pro_status=1 AND  pro_cateidarr IN (".implode(',', $cate_arr).") ORDER BY pro_id DESC";
$result_cate = mysql_query($sql_cate);
$result_cate_count = mysql_num_rows($result_cate);
$stt=0;

//Phân trang
$config = array(
    'current_page'  => isset($_GET['page']) ? $_GET['page'] : 1, // Trang hiện tại
    'total_record'  => $result_cate_count, // Tổng số record
    'limit'         => 8,// limit
    'link_full'     => 'category.php?cate_id=1&page={page}',// Link full có dạng như sau: domain/com/page/{page}
    'link_first'    => 'index.php',// Link trang đầu tiên
);
 
$paging = new Pagination();
 
$paging->init($config);
 
echo $paging->html();
?>
<!--
    ///////////////////////////////////////////////////
    End of COGPagerUnorderedList_V1
    ///////////////////////////////////////////////////
-->
                    </div>
                </div>
            </div>
            
            <div class="grid row">
                <div id="used-list">
                    <div id="COGDynamicRepeater_V1_RepeaterUpdatePanel">

<?php 

while ($row_cate = mysql_fetch_array($result_cate)) {
    $stt++;
    $path_image = PATH.'tb-admin/images/no-image.png';
    if($row_cate['pro_images']!="")
        $path_image = PATH.'tb-admin/uploads/'.$row_cate['pro_images'];
    $pro_title=$row_cate["pro_title"];
    $pro_summary = $row_cate["pro_summary"];
    if(isset($_SESSION['lang']) && $_SESSION['lang']=='en'){
        if($row_cate['pro_titleen']!="")
            $pro_title = $row_cate["pro_titleen"];
        if($row_pro["pro_summaryen"]!="")
            $pro_summary = $row_cate["pro_summaryen"];
    }
?>
<article class="used-list-vehicle clearfix"> 

    <div class="col lg-1-3">
        <div class="used-list-vehicle-image">
            <a href="<?php echo PATH.'product.php?id='.$row_cate['pro_id']; ?>"><img id="<?php echo $row_cate['pro_title']; ?>" Border="0" src="<?php echo $path_image; ?>" width="600" /></a>
            
            
            <p class="image-count"><i class="fa fa-camera"></i> <?php echo $stt; ?></p>
            
            
            <!---->
        </div>
     </div>
        

    <div class="used-list-summary col lg-2-3">
    	<div class="list-price">
            <p><span class="price">$<?php echo number_format($row_cate['pro_price']); ?></span></p>
        </div>
        <div class="list-title">
            <a href="<?php echo PATH.'product.php?id='.$row_cate['pro_id']; ?>" class="no-dec"><h2><?php echo $pro_title; ?></h2></a>
		</div>
        <div class="clearfix"></div>
                        
        <div class="col lg-1-2 main skinny left">  
        	<?php echo ($pro_summary!="") ? $pro_summary : '&nbsp;'; ?>
        </div> 
        <div class="col lg-1-2 main skinny right">   
        	




<!--<p class="list-telephone"><i class="icon-phone-outgoing"></i> 

<a href="tel:0333 240 1587">0333 240 1587</a>
<br />
<small>Calls charged at local rates and recorded for verification</small></p>-->


            
            <div class="list-cta">
            	<div class="col lg-1-2 skinny left">
                    &nbsp;
                </div>
                <div class="col lg-1-2 skinny right">
                    <a href="<?php echo PATH.'product.php?id='.$row_cate['pro_id']; ?>" class="button dark"><?php echo translate('Xem chi tiết');?></a>
                </div>
            </div>
        </div> 
    </div>
</article>

                        <?php } ?>



</div>
                </div>
            
                <div id="results-controls">
                    <div class="col lg-1-1">
                                
<?php echo $paging->html(); ?>
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


</form>
<script src="code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="js/plugins.js"></script>
<script src="js/global.js"></script>
<script src="js/linearicons.js"></script>
<!--/cms-disable-->

  <script src="js/used-car-results.js"></script>
</body>
</html>
