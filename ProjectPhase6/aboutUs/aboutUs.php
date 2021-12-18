<!DOCTYPE html>

<html lang="en">

<head>
	<title>New Horns</title>
	<meta charset="UTF-8">
	<meta name="description" content="New Horns by Old Horns">
	<meta name="author" content="Yujin Song, Jerry Villalobos">
	<link href = "about_us.css" rel = "stylesheet">
    <script type = "text/javascript" src = "about_us.js" defer></script> 

</head> 

<body>
	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$user_subject = strip_tags(trim($_POST["subject"]));
			$user = strip_tags(trim($_POST["fname"])) . " " . strip_tags(trim($_POST["lname"]));
			$user_email = strip_tags(trim($_POST["email"]));
			$msg = strip_tags(trim($_POST["msg"])) . "\r\nSender: " . $user . ", Reply to: ". $user_email;
			mail("newlonghorns@gmail.com", $user_subject, $msg);
		}
	?>
			

<div id="container">
      <!-- Nav Content -->
      <div id="top-nav">
        <ul>
          <li><a href="../New_Horns.html"><img style="height: 25px; width: 40px;" src=../home.png></a></li>
          <li><a href="../New_Horns.html">Home</a></li>
          <li><a href="../aboutUs/About_Us.html">About Us</a></li>
          <li><a href="../bestPlaces/Best_Places.html">Best Places</a></li>
          <li><a href="../dining/Dining_Hall_Ratings.html">Dining Hall Ratings</a></li>
          <li><a href="../utASMR/UT_ASMR.html">UT ASMR</a></li>
          <li><a href="../resources/Resources.html">Resources</a></li>
        </ul>
      </div>
</div>

<div id = "header"> 
    <h1> About US </h1>
</div>  
 
    
<!-- Container for About Us Profiles -->    
<div id = "aboutUsProfiles"> 
    
    <!-- Individual Profiles -->
    <div class = "profile"> 
        <h3> Yujin Song </h3>
        <img src="yujin.png" class="avatar">
        <p>Senior</p>
        <p> Biochemistry Major  </p>
    </div>
   <!-- Individual Profiles -->
    <div class = "profile"> 
        <h3> Zephyr Zepeda </h3>
        <img src="zephyr.jpg" class="avatar">
        <p>Senior </p>
        <p> Human Dimensions of Organizations Major </p>
     
    </div>
    <!-- Individual Profiles -->
    <div class = "profile"> 
        <h3>Jerry Villalobos </h3>
        <img src="jerry.png" class="avatar">
        <p>Sophmore </p>
        <p> Mathematics Major</p>
     
    </div>
    <!-- Individual Profiles -->
    <div class = "profile"> 
        <h3> Beck Dong </h3>
        <img src="beck.jpg" class="avatar">
        <p>Senior </p>
        <p> Human Dimensions of Organizations Major </p>
        
    </div>
  
</div>
    
<div id = "contactUs">
    <h2> Contact Us </h2>
    <center>
    <p id="line"></p>
    <form action="aboutUs.php" method="POST" id="SendEmail">
        <table>
            <tr> 
                <td> <label for="first"> First Name: </label> <input id = "first" name = "fname" type = "text"  />  </td>
                <td> <label for="last"> Last Name:  </label><input id = "last" name = "lname" type = "text"  />  </td>

            </tr>

            <tr>
                <td colspan="2"><label for="email"> Email: </label><input id = "email" name = "email" type = "text"  /> </td>
            </tr>

            <tr>
                <td colspan="2"><label for="subject"> Subject: </label><input id = "subject" name = "subject" type = "text"  /> </td>
            </tr>

            <tr>
                <td colspan="2"><label for="msg"> What would you like us to know? </label><input id = "msg" name = "msg" type = "text"  /> </td>
            </tr>

            <tr>
                <td><button onclick="verify()" id="submit_button" type="button" > Submit </button></td>
                <td><button id="reset_button" type = "reset" value = "Clear" > Reset </button></td>
            </tr>
        </table>
    </center>
    </form>
    </div>

    

</body>
</html>
