<?php
/* Include the PHP TwilioRest library */
require "twilio.php";
    
/* Twilio REST API version */
$ApiVersion = "2008-08-01";
    
/* Set our AccountSid and AuthToken */
$AccountSid = "ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
$AuthToken = "YYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY";
    
/* Instantiate a new Twilio Rest Client */
$client = new TwilioRestClient($AccountSid, $AuthToken);
    
/* Initiate a new outbound call by POST'ing to the Calls resource */
$response = $client->request("/$ApiVersion/Accounts/$AccountSid/Calls", 
			     "POST", array(
					   "Caller" => "XXX-XXX-XXXX",
					   "Called" => "YYY-YYY-YYYY",
					   "Url" => "http://demo.twilio.com/helloworld/"
    
					   ));
if($response->IsError)
  echo "Error: {$response->ErrorMessage}
    ";
    else
      echo "Started call: {$response->ResponseXml->Call->Sid}
    ";
?>