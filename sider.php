<?php
	// echo getcwd();
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
	
 ?>


 	
