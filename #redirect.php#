<?php
require_once("connect.php");
$incoming=$_REQUEST['To'];
$query="select * from incoming_numbers where incomingNumber='$incoming'";

$result=mysql_query($query);
if(mysql_num_rows($result)>0)
  {
    $row=mysql_fetch_array($result);
    $forwardingId=$row['forwardingId'];
  
$query="select * from forwarding_numbers where id='$forwardingId'";
$result=mysql_query($query);
$row=mysql_fetch_array($result);
$forwardingNumber=$row['forwardingNumber'];

// page located at http://example.com/process_gather.php
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<Response>";
echo "<Dial>$forwardingNumber</Dial>";
echo "</Response>";
  }
?>