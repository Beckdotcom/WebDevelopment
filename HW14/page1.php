<!DOCTYPE html>

<html lang="en">

<head>
	<title>ENTER TITLE HERE</title>
	<meta charset="UTF-8">
	<meta name="description" content="ENTER DESCRIPTION HERE">
	<meta name="author" content="Beck Dong">
</head> 

<?php
if (!isset($_COOKIE["username"])){
    header("Location: login.php");
}

?>

<h1>Sad News</h1>

<div id="pic">
    <img src="images/sad.jpeg" >
    Sad gorl vibes
    
</div>
<p>
    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
</p>

</html>