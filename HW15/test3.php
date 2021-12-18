<?php

session_start();
$q_list = array("q1","q2","q3","q4","q5","q6");
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
  $_SESSION["answer"] = $answer[0];
  $_SESSION["correct"] = 0;
  $_SESSION["question"] = $question[0];
}
print_r($_SESSION);

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
$correct = $_SESSION["correct"];
$question[$number] = $_SESSION["question"];



if ($number == 0)
{
  $_SESSION["number"] = $number;
  $_SESSION["question"] = $question[$number];
  $_SESSION["answer"] = $answer[$number];
  $script = $_SERVER['PHP_SELF'];
  echo "post: ".$_POST["submit"];
  echo "answer: ".$answer[$number];
  print <<<FIRST
  <p> You will be given $total_number questions in this quiz. <br /><br/>
      Here is your first question: <br /><br />
  </p>
FIRST;
  print <<<FORM
  $question[0];
  <form method = "post" action = $script>
  <label> <input name="q1" id="q1a" type = "radio" value = "True" /> True  </label>
  <label> <input name="q1" id="q1b" type = "radio" value = "False" /> False  </label>
  <input type = "submit" name="submit" value = "Submit" />
  </form>
FORM;
}
else if($number == 1){
  $_SESSION["number"] = $number;
  $_SESSION["question"] = $question[$number];
  $_SESSION["answer"] = $answer[$number];
  $script = $_SERVER['PHP_SELF'];
  echo "post: ".$_POST["submit"];
  echo "answer: ".$answer[$number];
  print <<<FORM
  $question[$number];
  <form method = "post" action = $script>
  <label> <input name="q2" id="q2a" type = "radio" value = "True" /> True  </label>
  <label> <input name="q2" id="q2b" type = "radio" value = "False" /> False  </label>
  <input type = "submit" name="submit" value = "Submit" />
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
  <label> <input name="q3" id="q3" type = "checkbox" value = "a" /> a) Processing delay at a router  </label> <br>
  <label> <input name="q3" id="q3" type = "checkbox" value = "b" /> b) CPU workload on a client  </label> <br>
  <label> <input name="q3" id="q3" type = "checkbox" value = "c" /> c) Transmission delay along a communications link </label> <br>
  <label> <input name="q3" id="q3" type = "checkbox" value = "d" /> d) Propagation delay </label> <br>
  <input type = "submit" name="submit"  value = "Submit" />
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
<label> <input name="q4" id="q4" type = "checkbox" value = "a" /> a) Processing delay at a router  </label>
<label> <input name="q4" id="q4" type = "checkbox" value = "b" /> b) CPU workload on a client  </label>
<label> <input name="q4" id="q4" type = "checkbox" value = "c" /> c) Transmission delay along a communications link </label>
<label> <input name="q4" id="q4" type = "checkbox" value = "d" /> d) Propagation delay </label>
<input type = "submit" name="submit"  value = "Submit" />
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
  <label> <input name="q5" id= "q5" type = "text" size = "30" /></label></p>
  <input type = "submit" name="submit"  value = "Submit" />
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
  <p> <label> <input name="q6"  id="q6" type = "text" size = "30" /></label></p>
  <input type = "submit" name="submit"  value = "Submit" />
  </form>
FORM;
}

if ($number >= 0)
{
  if (isset($_POST["submit"])){
    check($number);
  }
}

if ($number >= $total_number )
{
  print <<<FINAL_SCORE
  Your final score is $correct correct out of $total_number. <br /><br />
  Thank you for playing. <br /><br />
FINAL_SCORE;
  session_destroy();
}
else
{
  $number++;
  echo $number;
  $_SESSION["number"] = $number;
  $_SESSION["question"] = $question[$number];
  $_SESSION["answer"] = $answer[$number];
}

print <<<BOTTOM
</body>
</html>
BOTTOM;

function check($number){
  $answer = array("False","True","b","c","HTTP","favicon");
  $temp = "q".$number;
  echo $temp;
  echo "post: ".$_POST[$temp];
  echo "answer: ".$answer[$number];
}

?>