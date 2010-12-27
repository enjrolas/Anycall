<?php
require_once("connect.php");
$number=$_REQUEST['number'];
$query="select * from incoming_numbers where incomingNumber='$number'";
$result=mysql_query($query);
if(mysql_num_rows($result)==0)
  {
    $query="insert into incoming_numbers (incomingNumber) values('$number')";
    mysql_query($query);
  }
$_SESSION['number']=$number;
header( 'Location: numbers.php' ) ;

?>