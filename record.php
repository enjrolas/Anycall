<?php
$rootURL="http://www.artiswrong.com/watergate";
// page located at http://example.com/process_gather.php
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<Response>
<Record action='".$rootURL."/email.php' method='post' />
</Response>";
?>