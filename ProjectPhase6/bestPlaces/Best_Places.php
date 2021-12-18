

<!DOCTYPE html>
<?php


    $server = "spring-2021.cs.utexas.edu";
    $user = "cs329e_bulko_zmoneyzb";
    $pwd = "beset4goal!normal";
    $dbName = "cs329e_bulko_zmoneyzb";

    $mysqli = new mysqli ($server,$user,$pwd,$dbName);


    if ($mysqli->connect_errno){
        die('connect error: '. $mysqli->connect_errno . "." . $mysqli->connect_error);
    }

    
    //#############################################################################################






    if (!empty($_POST)){


        $description = $_POST['description'];
        $code = $_POST['building'];
        $type = $_POST['spot'];

        $sql = "SELECT * FROM buildings WHERE code='" . $code . "'"; 
        $result = $mysqli->query($sql);

        echo " <option value=''>Please Select Building</option>";
        if ($result->num_rows > 0) {
            $row = $result->fetch_row();
            var_dump($row);
            $lat = $row[2];
            $lng = $row[3];

            $sql = "INSERT INTO spots (spotType, description, lat, lng, code) VALUES ('" . $type . "','" . $description.  "','" . $lat . "','" . $lng . "','" . $code . "')";

            if (mysqli_query($mysqli, $sql)){
                echo "Recode Updated";
            } else{
               echo "Error : " . sql. "<br>" . mysqli_error($mysqli);
            }  
        }  
       
    }


?>
<html lang="en">   
<head>
	<title>New Horns</title>
	<meta charset="UTF-8">
	<meta name="description" content="New Horns by Old Horns">
	<meta name="authors" content="Beck Dong, Zephyr Reames-Zepeda, Yujin Song, Jerry Villalobos">

	<link href = "bestSpotsStyle.css" rel = "stylesheet">
    
   
</head> 

<body>



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
    
    <div id = "header"> 
        <h2> Best Places</h2>
    <div id = "legend">
        <img class = "markers" src="blueMarker.png"/>
        <img class = "markers" src="yellowMarker.png"/>
        <img class = "markers" src="pinkMarker.png"/> 
    </div>
        
    <div id = "key">
       <p>Study Spots</p>
       <p>Napping Nooks</p>
       <p>Bathroom Breaks</p>
    </div>
         <script src = "best_place.js"></script> 
        <button id="button" type="button" onclick="submitPlace()">Submit a Place</button>
    </div>
       
    
        <form id="form" method="POST" action="Best_Places.php">
            <div>
                <p>Spot Vibe:</p>
                <input type="radio" id = "study" name ="spot" value="study" required>
                <label for ="study">Study</label>
                <input type="radio" id = "nap" name ="spot" value="nap" required>
                <label for="nap">Nap</label>
                <input type="radio" id="bathroom" name ="spot" value="bathroom" required>
                <label for ="bathroom">Bathroom</label>
            </div>
            
            <div>    
                <p> Building </p>
                <label>Choose a browser from this list:</label>
                <select id="buildings" name="building" required>
                   <?php 
           
                    $sql = "SELECT * FROM buildings"; 
                    $all = $mysqli->query($sql);
                  
                    echo " <option value=''>Please Select Building</option>";
                    if ($all->num_rows > 0) {
                       while($row = $all->fetch_assoc()) {  
                            echo "<option value=" . $row['code'] . ">" . $row['code'] . "-" . $row['name'] . "</option>";
                       }  
                    }
        
                    ?>
                </select>
            </div>
            
            <div>
                <p> Description </p>
                <input type="text" name="description" required>
            </div>
            <input type="submit" value="Submit"> 
        </form>
    
     <div id="map">
         <script src="app.js"></script>   
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIjwTCBTY0ZIae1bsPOpeGwi19QJ_51hw&map_ids=ab5ac4134cec60d6&callback=initMap">
        </script>    
    </div>
   
</body>
</html>
