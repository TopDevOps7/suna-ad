<?php
    require '../lang/config.php';
	$origin = $_SERVER["HTTP_ORIGIN"];
	if ($origin == "https://ico.redux-technologies.com/") {
		header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Depth, User-Agent, X-File-Size, X-Requested-With, If-Modified-Since, X-File-Name, Cache-Control");
        header("Access-Control-Max-Age: 18000");
    }
    echo "origin: " . $origin;
    header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
    $_SESSION["lang"] = $_GET["lang"];
    echo json_encode($_SESSION["lang"]);
?>