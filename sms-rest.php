<?php

	// include the PHP TwilioRest library
	require "twilio.php";

	// twilio REST API version
	$ApiVersion = "2008-08-01";

	// set our AccountSid and AuthToken
	$AccountSid = "ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
	$AuthToken = "YYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY";
    
	// instantiate a new Twilio Rest Client
	$client = new TwilioRestClient($AccountSid, $AuthToken);

	// make an associative array of people we know, indexed by phone number
	$people = array(
		"4158675309"=>"Curious George",
		"4158675310"=>"Boots",
		"4158675311"=>"Virgil",
	);
		
	// iterate over all our friends
	foreach ($people as $number => $name) {

		// Send a new outgoinging SMS by POST'ing to the SMS resource */
		$response = $client->request("/$ApiVersion/Accounts/$AccountSid/SMS/Messages", 
			"POST", array(
			"To" => $number,
			"From" => "YYY-YYY-YYYY",
			"Body" => "Hey $name, Monkey Party at 6PM. Bring Bananas!"
		));
		if($response->IsError)
			echo "Error: {$response->ErrorMessage}";
		else
			echo "Sent message to $name";

    }
?>