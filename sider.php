<?php
	// echo getcwd();
	$path = dirname(__FILE__);
	$handle = opendir($path);
	$htmlStr = '<ul class="nav-list">';

	while ($file = readdir($handle)) {
		if ($file != '.' && $file != '..') {
			if (is_dir($file) && $file != '.git') {
				// echo "__". $file;
				// echo "<br/>";
				$htmlStr .= "<li><a href=\"index.php?page=$file\" >".$file."</a>";
			}
		}
	}
	$htmlStr .= '</ul>';
	echo $htmlStr;
	
 ?>


 	
