<?php
/*******
*
* This is the configurations file for a number of php files on the server
* 1) This file allows access from all http requests
* 2) This file prevents any content from being cached
*
********/

// stop this file from being cached
// (otherwise updating this file won't change for any device already connected)
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

// allow any connection to be made - hopefully avoids being blocked by firewalls etc
$http_origin = $_SERVER['HTTP_ORIGIN'];
if ($http_origin == "http://127.0.0.1:51268") { 
	header('Access-Control-Allow-Origin: *');
}

error_reporting(0);

?>

