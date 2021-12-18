<?php
$mysqli = new mysqli ("spring-2021.cs.utexas.edu","cs329e_bulko_beck",
"shy2Frozen*Sexual","cs329e_bulko_beck");
//if returns non-zero number, print a message and stop execution
if($mysqli->connect_errno){
    die('connect Error'.$mysqli->connect_errno.":".$mysqli->connect_error);
}

//create the query as a string
$command = "SELECT * FROM patrons WHERE
    lastName = \"Eilish\"";

//issue the query
$result = $mysqli->query($command);

//verify the result
if(!$result){
    die("Query failed: ($mysqli->error <br> SQL command = $command");
}

//like readline
$row = $result->fetch_row();
echo $row[0];
echo $row[1];
echo $row[2];
echo $row[3];
echo $row[4];
echo $row[5];

//returns fields,index by fields
$row = $result->fetch_assoc();
echo $row['p_id'];
echo $row['lastName'];
echo $row['firstName'];
echo $row['phone'];


?>
