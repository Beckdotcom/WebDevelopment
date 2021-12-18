<!DOCTYPE html>

<html lang="en">

<head>
	<title>ENTER TITLE HERE</title>
	<meta charset="UTF-8">
	<meta name="description" content="ENTER DESCRIPTION HERE">
	<meta name="author" content="Beck Dong">
	<link rel="stylesheet" href="page.css">
    <script type = "text/javascript" src = "page.js"></script> 
</head> 

<body>

<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    //if the request method is POST, verify the submitted username and password
    //assumes you got here by clicking submit button

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        //Get values submitted from the login form
        $username = $_POST["username"];
        $password = $_POST["password"];

        if(unique($username)){
            $myfile = fopen("passwd.txt", "a") or die("Unable to open file!");
            $line = $username.":".$password."\n";
            echo($line);
            fwrite($myfile, $line);
            fclose($myfile);
            header("Location: register_success.html");
            die;
        }
        else{
            echo "<p>That username is already taken.</p>";
        }
    }

    function unique($username){
        $myfile = fopen("passwd.txt", "r") or die("Unable to open file!");
        while(!feof($myfile)){
            $line = fgets($myfile);
            $col_idx = strpos($line,":");
            
            //get username & pass
            $username2 = substr($line,0,$col_idx);
            if ($username ==  $username2){
                return false;
            }
        }
        fclose($myfile);
        return true; 
    }

    ?>

    <form method="post" action="register.php">
        <div> Username: <input type="text" name="username" autofocus> </div>
        <div> Password: <input type="text" name="password" autofocus> </div>
        <input type="submit" value="Register">
    </form>

</body>
</html>