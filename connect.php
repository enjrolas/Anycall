<?php
$username="**********";
$password="**********";
$host="localhost";
$database="**********";

$connection = mysql_connect($host, $username, $password) or die ('Error connecting to mysql');
mysql_select_db($database, $connection);
?>