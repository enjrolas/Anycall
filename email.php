<?php
$url=$_REQUEST['RecordingUrl'];
$date=date('l jS \of F Y h:i:s A');
$body="Your recording from your call on $date is available here:  $url";
$subject="recording from $date";
$to="alex@nublabs.com";
mail($to,$subject,$body);
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<Response>
<Say>Ok, you're done</Say>
</Response>";
?>