<?php

require_once("connect.php");
$rootURL="https://api.twilio.com/2010-04-01/Accounts/$AccountSid";

function authenticate()
{
  $request = new HTTP_Request2('http://$AccountSid:$AuthToken@www.example.com/secret/');

  $process = curl_init($host);                                                                         
  curl_setopt($process, CURLOPT_HTTPHEADER, array('Content-Type: application/xml', $additionalHeaders));              
  curl_setopt($process, CURLOPT_HEADER, 1);                                                                           
  curl_setopt($process, CURLOPT_USERPWD, $AccountSid . ":" . $AuthToken);                                                
  curl_setopt($process, CURLOPT_TIMEOUT, 30);                                                                         
  curl_setopt($process, CURLOPT_POST, 1);                                                                             
  curl_setopt($process, CURLOPT_POSTFIELDS, $payloadName);                                                            
  curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);                                                                
  $return = curl_exec($process);    
}

?>