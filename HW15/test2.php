<?php
session_start();
$question = array("URL stands for  Universal Reference Link",
                    "An Apple MacBook is an example of a Linux system.",
                    "Which of these do NOT contribute to packet delay in a packet switching network?",
                    " ________ is a networking protocol that runs over TCP/IP, and governs communication between web browsers and web servers.",
                    "This Internet layer is responsible for creating the packets that move across the network.",
                    "A small icon displayed in a browser table that identifies a website is called a ____________",
                    );
$answer = array("False","True","b","c","HTTP","favicon");

if (!isset($_SESSION["number"]))
{
  $_SESSION["number"] = 0;
  $_SESSION["username"] = $_COOKIE["username"];
  $_SESSION["answer"] = $answer[0];
  $_SESSION["correct"] = 0;
  $_SESSION["question"] = $question[0];
  $_SESSION['timeout'] = time();

  /*$myfile = fopen("results.txt", "a") or die("Unable to open file! write");
  
  fwrite($myfile,$line);
  fclose($myfile);
  */
  $line = "\n".$_COOKIE["username"].":0\n";
  file_put_contents("results.txt", $line, FILE_APPEND);
}
//print_r($_SESSION);
$total_number = 6;

print <<<TOP
<html>
<head>
<title> CS Quiz </title>
</head>
<body>
<h3> CS Quiz </h3>
TOP;

$number = $_SESSION["number"];
$answer[$number] = $_SESSION["answer"];
//$correct = $_SESSION["correct"];
$question[$number] = $_SESSION["question"];
$username = $_COOKIE["username"];

if ($_SESSION['timeout'] + 60 * 15 < time()) {
  // session timed out
  $correct = strval($_SESSION["correct"]-1);
  print <<<FINAL_SCORE
  <br /><br />
  You ran out of time.
  Your final score is $correct out of $total_number. <br /><br />
  <br /><br />
FINAL_SCORE;
  session_destroy();
}
else if ($number == 0)
{
  $_SESSION["number"] = $number;
  $_SESSION["question"] = $question[$number];
  $_SESSION["answer"] = $answer[$number];
  $script = $_SERVER['PHP_SELF'];
  
  print <<<FIRST
  <p> You will be given $total_number questions in this quiz. <br /><br/>
      Here is your first question: <br /><br />
  </p>
FIRST;
  print <<<FORM
  $question[0];
  <form method = "post" action = $script>
  <label> <input name="submit" id="q1a" type = "radio" value = "True" /> True  </label>
  <label> <input name="submit" id="q1b" type = "radio" value = "False" /> False  </label>
  <input type = "submit" value = "Submit" />
  </form>
FORM;
}
else if($number == 1){
  $_SESSION["number"] = $number;
  $_SESSION["question"] = $question[$number];
  $_SESSION["answer"] = $answer[$number];
  $script = $_SERVER['PHP_SELF'];
  print <<<FORM
  $question[$number];
  <form method = "post" action = $script>
  <label> <input name="submit" id="q2a" type = "radio" value = "True" /> True  </label>
  <label> <input name="submit" id="q2b" type = "radio" value = "False" /> False  </label>
  <input type = "submit" value = "Submit" />
  </form>
FORM;
  
}
else if($number == 2){
  $_SESSION["number"] = $number;
  $_SESSION["question"] = $question[$number];
  $_SESSION["answer"] = $answer[$number];
  $script = $_SERVER['PHP_SELF'];
  print <<<FORM
  $question[$number];
  <form method = "post" action = $script>
  <label> <input name="submit" id="q3" type = "checkbox" value = "a" /> a) Processing delay at a router  </label> <br>
  <label> <input name="submit" id="q3" type = "checkbox" value = "b" /> b) CPU workload on a client  </label> <br>
  <label> <input name="submit" id="q3" type = "checkbox" value = "c" /> c) Transmission delay along a communications link </label> <br>
  <label> <input name="submit" id="q3" type = "checkbox" value = "d" /> d) Propagation delay </label> <br>
  <input type = "submit"  value = "Submit" />
  </form>
FORM;

}
else if($number == 3){
  $_SESSION["number"] = $number;
  $_SESSION["question"] = $question[$number];
  $_SESSION["answer"] = $answer[$number];
  $script = $_SERVER['PHP_SELF'];
  
  print <<<FORM
  $question[$number];
  <form method = "post" action = $script>
  <label> <input name="submit" id="q4" type = "checkbox" value = "a" /> a) Physical  </label>
  <label> <input name="submit" id="q4" type = "checkbox" value = "b" /> b) Data Link  </label>
  <label> <input name="submit" id="q4" type = "checkbox" value = "c" /> c) Network </label>
  <label> <input name="submit" id="q4" type = "checkbox" value = "d" /> d) Transport </label>
  <input type = "submit"  value = "Submit" />
  </form>
FORM;
}
else if($number == 4){
  $_SESSION["number"] = $number;
  $_SESSION["question"] = $question[$number];
  $_SESSION["answer"] = $answer[$number];
  $script = $_SERVER['PHP_SELF'];
  print <<<FORM
  $question[$number];
  <form method = "post" action = $script>
  <label> <input name="submit" id= "q5" type = "text" size = "30" /></label></p>
  <input type = "submit"  value = "Submit" />
  </form>
FORM;
}
else if($number == 5){
  $_SESSION["number"] = $number;
  $_SESSION["question"] = $question[$number];
  $_SESSION["answer"] = $answer[$number];
  $script = $_SERVER['PHP_SELF'];
  print <<<FORM
  $question[$number];
  <form method = "post" action = $script>
  <p> <label> <input name="submit"  id="q6" type = "text" size = "30" /></label></p>
  <input type = "submit"  value = "Submit" />
  </form>
FORM;
}


if ($number >= 0)
{
  //echo "post ".$_POST["submit"]."<br>";
  //echo "answer ".$_SESSION["correct"];
  if($_POST["submit"] == $answer[$number-1]){
    $_SESSION["correct"]++;
    $score = strval($_SESSION["correct"]-1) * 10;
    update($username,$score);
    //$_SESSION["correct"] = $correct;
  }
  
}

//echo "<br>"."number".$number;
if ($number >= $total_number )
{
  $correct = strval($_SESSION["correct"]-1) * 10;
  $total = $total_number * 10;
  print <<<FINAL_SCORE
  Your final score is $correct out of $total. <br /><br />
   <br /><br />
FINAL_SCORE;
  session_destroy();
}
else
{
  $number++;
  $_SESSION["number"] = $number;
  $_SESSION["question"] = $question[$number];
  $_SESSION["answer"] = $answer[$number];
}

print <<<BOTTOM
</body>
</html>
BOTTOM;

function update($username,$score){
  //file into array
  $lines = file("results.txt");
  //print_r($lines);
  //last element
  $lines[sizeof($lines)-1] = $username.":".$score;
  $myfile = fopen("results.txt", "w") or die("Unable to open file! write");
  foreach ($lines as $value){
    if (trim($value) != ""){
      fwrite($myfile,$value);
    }
  }
  fclose($myfile);
  
  /*print("string ".substr($last,0,strlen($username)));
  if( substr($last,0,strlen($username)+1) != $username){
    $myfile = fopen("results.txt", "a") or die("Unable to open file! write");
    fwrite($myfile,$username.":".$score);
    fclose($myfile);
  }
  //$myfile = fopen("results.txt", "r") or die("Unable to open file! read");
  //ftruncate($myfile, 0);
  //fclose($myfile);
  else{
  

  
  else{
    print("doesn't match");
  }
  
  //}
  print_r($lines);
  */
}
?>