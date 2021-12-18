
<?php
if (!isset($_COOKIE["username"])){
    header("Location: login.php");
}

$mysqli = new mysqli ("spring-2021.cs.utexas.edu","cs329e_bulko_beck",
"shy2Frozen*Sexual","cs329e_bulko_beck");
//if returns non-zero number, print a message and stop execution
if($mysqli->connect_errno){
    die('connect Error'.$mysqli->connect_errno.":".$mysqli->connect_error);
}


print <<<SCREEN
<html>
<head>
<h1> Actions <h1>
<script type = "text/javascript" ></script> 
</head>
<body>
<h3> Students </h3>
SCREEN;



//create the query as a string
$command = 'SELECT * FROM students';

//issue the query
$result = $mysqli->query($command);

//verify the result
if(!$result){
    die("Query failed: ($mysqli->error <br> SQL command = $command");
}



print <<<BUTTONS
<form action='interface.php' method='post'>
  <button name='submit' value='insert'>Insert Student Record</button>
  <button name='submit' value='update'>Update Student Record </button>
  <button name='submit' value='delete'>Delete Student Record</button>
  <button name='submit' value='view'>View Student Record </button>
  <br>
  <br>
  <button name='submit' value='logout'>Log Out</button>

</form>
BUTTONS;

if($_POST['submit'] == 'insert'){
    header("Location: insert.php");
} 
else if($_POST['submit'] == 'update'){
    header("Location: update.php");
}
else if($_POST['submit'] == 'delete'){
    header("Location: delete.php");
}
else if($_POST['submit'] == 'view'){
    header("Location: view.php");
}
else if($_POST['submit'] == 'logout'){
    echo "<script> alert(\"Thank you\") </script>";
    session_destroy();
    echo "<script> window.location.href = \"login.php\"</script>";
    //header("Location: login.php");
}


print <<<BOTTOM
</body>
</html>
BOTTOM;
?>
