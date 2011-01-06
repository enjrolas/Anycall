<?php

function authenticate($url, $params)
{
  //url-ify the data for the POST
  foreach($params as $key=>$value) { $param_string .= $key.'='.$value.'&'; }
  rtrim($param_string,'&');
  //Create the connection handle
  $curl_conn = curl_init();
  //Set cURL options
  curl_setopt($curl_conn, CURLOPT_URL, $url); //URL to connect to
  curl_setopt($curl_conn, CURLOPT_GET, 1); //Use GET method
  //  curl_setopt($curl_conn, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); //Use basic authentication
  // curl_setopt($curl_conn, CURLOPT_USERPWD,"$AccountSid:$AuthToken"); //Set u/p
  //curl_setopt($curl_conn, CURLOPT_SSL_VERIFYPEER, false); //Do not check SSL certificate (but use SSL of course), live dangerously!
  curl_setopt($curl_conn, CURLOPT_RETURNTRANSFER, 1); //Return the result as string
  // Result from querying URL. Will parse as xml
  if(count($params)>0){
    curl_setopt($curl_conn,CURLOPT_POST,count($params));
    curl_setopt($curl_conn,CURLOPT_POSTFIELDS,$param_string);
  }
  $output = curl_exec($curl_conn);
  // close cURL resource. s like shutting down the water when re brushing your teeth.
  curl_close($curl_conn);
  return $output;
}

?>