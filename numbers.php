<?php
require_once("connect.php");
require_once("utils.php");

printHeader();
  $number=$_REQUEST['number'];

if(isset($_REQUEST['newNumber']))
  {
   $number=$_REQUEST['newNumber'];
   $query="select * from incoming_numbers where incomingNumber='$number'";
   $result=mysql_query($query);
   if(mysql_num_rows($result)==0)
     {
       $query="insert into incoming_numbers (incomingNumber) values('$number')";
       mysql_query($query);
     }
  }


echo "<div class='incomingNumber'>Forwarding numbers for $number</div>";
$query="select * from incoming_numbers where incomingNumber='$number'";
$result=mysql_query($query);
$row=mysql_fetch_array($result);
$incomingId=$row['id'];

if(($_REQUEST['newName']!="")&&($_REQUEST['newNumber'])!="") //new number just got set
  {
    $newNumber=$_REQUEST['newNumber'];
    $newName=$_REQUEST['newName'];
    //first check for duplicates
    $query="select * from forwarding_numbers where owner='$incomingId' and forwardingNumber='$newNumber'";
    $result=mysql_query($query);
    if(mysql_num_rows($result)==0)
      {
      $query="insert into forwarding_numbers(forwardingNumber, name, owner) values('$newNumber', '$newName', '$incomingId')";
      mysql_query($query);
      $query="select * from forwarding_numbers where name='$newName' and forwardingNumber='$newNumber'";
      $result=mysql_query($query);
      $row=mysql_fetch_array($result);
      $newNumberId=$row['id'];
      }
  }

if(isset($_REQUEST['selectForwardingNumber']))
  {
  $forwardingId=$_REQUEST['selectForwardingNumber']; 
//check to see if it's the new guy
  if($forwardingId=="new")
    $forwardingId=$newNumberId;
$query="update incoming_numbers set forwardingId='$forwardingId' where incomingNumber='$number'";
mysql_query($query);
  }

$query="select * from incoming_numbers where incomingNumber='$number'";
$result=mysql_query($query);
if(mysql_num_rows($result)>0)
  {
    echo "<form action=".$_SERVER['PHP_SELF']." method='post'>";
    echo "<input type='hidden' name='number' value='$number'>";
    $row=mysql_fetch_array($result);
    $incomingId=$row['id'];
    $selectedForwardingId=$row['forwardingId'];

    $query="select * from forwarding_numbers where owner='$incomingId'";
    $result=mysql_query($query);
    echo "<div id='numbers'>";
    for($i=0;$i<mysql_num_rows($result);$i++)
      {
	$row=mysql_fetch_array($result);
	$name=$row['name'];
	$forwardingId=$row['id'];
	$forwardingNumber=$row['forwardingNumber'];
	if($selectedForwardingId==$forwardingId)
	  $checked="checked";
	else
	  $checked="";
	echo "<div class='line rounded $checked'>";
	echo "<div class='name'>$name</div>";
	echo "<div class='number'>$forwardingNumber</div>";
	echo "<div class='forwardSelect'>Forward calls to this number:  <input type='radio' name='selectForwardingNumber' value='$forwardingId' $checked></div>";
	echo "</div>";
      }
    echo "<div class='newLine rounded'>Add a number<br>
<div class='name'>Name:  <input type='text' name='newName'></div>
<div class='number'>Number:  <input type='text' name='newNumber'></div>
<div class='forwardSelect'>Forward calls to this number:  <input type='radio' name='selectForwardingNumber' value='new'></div>
</div>
</div>
<div id='submit'><input type='submit'></form></div>";

  }
else
  echo "we don't have that number";

echo "</body></html>";
?>