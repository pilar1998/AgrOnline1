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
$host="127.0.0.1";
$username="postgres";
$password="01pilar20";
$database="agronline";
$datos_db="host=localhost dbname=agronline user=postgres password=01pilar20";
$pg =pg_connect($datos_db);
if (!$pg) {
  die('Not connected : ' . pg_error());
}

// Set the active MySQL database

// Select all the rows in the markers table
$query = "SELECT nombres_admin,nombre_finca,cantidadto,latitud,longitud
FROM administrador_finca
JOIN ubicacion
ON administrador_finca.id_admin=ubicacion.id_admin;";
$result = pg_query($query);
if (!$result) {
  die('Invalid query: ' . pg_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = @pg_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'nombres_admin="' . parseToXML($row['nombres_admin']) . '" ';
  echo 'nombre_finca="' . parseToXML($row['nombre_finca']) . '" ';
  echo 'cantidadto="' . parseToXML($row['cantidadto']) . '" ';
  echo 'latitud="' . parseToXML($row['latitud']) . '" ';
  echo 'longitud="' . parseToXML($row['longitud']) . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

?>
