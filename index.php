<?php 
    header('Content-type: text/html; charset=gbk');

    $KISSYNum = '1.2.0';
    $page = $_GET['page'];
    require_once 'sider.php';
    /*echo "<br />done<br /><br />";*/
    if ($page) {
    	include "$page/index.php";
    } else {
    	include 'readme.md';
    }
    

?>
