<h1>Delete Student Record</h1>



<form method="post" action="delete.php">
    <div> ID: <input type="text" name="id" required autofocus> </div>
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

    if ($id != "" ){
        //create the query as a string
        $command = "DELETE FROM students WHERE (id = $id)";

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