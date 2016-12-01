<?php
    $sql_block = "SELECT * FROM tb_blocks";
    $row_block = mysql_fetch_assoc(mysql_query($sql_block));
    $footer_text = $row_block['block_footer'];
    if(isset($_SESSION['lang']) && $_SESSION['lang']=='en' && $row_block['block_footer_en']!="")
        $footer_text = $row_block['block_footer_en'];

?>
    <div class="grid row">
            <div class="col lg-2-3 md-1-1 pull-right mobile-hide">
            <h2><?php echo translate("Hãng xe"); ?></h2>
            <p>
            <?php $sql_cate = "SELECT * FROM `tb_categories` WHERE categories_type=2 ORDER BY `tb_categories`.`cate_order` ASC LIMIT 0,16";
                            $result_cate = mysql_query($sql_cate);$stt=0;
                            $result_cate_count = mysql_num_rows($result_cate);
                            while ($row = mysql_fetch_assoc($result_cate)) {$stt++;
                            ?>
                <a href="<?php echo PATH.'category.php?cate_id='.$row['cate_id']; ?>" title="<?php echo $row['cate_title'] ?>"><?php echo strtoupper(translate($row['cate_title'])); ?></a>
                            <?php 
                            if($stt%8==0)
                                echo '<br>';
                            else if($stt<8)
                                echo '<span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>';
                            if($stt%12==0)
                                echo '<br>';
                            else if($stt>8 && $stt!=$result_cate_count)
                                echo '<span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>';
                                
                             } ?>
            </p>
        </div>
        <div class="col lg-1-3 md-1-1">
            <h2><?php echo translate("Thông tin công ty"); ?></h2>    
            <div>
                     <?php echo $footer_text; ?>               
            </div>
            <br>
            <p>Designed by <a href="http://tananhjsc.com/">tananhjsc.com</a></p>
        </div>
        
    </div>



