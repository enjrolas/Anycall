<?php 
require_once("connect.php");
require_once("restUtils.php");
$number=$_REQUEST['number'];
$parameters=array(
		  "PhoneNumber"=>urlencode($number));
$url="$rootUrl/IncomingPhoneNumbers/";
//authenticate($url, $parameters);
echo $_REQUEST[$number];
?>