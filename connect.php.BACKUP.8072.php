<?php
<<<<<<< HEAD:connect.php
$username="anycall";
$password="planeman";
$host="localhost";
$database="anycall";

$AccountSid="ACf4d4fd8e6e8d8c77d2d06f91cfdf058f";
$AuthToken="eec7a865c443edbe6d3a8d54fd6f9832";

=======
$username="**********";
$password="**********";
$host="localhost";
$database="**********";
>>>>>>> origin/master:connect.php

$connection = mysql_connect($host, $username, $password) or die ('Error connecting to mysql');
mysql_select_db($database, $connection);
?>