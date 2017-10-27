<?php

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Opens a connection to a MySQL server
$username="root";
$password="";
$database="mapas";
$mysqli = new mysqli("localhost", "root", "", "mapa");
if (!$mysqli) {
  die('Not connected : ' . mysqli_error());
}

// Set the active MySQL database

// Select all the rows in the markers table
$query = "SELECT * FROM markers WHERE 1";
$result = $mysqli->query($query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'name="' . parseToXML($row['name']) . '" ';
  echo 'address="' . parseToXML($row['address']) . '" ';
  echo 'lat="' . parseToXML($row['lat']) . '" ';
  echo 'lng="' . parseToXML($row['lng']) . '" ';
  echo 'type="' . parseToXML($row['type']) . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

?>