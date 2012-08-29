<?php
	if (!isset($page)) {
		$page = dirname(__FILE__);
		// echo "$page";
	}
    include $page.'/demo/demo.php';
    include $page.'/readme.md';
?>