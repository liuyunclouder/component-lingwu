<?php
	if (!isset($page)) {
		$page = dirname(__FILE__);
		// echo "$page";
	}
	
	include $page.'/demo/index.php';
    include $page.'/readme.md'; 
?>