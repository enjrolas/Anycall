<?php
// page located at http://example.com/process_gather.php
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<Response>
<Dial action='record.php' method='get'>";
echo $_REQUEST['Digits'];
echo "</Dial>
</Response>";

?>