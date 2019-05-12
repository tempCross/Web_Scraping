<?php
	include("LIB_parse.php");
	include("LIB_http.php");

	$web_page = http_get($target="http://www.guarantee.edu", $referer="");
	$open_tag = "<li";
	$close_tag = "</li>";
	$remove_array = parse_array($web_page['FILE'], $open_tag, $close_tag);
    
    # Remove each occurrence of each array element from string;
    for($xx=0; $xx<count($remove_array); $xx++)
        $web_page = str_replace($remove_array, "", $web_page);
    
    $open_tag = "<script";
	$close_tag = "</script>";
	$remove_array = parse_array($web_page['FILE'], $open_tag, $close_tag);
    
    # Remove each occurrence of each array element from string;
    for($xx=0; $xx<count($remove_array); $xx++)
        $web_page = str_replace($remove_array, "", $web_page);

    $open_tag = "<div";
	$close_tag = "</div>";
	$remove_array = parse_array($web_page['FILE'], $open_tag, $close_tag);
    
    # Remove each occurrence of each array element from string;
    for($xx=0; $xx<count($remove_array); $xx++)
        $web_page = str_replace($remove_array, "", $web_page);
    
    echo $web_page['FILE'];
   
    

?>
