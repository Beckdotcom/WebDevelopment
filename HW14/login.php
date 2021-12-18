<!DOCTYPE html>
<html lang="en">

<head>
	<title>ENTER TITLE HERE</title>
	<meta charset="UTF-8">
	<meta name="description" content="ENTER DESCRIPTION HERE">
	<meta name="author" content="Beck Dong">
</head> 

<body>

<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    //if the request method is POST, verify the submitted username and password
    //assumes you got here by clicking submit button

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        session_start();

        //Get values submitted from the login form
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        //$password = "grapes";

        //does username match any usernames
            //if yes, match password

        //if match, send to page
            //echo "pass".$password;
            //echo "line".$line;
            //echo "user".$username;
        if(search($username,$password)){
            //save as cookie,
            //$_SESSION["username"] = $username;
            //redirects. header for http response
            setcookie("username",$username,time()+120,"/");
            header("Location: HW5.html");
            die;
        }
        else{
            echo "<p>Incorrect username or password.</p>";
            //echo "pass".$password2;
            //echo "line".$line;
            //echo "user".$username2;
            //echo "pass".$password;
            
        }
    }

    function search($username,$password){
        $myfile = fopen("passwd.txt", "r") or die("Unable to open file!");
        $line = fgets($myfile);
        while($line != ""){
            
            $col_idx = strpos($line,":");
            
            //get username & pass
            $username2 = trim(substr($line,0,$col_idx));
            $password2 = trim(substr($line,$col_idx+1));
            print $username."1<br>";
            print $username2."2<br>";
            print $password."3<br>";
            print $password2."4<br>";

            if (($username == $username2) and ($password == $password2)){
                return TRUE;
            }
            
            $line = fgets($myfile);
        }
        fclose($myfile);
        return FALSE;
    }


    ?>

    <form method="post" action="login.php">
        <span id="alerts">  </span>
        <div> Username: <input type="text" name="username" autofocus> </div>
        <div> Password: <input type="text" name="password" autofocus> </div>
        <input type="submit" value="Login">
        <br>
        <a href="register.php"> Not a member? Register Here </a>
    </form>

</body>
</html>