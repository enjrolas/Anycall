<?php
require_once("connect.php");
$from=$_REQUEST['From'];
$incoming=$_REQUEST['To'];
$pin=$_REQUEST['Body'];

$query="select * from incoming_numbers where incomingNumber='$incoming'";
echo $query;
$result=mysql_query($query);

if(mysql_num_rows($result)>0)
  {
    $row=mysql_fetch_array($result);
    $incomingId=$row['id'];
    $query="select * from forwarding_numbers where forwardingNumber='$from' and owner='$incomingId'";
    $result=mysql_query($query);
    if(mysql_num_rows($result)==0)
      {
	echo "new number!";
	$query="insert into forwarding_numbers (forwardingNumber,owner) values ('$from', '$incomingId')";
	mysql_query($query);
	$query="select id from forwarding_numbers where forwardingNumber='$from'";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
	$forwardingId=$row['id'];
      }
    else{
      $row=mysql_fetch_array($result);
      $forwardingId=$row['id'];
    }
    echo "new id is $forwardingId";
    $query="update incoming_numbers set forwardingId='$forwardingId' where incomingNumber='$incoming'";
    mysql_query($query);
}
else
  echo "poop";
?>