<?php
    $sql_block = "SELECT * FROM tb_blocks";
    $row_block = mysql_fetch_assoc(mysql_query($sql_block));
    $path_logo = PATH.'tb-admin/images/no-image.png';
    if($row_block['block_logo']!="")
        $path_logo = PATH.'tb-admin/uploads/'.$row_block['block_logo'];
    

    
?>
<div class="grid row">
    	<div class="col lg-1-1">
        
        	
         <div class="logo">
                <a href="<?php echo PATH; ?>" title="logo" itemprop="url">
                    <img src="<?php echo $path_logo; ?>" width="155" itemprop="logo" alt="logo">
                </a>
            </div>      
            <div class="franchise-logo">
                <?php echo $row_block['block_header']; ?>
            </div>
        </div>
    <div style="float: right;margin-top:-6px;text-align: right;width: 100%;padding-right: 16px;">
        <a href="<?php echo PATH ?>change_lang.php?lang=vi&r=<?php echo $_SERVER['REQUEST_URI']; ?>"><img height="17" width="24" src="<?php echo PATH ?>img/icon/icon-vn.png" alt="icon vn" style="display: inline" /></a>&nbsp;
        <a href="<?php echo PATH ?>change_lang.php?lang=en&r=<?php echo $_SERVER['REQUEST_URI']; ?>"><img height="16" width="24" src="<?php echo PATH ?>img/icon/icon-en.png" alt="icon en" style="display: inline" /></a>
    </div>
    </div> 

    <nav id="nav">
    <div class="grid row">
        <div class="col lg-1-1 skinny">
            <ul>
                <li><a href="<?php echo PATH; ?>" title="Trang chủ"><?php echo translate("Trang chủ");?></a></li>
                <?php
                    $sql_menu = "SELECT * FROM `tb_menu` WHERE status=1 AND parent_id=0 ORDER BY `tb_menu`.`menu_order` ASC ";
                    $result_menu = mysql_query($sql_menu);
                    $result_menu_sub_count = mysql_num_rows($result_menu);
                    while ($row = mysql_fetch_assoc($result_menu)) {
                        if($row['entity_type']=='Category'){
                            $url_menu = PATH.'category.php?cate_id='.$row['entity_id'].'&mid='.$row['menu_id'];
                            $row_cate = mysql_fetch_assoc(mysql_query('SELECT cate_title FROM tb_categories WHERE cate_id = '.$row['entity_id']));                           
                            $menu_name = $row_cate['cate_title'];
                        }
                        elseif($row['entity_type']=="Page"){
                            $url_menu = PATH.'page.php?page_id='.$row['entity_id'];
                            $row_cate = mysql_fetch_assoc(mysql_query('SELECT page_title FROM tb_pages WHERE page_id = '.$row['entity_id']));                           
                            $menu_name = $row_cate['page_title'];
                        }
                        else
                            $url_menu ="#";
                        $sql_menu_sub = "SELECT * FROM `tb_menu` WHERE status=1 AND parent_id='".$row['menu_id']."' ORDER BY `tb_menu`.`menu_order` ASC ";
                        $result_menu_sub = mysql_query($sql_menu_sub);
                ?>
                <li>
                    <a href="<?php echo $url_menu; ?>" title="<?php echo translate($menu_name);?>"><?php echo translate($menu_name);?></a>
                    <?php if($result_menu_sub_count>0){ $menu_name = "";?>
                    <ul>
                        <?php while ($rowsub = mysql_fetch_assoc($result_menu_sub)) {
   
                                if($rowsub['entity_type']=='Category'){
                                    $url_menu = PATH.'category.php?cate_id='.$rowsub['entity_id'].'&mid='.$rowsub['menu_id'];
                                    $row_cate1 = mysql_fetch_assoc(mysql_query('SELECT cate_title FROM tb_categories WHERE cate_id = '.$rowsub['entity_id']));                           
                                    $menu_name = $row_cate1['cate_title'];
                                }
                                elseif($rowsub['entity_type']=="Page"){
                                    $url_menu = PATH.'page.php?page_id='.$rowsub['entity_id'];
                                    $row_cate1 = mysql_fetch_assoc(mysql_query('SELECT page_title FROM tb_pages WHERE page_id = '.$rowsub['entity_id']));                           
                                    $menu_name = $row_cate1['page_title'];
                                }
                                else
                                    $url_menu ="#";
                            ?>
                            <li><a href="<?php echo $url_menu; ?>" title="<?php echo translate($menu_name);?>"><?php echo translate($menu_name);?></a></li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </li>   
                    <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<div class="mean-menu"></div>   

