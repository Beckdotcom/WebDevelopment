<!DOCTYPE html>
<html lang="en">

<head>
	<title>View SQL</title>
	<meta charset="UTF-8">
	<meta name="description" content="ENTER DESCRIPTION HERE">
	<meta name="author" content="Beck Dong">
</head> 

<body>

<h1>View Student Record</h1>

<form method="post" action="view.php">
    <div> ID: <input type="text" name="id" autofocus> </div>
    <div> LAST: <input type="text" name="last" autofocus> </div>
    <div> FIRST: <input type="text" name="first" autofocus> </div>
    <button name='submit' value='Submit'>View</button>
    <button name='submit' value='viewall'>View All</button>
</form>

<?php
    $id = intval($_POST['id']);
    $last = strval($_POST['last']);
    $first = strval($_POST['first']);
    
    $mysqli = new mysqli ("spring-2021.cs.utexas.edu","cs329e_bulko_beck",
    "shy2Frozen*Sexual","cs329e_bulko_beck");
    //if returns non-zero number, print a message and stop execution
    if($mysqli->connect_errno){
        die('connect Error'.$mysqli->connect_errno.":".$mysqli->connect_error);
    }
    if($_POST['submit'] == 'Submit'){

        $lines = array();
        if($id != ""){
            $temp = "id = $id";
            array_push($lines,$temp);
        }
        if($last != ""){
            $temp = "lastName = \"$last\" ";
            array_push($lines, $temp);
        }
        if($first != ""){
            $temp = "firstName = \"$first\" ";
            array_push($lines,$temp);
        }

        if (sizeof($lines) == 1){
            $command = "SELECT * FROM students WHERE $lines[0]";
            $data = "SELECT COUNT(*) FROM students WHERE $lines[0];";
        }
        else if (sizeof($lines) == 2){
            $command = "SELECT * FROM students WHERE $lines[0] AND $lines[1]";
            $data = "SELECT COUNT(*) FROM students WHERE $lines[0] AND $lines[1]";
        }
        else if (sizeof($lines) == 3){
            $command = "SELECT * FROM students WHERE $lines[0] AND $lines[1] AND $lines[2]";
            $data = "SELECT COUNT(*) FROM students";
        }
        $result = $mysqli->query($command);
        $counter = $mysqli->query($data);

        if(!$result){
            die("Query failed: $mysqli->error <br> SQL command = $command");
        }
        else{
            echo "Query completed. <br>";
        }
        if(!$counter){
            die("Data failed: $mysqli->error <br> SQL command = $command");
        }
        else{
            echo "Data completed. <br> <br>";
        }
        
        $num = $counter->fetch_row();
        $length = $num[0];

        if($length[0] == 0){
            echo "No Matches";
        }
        else{
            for ($i = 0; $i <= $length; $i++) {
                $row = $result->fetch_row();
                    echo $row[0]." ".$row[1]." ".$row[2]." ".$row[3]." ".$row[4]." "."<br>";
            }
        }
    }
    
    
    

    if ($_POST['submit'] == 'viewall'){
        $command = "SELECT * FROM students ORDER BY lastName, firstName";
        
        //issue the query
        $result = $mysqli->query($command);

        //verify the result
        if(!$result){
            die("Query failed: ($mysqli->error <br> SQL command = $command");
        }
        else{
            echo "Query completed."."<br>"."<br>";
        }

        for ($i = 0; $i <= $row[0]; $i++) {
            $row = $result->fetch_row();
            for ($j = 0; $j <= 5; $j++) {
                echo $row[$j]." ";
            }
            echo "<br>";
        }
    }   


    




    
?>

</body>
</html>