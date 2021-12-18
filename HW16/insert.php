<!DOCTYPE html>
<html lang="en">

<head>
	<title>INSERT SQL</title>
	<meta charset="UTF-8">
	<meta name="description" content="ENTER DESCRIPTION HERE">
	<meta name="author" content="Beck Dong">
</head> 

<body>

<h1>Insert Student Record</h1>

<form method="post" action="insert.php">
    <div> ID: <input type="text" name="id" required autofocus> </div>
    <div> LAST: <input type="text" name="last" required autofocus> </div>
    <div> FIRST: <input type="text" name="first" required autofocus> </div>
    <div> MAJOR: <input type="text" name="major" required autofocus> </div>
    <div> GPA: <input type="text" name="gpa" required autofocus> </div>
    <button name='submit' value='Submit'>Submit</button>
</form>

<?php
    
    $mysqli = new mysqli ("spring-2021.cs.utexas.edu","cs329e_bulko_beck",
    "shy2Frozen*Sexual","cs329e_bulko_beck");
    //if returns non-zero number, print a message and stop execution
    if($mysqli->connect_errno){
        die('connect Error'.$mysqli->connect_errno.":".$mysqli->connect_error);
    }

    
    
    $id = intval($_POST['id']);
    $last = strval($_POST['last']);
    $first = strval($_POST['first']);
    $major = strval($_POST['major']);
    $gpa = $_POST['gpa'];

    if ($id != "" and $last != "" and $first != "" and $major != "" and
            $gpa != ""){
        //create the query as a string
        $command = "INSERT INTO students VALUES 
                    ($id,\"$last\",\"$first\",\"$major\",$gpa);";
        
        //echo $id.$last.$first.$major.$gpa;

        //issue the query
        $result = $mysqli->query($command);

        //verify the result
        if(!$result){
            die("Query failed: ($mysqli->error <br> SQL command = $command");
        }
        else{
            echo "Query completed.";
        }

    }
    


?>

</body>
</html>