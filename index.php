<?php 
    header('Content-type: text/html; charset=gbk');

    $KISSYNum = '1.2.0';
    $page = $_GET['page'];
    $allowed_array = array();
// 输出目录
    $path = dirname(__FILE__);
    $filter_array = array('.git', 'tool');
    $handle = opendir($path);
    $htmlStr = '<ul class="nav-list">';
    

    while ($file = readdir($handle)) {
        if ($file != '.' && $file != '..') {
            if (is_dir($file) && !in_array($file, $filter_array)) {
                // echo "__". $file;
                // echo "<br/>";
                array_push($allowed_array, $file);
                $htmlStr .= "<li><a href=\"index.php?page=$file\" >".$file."</a>";
            }
        }
    }
    $htmlStr .= '</ul>';
    echo $htmlStr;

// 引用相关文件
    if (isset($page) && in_array($page, $allowed_array)) {
    	include "$page/index.php";
    } else {
    	include 'readme.md';
    }
    
    // var_dump($allowed_array);


?>
