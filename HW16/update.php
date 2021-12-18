<!DOCTYPE html>
<html lang="en">

<head>
	<title>INSERT SQL</title>
	<meta charset="UTF-8">
	<meta name="description" content="ENTER DESCRIPTION HERE">
	<meta name="author" content="Beck Dong">
</head> 

<body>


<h1>Update Student Record</h1>
<form method="post" action="update.php">
    <div> ID: <input type="text" name="id" required autofocus> </div>
    <div> LAST: <input type="text" name="last" autofocus> </div>
    <div> FIRST: <input type="text" name="first"  autofocus> </div>
    <div> MAJOR: <input type="text" name="major"  autofocus> </div>
    <div> GPA: <input type="text" name="gpa"  autofocus> </div>
    <button name='submit' value='Submit'>Submit</button>
</form>

<?php
   $mysqli = new mysqli ("spring-2021.cs.utexas.edu","cs329e_bulko_beck",
   "shy2Frozen*Sexual","cs329e_bulko_beck");
   //if returns non-zero number, print a message and stop execution
   if($mysqli->connect_errno){
       die('connect Error'.$mysqli->connect_errno.":".$mysqli->connect_error);
   }

    $id = $_POST['id'];
    $last = $_POST['last'];
    $first = $_POST['first'];
    $major = $_POST['major'];
    $gpa = $_POST['gpa'];

    


    if ($id != "" and ($last != "" or $first != "" or $major != "" or $gpa != "")){
        if (isset($last) && $last != ""){
            $command = "UPDATE students SET lastName = \"$last\" WHERE id = $id";
            $result = $mysqli->query($command);
            if(!$result){
                die("Query failed: ($mysqli->error <br> SQL command = $command");
            }
            else{
                echo "lastName Query completed."."<br>";
            }
        }
        if (isset($first) && $first != ""){
            $command = "UPDATE students SET firstName = \"$first\" WHERE id = $id";
            $result = $mysqli->query($command);
            if(!$result){
                die("Query failed: ($mysqli->error <br> SQL command = $command");
            }
            else{
                echo "firstName Query completed"."<br>";
            }
        }
        if (isset($major) && $major != ""){
            $command = "UPDATE students SET major = \"$major\" WHERE id = $id";
            $result = $mysqli->query($command);
            if(!$result){
                die("Query failed: ($mysqli->error <br> SQL command = $command");
            }
            else{
                echo "major Query completed."."<br>";
            }
        }
        if (isset($gpa) && $gpa != ""){
            $command = "UPDATE students SET gpa = $gpa WHERE id = $id";
            $result = $mysqli->query($command);
            if(!$result){
                die("Query failed: ($mysqli->error <br> SQL command = $command");
            }
            else{
                echo "gpa Query completed."."<br>";
            }
        }
        
    }


?>
</body>
</html>