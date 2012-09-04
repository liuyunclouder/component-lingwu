<?php
	if (!isset($page)) {
		$page = dirname(__FILE__);
		// echo "$page";
	}
    
?>
<iframe id="C-demo" height="" width="100%" frameborder="0" scrolling="no" src="<?php echo $page.'/demo/index.php'; ?>" allowtransparency="true"></iframe>
<?php 
	// include $page.'/readme.md'; 
	echo '<div id="C-markdown" class="markdown_body">';
	echo Markdown(file_get_contents($page.'/readme.md'));
	echo '</div>';
 ?>







