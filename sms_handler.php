<?php


function get_request(){
$keys=array_keys($_REQUEST);
$values=array_values($_REQUEST);
$get="?";
for($i=0;$i<count($_REQUEST);$i++)
  {
    if($i!=0)
	$get=$get."&";
    $get=$get.$keys[$i]."=".$values[$i];
  }
return $get;
}

$get=get_request();
//echo $get;

$body=$_REQUEST['Body'];
$parsed=explode(" ",$body);
$num=(int)$parsed[0];

$get=str_replace(" ","+",$get);

//mail("alex@nublabs.com","dude!","handler says:  $get");

$ch=curl_init();
if($num<1000)
  curl_setopt($ch,CURLOPT_URL,'http://www.artiswrong.com/callme/sms.php'.$get);
else
  curl_setopt($ch,CURLOPT_URL,'http://www.artiswrong.com/rickroll/sms.php'.$get);
curl_exec($ch);
curl_close($ch);

?>
