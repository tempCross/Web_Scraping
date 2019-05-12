<?php
	include("LIB_parse.php");
	include("LIB_http.php");

	$web_page = http_get($target="http://www.guarantee.edu", $referer="");

	$meta_tag_array = parse_array($web_page['FILE'], "<meta", ">");

	for($xx=0; $xx<count($meta_tag_array); $xx++)
		echo $meta_tag_array[$xx]. "\n";

?>
