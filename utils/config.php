<?php 
	$link = $_SERVER['PHP_SELF'];
	$link_array = explode('/',$link);
	$pagePath = $link_array[count($link_array) - 2];
	$page = end($link_array);

    $server_link = explode('/',$_SERVER['DOCUMENT_ROOT']);
    $server = end($server_link);

?>