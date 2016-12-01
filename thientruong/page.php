

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


<script src="js/modernizr.js"></script>
<script src="code.jquery.com/jquery-1.9.1.js"></script>
<script src="maps.google.com/maps/api/js_-788706587.jpg"></script>



</head>
<body>
<?php
 include  "include/db_function.php";
    $page_id = 0;
    if(isset($_GET['page_id']))
        $page_id = $_GET['page_id'];
    $sql_page = "SELECT * FROM tb_pages WHERE page_id=".$page_id;
    $result_page = mysql_query($sql_page);
    $count_page = mysql_num_rows($result_page);
    if(!$count_page && $count_page<=0)
    {
        echo "Không tìm thấy bài viết";
        exit ();
    }
    $stt=0;
    $count_page = mysql_fetch_assoc($result_page);
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
<script src="code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="js/plugins.js"></script>
<script src="js/global.js"></script>
<script src="js/linearicons.js"></script>
<!--/cms-disable-->

  <script src="js/used-car-results.js"></script>


</body>
</html>
