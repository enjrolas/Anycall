<?php

require_once("connect.php");
require_once("restUtils.php");

$numberUrl="$rootUrl/AvailablePhoneNumbers/US/Local?AreaCode=617";

$numbers=authenticate($numberUrl,array());
$tag="";
$friendlyName="";
$numberOfNumbers=0;
function contents($parser, $data){ 
  global $tag;
  global $friendlyName, $numberOfNumbers;
  if($numberOfNumbers<10)
    {
      if($tag=="FRIENDLYNAME")    
	$friendlyName=$data;
      if($tag=="PHONENUMBER")
	{
	  echo "<span class='name'>$friendlyName</span><span class='selector'><input type='radio' name='number' value='$data'></span><br/>\n";
	  echo "<input type='hidden' name='$data' value='$friendlyName'>";
	}
    } 
}

function startTag($parser, $tagName, $attrs){ 
  global $tag, $numberOfNumbers;
  $tag=$tagName;
  if($tag=="AVAILABLEPHONENUMBER")
    {
      $numberOfNumbers++;
      if($numberOfNumbers<10)
	echo "<div class='number'>";
    }
} 

function endTag($parser, $data){ 
  global $tag, $numberOfNumbers;
  if($tag=="AVAILABLEPHONENUMBER")
      if($numberOfNumbers<10)
	echo "</div>\n";
} 

$xml_parser = xml_parser_create(); 
xml_set_element_handler($xml_parser, "startTag", "endTag"); 

echo "<form action='chooseNumber.php' method='post'>";

xml_set_character_data_handler($xml_parser, "contents"); 
if(!(xml_parse($xml_parser, $numbers))){ 
  die("Error on line " . xml_get_current_line_number($xml_parser)); 
} 

echo "<input type='submit' value='buy number'></form>";

xml_parser_free($xml_parser); 

?>