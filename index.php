<?php 
    header('Content-type: text/html; charset=gbk');
    include_once 'tool/markdown/markdown.php';
 ?>

<!-- <link href="http://a.tbcdn.cn/s/kissy/1.2.0/cssreset/reset-min.css" rel="stylesheet"/> -->
<link rel="stylesheet" href="tool/bootstrap/bootstrap.css">
<link rel="stylesheet" href="http://ux.etao.net/webgit/css/markdown.css">
<style type="text/css">
    /*#C-nav {
        width: 160px;
        float: left;
    }
    #C-nav-list { 
        padding-right: 20px;     
        text-align: right;
        list-style: none;
    }
    #C-content {
        margin-left: 160px;
    }
    #C-markdown {
        padding-top: 20px;
        margin-top: 10px;
        border-top: 2px solid #000;
    }*/

    /*布局样式修正*/
    #C-nav-list {      
        text-align: right;
        list-style: none;
    }

    #C-markdown {
        padding-top: 20px;
        margin-top: 10px;
        border-top: 2px solid #000;
    }


    /*jasmine 样式修正*/
    #TrivialReporter label {
        display: inline;
    }

    #TrivialReporter input {
        margin-top: 0px;
    }


</style>
<script type="text/javascript" src="http://a.tbcdn.cn/s/kissy/1.2.0/kissy-min.js"></script>

<?php     
    $path = dirname(__FILE__);

    $KISSYNum = '1.2.0';

    $page = $_GET['page'];
    $test = $_GET['test'];

    $allowed_array = array();

    echo '<div class="container-fluid"><div class="row-fluid">';
// 输出目录
    $filter_array = array('.git', 'tool');
    $handle = opendir($path);
    $htmlStr = '<div id="C-nav" class="span1"><ul id="C-nav-list">';
    
    while ($file = readdir($handle)) {
        if ($file != '.' && $file != '..') {
            if (is_dir($file) && !in_array($file, $filter_array)) {
                array_push($allowed_array, $file);
                $htmlStr .= "<li><a href=\"index.php?page=$file\" >".$file."</a>";
            }
        }
    }

    $htmlStr .= '</ul></div>';
    echo $htmlStr;

    echo '<div id="C-content" class="span11">';
// 引用相关文件
    if (isset($page) && in_array($page, $allowed_array)) {
        $fileSrc = '';
        if (isset($test)) {
            $fileSrc = "$page/test/index.php";
        } else {
            $fileSrc = "$page/index.php";
        }
    	include $fileSrc;
    } else {
    	echo Markdown(file_get_contents('readme.md'));
    }
   
   echo "</div>"; 

   echo '</div></div>';

?>

