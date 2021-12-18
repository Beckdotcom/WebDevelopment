<!DOCTYPE html>

<html lang="en">

<head>
  <title>AJAX Login</title>
  <link rel="stylesheet" href="login.css">
  <style>

        
    div input[type="password"] {
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }

    div h1{
    font-family: Arial, Helvetica, sans-serif;
    text-align: center;
    align-content: center;
    font-size: 5em;
    color:rgb(7, 47, 120);
    }

    div td,tr{
    padding: 20px;
    font-family: Arial, Helvetica, sans-serif;
    }

    #ajaxDiv{
        width:100%;
        font: 5em;
        }
  </style>
</head> 

   <body>
      
      <script language = "javascript" type = "text/javascript">

            //Browser Support Code
            function ajaxFunction(server,user,pwd,dbName){
               var ajaxRequest;  // The variable that makes Ajax possible!
               
               ajaxRequest = new XMLHttpRequest();
               
               // Create a function that will receive data sent from the server and will update
               // the div section in the same page.
					
               ajaxRequest.onreadystatechange = function(){
                  if(ajaxRequest.readyState == 4){
                     var ajaxDisplay = document.getElementById('ajaxDiv');
                     ajaxDisplay.innerHTML = ajaxRequest.responseText;
                  }
               }
               
               // Now get the value from user and pass it to server script.
					
               var username = document.getElementById('username').value;
               var password = document.getElementById('password').value;
               var queryString = "?password=" + password ;
            
               queryString +=  "&username=" + username + "&server=" + server + "&user=" + user + "&pwd=" + pwd + "&dbName=" + dbName;
               
               ajaxRequest.open("GET", "login2.php" + queryString, true);
               ajaxRequest.send(null);
            }

      </script>


		
      <form method = "POST" name = 'myForm'>


        <?php
   
          $server = "spring-2021.cs.utexas.edu";
          $user   = "cs329e_bulko_beck";
          $pwd    = "shy2Frozen*Sexual";
          $dbName = "cs329e_bulko_beck";

          // print just to confirm they got passed correctly
          //echo "Server: <code>".$server."</code><br>";
          //echo "User: <code>".$user."</code><br>";
          //echo "Database name: <code>".$dbName."</code><br>";

   		    
            echo "<div>";
            echo "<h1> Log In: </h1>";
   		    echo "<table><tr><td>Username:</td>";
          echo "<td> <input type = \"text\" id = 'username' size=\"50\"/> </td>";
   		    echo "</tr> <tr>";
          echo "<td>Password:</td>";
   		    echo "<td> <input type = \"password\" id = 'password' size=\"50\"/> </td>";
   		    echo "</tr> <tr> <td colspan=\"2\">";
          echo "<input type = \"button\" onclick = \"ajaxFunction('$server','$user','$pwd','$dbName')\" value = \"Submit\"/> <br><br> ";
          echo "<input type=\"reset\" value = \"Reset\"/> <br><br> ";
		      echo "</td> </tr>	</table>";
              echo "<div>";
              
        ?>
      </form>
      
      <div id = 'ajaxDiv'> </div>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
   </body>
</html>