<?php
    $server = "spring-2021.cs.utexas.edu";
    $user = "cs329e_bulko_zmoneyzb";
    $pwd = "beset4goal!normal";
    $dbName = "cs329e_bulko_zmoneyzb";

    $mysqli = new mysqli ($server,$user,$pwd,$dbName);


    if ($mysqli->connect_errno){
        die('connect error: '. $mysqli->connect_errno . "." . $mysqli->connect_error);
    }

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Select all the rows in the markers table
$query = "SELECT * FROM spots";
$result = $mysqli->query($query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo "<?xml version='1.0' ?>";
echo '<markers>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'spotType="' . parseToXML($row['spotType']) . '" ';
  echo 'description="' . parseToXML($row['description']) . '" ';
  echo 'lat="' . parseToXML($row['lat']) . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo 'code="' . parseToXML($row['code']) . '" ';
  echo '/>';
  $ind = $ind + 1;
}

// End XML file
echo '</markers>';

?>
