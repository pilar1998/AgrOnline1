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
$database="agroonline";
$mysqli = new mysqli("localhost", "root", "", "agroonline");
if (!$mysqli) {
  die('Not connected : ' . mysqli_error());
}

// Set the active MySQL database

// Select all the rows in the markers table
$query = "SELECT nombre_finca,cantidad,cantidad_total,latitud,longitud,nombre_producto
FROM ubicacion
JOIN ubicacion_producto
ON ubicacion_producto.id_ubicacion=ubicacion.id_ubicacion JOIN producto on ubicacion_producto.id_producto=producto.id_producto where producto.id_producto=1;";
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
  echo 'nombre_finca="' . parseToXML($row['nombre_finca']) . '" ';
  echo 'cantidad="' . parseToXML($row['cantidad']) . '" ';
  echo 'cantidad_total="' . parseToXML($row['cantidad_total']) . '" ';
  echo 'latitud="' . parseToXML($row['latitud']) . '" ';
  echo 'longitud="' . parseToXML($row['longitud']) . '" ';
  echo 'nombre_producto="' . parseToXML($row['nombre_producto']) . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

?>