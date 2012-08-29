<?php 
    header('Content-type: text/html; charset=gbk');

    $KISSYNum = '1.2.0';
    $page = $_GET['page'];
    $allowed_array = array();
    require_once 'sider.php';
    // $pa = Null;
    // var_dump(empty($pa));
    // echo is_bool(preg_grep("/index/i", $page));
    // echo "<br />done<br /><br />";
    if (isset($page) && in_array($page, $allowed_array)) {
    	include "$page/index.php";
    } else {
    	include 'readme.md';
    }
    
    // var_dump($allowed_array);


?>
