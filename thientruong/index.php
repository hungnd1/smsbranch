<?php include  "include/db_function.php";
?>
<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6 no-js" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7 no-js" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9 ]><html class="ie ie9 no-js" lang="en"><![endif]-->
<!--[if (gte IE 10)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head><meta http-equiv="X-UA-Compatible" content="IE=edge" /><title>
	Trang chủ
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/master.css" rel="stylesheet" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />

<!-- <script src="code.jquery.com/jquery.min.js"></script> -->
<script src="js/modernizr.js"></script>
<script src="code.jquery.com/jquery-1.9.1.js"></script>




  <style>
  body, html  {height: 100%; min-height: 100%;}
  </style>
</head>
<body class="group">
<?php
    $sql_block = "SELECT * FROM tb_blocks";
    $row_block = mysql_fetch_assoc(mysql_query($sql_block));
    $path_logo = PATH.'tb-admin/images/no-image.png';
    if($row_block['block_logo']!="")
        $path_logo = PATH.'tb-admin/uploads/'.$row_block['block_logo'];
?>

    <div id="group-header">
    	<p class="logo">
            <a href="<?php echo PATH; ?>"><img src="<?php echo $path_logo; ?>" width="154" height="69" itemprop="logo"></a>
        </p>
        <nav id="group-nav" class="tablet-hide">
            <ul>
                <?php
                    $sql_menu = "SELECT * FROM `tb_menu` WHERE status=1 AND parent_id=0 ORDER BY `tb_menu`.`menu_order` ASC ";
                    $result_menu = mysql_query($sql_menu);
                    $cate_count = mysql_num_rows($result_menu);
                    $mid_cate = intval($cate_count/2);$stt=0;
                    $mid_cate_1 = $mid_cate+1;
                    while ($row = mysql_fetch_assoc($result_menu)) {
                        $stt++;$class = "left";
                        if($stt==$mid_cate){
                           $class = "left last";
                        }
                        else if($stt==$mid_cate_1){
                           $class = "right first";
                        }
                        else if($stt>$mid_cate_1){
                           $class = "right";
                        }
                        if($row['entity_type']=='Category'){
                            $url_menu = PATH.'category.php?cate_id='.$row['entity_id'];
                            $row_cate = mysql_fetch_assoc(mysql_query('SELECT cate_title FROM tb_categories WHERE cate_id = '.$row['entity_id']));                           
                            $menu_name = $row_cate['cate_title'];
                        }
                        elseif($row['entity_type']=="Page"){
                            $url_menu = PATH.'page.php?page_id='.$row['entity_id'];
                            $row_cate = mysql_fetch_assoc(mysql_query('SELECT page_title FROM tb_pages WHERE page_id = '.$row['entity_id']));                           
                            $menu_name = $row_cate['page_title'];
                        }
                        else{
                            $url_menu ="#";
                            $menu_name = "";
                        }
                ?>
                <li class="<?php echo $class; ?>"><a href="<?php echo $url_menu; ?>" title="<?php echo $url_menu; ?>"><?php echo translate($menu_name); ?></a></li>
                <?php }?>

                
            </ul>
        </nav>
        <div id="brand-select" class="tablet-show">
    <div class="grid row">
        <div class="col lg-1-1">
            <div class="brand-outer">
                <div id="brand-dropdown-link"><a href="#"></a></div>
                    <div id="brand-dropdown">
                        <h1>Please Choose</h1>
                        <ul>
                            <?php 
                                $stt = 0;
                                $sql_menu1 = "SELECT * FROM `tb_menu` WHERE status=1 AND parent_id=0 ORDER BY `tb_menu`.`menu_order` ASC ";
                                $result_menu1 = mysql_query($sql_menu1);$menu_name="";$url_menu="";
                                while ($row1 = mysql_fetch_assoc($result_menu1)) {
                                    $stt++;
                                    if($row1['entity_type']=='Category'){
                                        $url_menu = PATH.'category.php?cate_id='.$row1['entity_id'];
                                        $row_cate1 = mysql_fetch_assoc(mysql_query('SELECT cate_title FROM tb_categories WHERE cate_id = '.$row1['entity_id']));                           
                                        $menu_name = $row_cate1['cate_title'];
                                    }
                                    elseif($row1['entity_type']=="Page"){
                                        $url_menu = PATH.'page.php?page_id='.$row1['entity_id'];
                                        $row_cate1 = mysql_fetch_assoc(mysql_query('SELECT page_title FROM tb_pages WHERE page_id = '.$row1['entity_id']));                           
                                        $menu_name = $row_cate1['page_title'];
                                    }
                                    else{
                                        $url_menu ="#";
                                        $menu_name = "";
                                    }
                                
                                ?>
                            <li><a href="<?php echo $url_menu ?>" title="<?php echo strtoupper(translate($menu_name)); ?>" class="aston-martin"><?php echo translate($menu_name); ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>                        
                </div>
            </div>
        </div>
    </div>
</div>

<div id="contact-blackout"></div>
<div id="brand-blackout"></div>
    </div> 

    <main style="overflow: hidden; height: 616px;">
        <div class="tablet-hide">
        <div id="full-image" >
            <?php
                $sql_cate0 = "SELECT * FROM `tb_categories` WHERE categories_type=2 ORDER BY `tb_categories`.`cate_order` ASC LIMIT 0,16";
                $result_cate0 = mysql_query($sql_cate0);$stt=0;
                while ($row0 = mysql_fetch_assoc($result_cate0)) {
                    $stt ++;
                    $active_class = "";
                    if($stt==1)
                        $active_class = "home_active";
                    $path_image = PATH.'tb-admin/images/no-image.png';
                    if($row0['cate_image']!="")
                        $path_image = PATH.'tb-admin/uploads/'.$row0['cate_image'];
            ?>
                <div id="home<?php echo $stt; ?>" class="home <?php echo $active_class; ?>">
                    <a href="<?php echo PATH.'category.php?cate_id='.$row0['cate_id'];?>"><img style="width: 100%; height: 100%;min-height: 100%; margin-top: -80px;" src="<?php echo $path_image; ?>"></a>
                </div>
            <?php
                }
            ?>

        </div>
        </div>
        <div id="full-image" class="tablet-show">
            <img src="img/1.jpg" width="100%" height="650" >
        </div>
    
        <div id="brands" class="tablet-hide">
            <div class="brands-inner">
                <div><img src="img/backgrounds/group-brand-spacer.gif" alt="HR Owen"></div> 
                <div class="center">
                    <ul>
                        <?php 
                        $stt = 0;
                        $sql_cate1 = "SELECT * FROM `tb_categories` WHERE categories_type=2  ORDER BY `tb_categories`.`cate_order` ASC LIMIT 0,16";
                        $result_cate1 = mysql_query($sql_cate1);
                        while ($row1 = mysql_fetch_assoc($result_cate1)) {
                            $stt ++;$title_cate=$row1['cate_title'];
                            $url_menu1 = PATH.'category.php?cate_id='.$row1['cate_id'];
                            ?>
                                <li><a href="<?php echo $url_menu1; ?>" id="<?php echo $stt; ?>" onmousemove="function_name(this.id)" title="Aston Martin" class="aston-martin"><?php echo translate($title_cate); ?></a></li>	
                        <?php } ?>	
                    </ul>
                </div> 
                <div><img src="img/backgrounds/group-brand-spacer.gif" alt="HR Owen"></div> 
            </div>
        </div>
        
        <div id="mobile-ctas" class="tablet-show">
            <ul>
                <?php 
                $stt = 0;
                $sql_cate2 = "SELECT * FROM `tb_categories` WHERE categories_type=2  ORDER BY `tb_categories`.`cate_order` ASC LIMIT 0,9";
                $result_cate2 = mysql_query($sql_cate2);
                while ($row2 = mysql_fetch_assoc($result_cate2)) {
                    $stt ++;$title_cate=$row2['cate_title'];
                    $url_menu2 = PATH.'category.php?cate_id='.$row2['cate_id'];
                    ?>
                        <li><a href="<?php echo $url_menu2; ?>" id="<?php echo $stt; ?>" class="aston-martin"><?php echo translate($title_cate); ?></a></li>	
                <?php } ?>	
            </ul>
        </div>
        
    </main>
          
	<div id="footer-blackout"></div>
<div id="slide-footer">
    <div id="footer-bar">
        <div class="grid row">
            <div class="col lg-1-3">
                <?php //if(isset($_SESSION['lang']) && $_SESSION['lang']=="en"){?>
                <a href="<?php echo PATH ?>change_lang.php?lang=vi&r=<?php echo $_SERVER['PHP_SELF']; ?>"><img height="17" width="24" src="<?php echo PATH ?>img/icon/icon-vn.png" alt="icon vn" style="display: inline" /></a>&nbsp;
                <?php //}else{ ?>
                    <a href="<?php echo PATH ?>change_lang.php?lang=en&r=<?php echo $_SERVER['PHP_SELF']; ?>"><img height="16" width="24" src="<?php echo PATH ?>img/icon/icon-en.png" alt="icon en" style="display: inline" /></a>
                <?php //} ?>
            </div>
            <div class="col lg-1-3">
                    <ul class="footer-social" style="padding-left: 140px;">
                        <li class="first"><a href="#" itemprop="sameAs" target="_blank" class="icon-ff">&nbsp;</a></li>
                        <li><a href="#" itemprop="sameAs" target="_blank" class="icon-tw">&nbsp;</a></li>
                        <li class="last"><a href="#" itemprop="sameAs" target="_blank" class="icon-gg">&nbsp;</a></li> 
                    </ul>
            </div>
            <div class="col lg-1-3">
                    <p id="footer-toggle"><?php echo translate("Xem thông tin về công ty"); ?><!-- <i class="fa fa-chevron-up"></i> --><!-- <i class="fa fa-chevron-up"></i> --></p>
            </div>
        </div>
    </div>
    <div id="footer-inner">
       <?php require_once 'footer.php'; ?>
    </div>

</div><!--cms-disable-->
<script src="code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="js/plugins.js"></script>
<script src="js/global.js"></script>
<script src="js/linearicons.js"></script>
<!--/cms-disable-->

  <script src="js/group-home.js"></script>
</body>
</html>

