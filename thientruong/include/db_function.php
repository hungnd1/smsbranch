<?php
include "config.php";
session_start();
db_connect(DATEBASE_LOCALHOST, DATEBASE_USERNME, DATEBASE_PASSWORD, DATEBASE_DBNAME);

function db_connect($db_dost, $db_username, $db_password, $db_name)
{
    $link = mysql_connect($db_dost, $db_username, $db_password);
    mysql_set_charset('utf8',$link);
    if (!$link) {
        die('Could not connect: ' . mysql_error());
    }
    $db_selected = mysql_select_db($db_name, $link);
    if (!$db_selected) {
        die('Can\'t use foo : ' . mysql_error());
    }

}

function translate($messege){
    if(isset($_SESSION['lang']))
        $lang = $_SESSION['lang'];
    else
        $lang = LANG;
    $result_translate = mysql_query('SELECT * FROM lb_sys_translate');
    $r_messege = "";
    $lang_en_arr = array();
    while ($row = mysql_fetch_assoc($result_translate)) {
        $lang_en_arr[$row['lb_translate_vn']] = $row['lb_tranlate_en'];
    }
    
    if($lang=='en'){
       $r_messege = $lang_en_arr[$messege];
    }
    if($r_messege=="")
        $r_messege = $messege;
    return $r_messege;
}

 function check_email($email) {  // hàm kiểm tra email
            if (strlen($email) == 0) return false;
            if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) return true;
            return false;
        }
