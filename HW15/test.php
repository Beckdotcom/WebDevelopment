<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);   

if (!isset($_SESSION["number"])){
    $_SESSION["number"] = 1;
    $_SESSION["score"] = 0;
}
//$questions = array("q1","q2","q3","q4","q5","q6");
//$answer = array("False","True","b","c","HTTP","favicon");
$total_number = 6;
$number = $_SESSION["number"];
$score = $_SESSION["score"];
print_r($_SESSION);

print <<<TOP
<html>
<head>
<title> CS Quiz </title>
</head>
<body>
<h3> CS Quiz </h3>
TOP;

//FIRST Q -------------------------------
if ($number == 1){
    $_SESSION["number"] = $number;
    $score = $_SESSION["score"];
    print <<<FIRST
    <p> You will be given $total_number questions in this quiz. <br /><br/>
        Here is your first question: <br /><br />
        <p> <b>1.</b> "URL" stands for "Universal Reference Link"</p>
    </p>
FIRST;
    $script = $_SERVER['PHP_SELF'];
    print <<<FORM
    <form method = "post" action = $script>
    <label> <input name="q1" id="q1a" type = "radio" value = "True" /> True  </label>
    <label> <input name="q1" id="q1b" type = "radio" value = "False" /> False  </label>
    <input type = "submit" name="submit" value = "Submit" />
    </form>
    
FORM;

    
    if ( $_POST["q1"] == "False"){
        $score += 10;
        $number++;
    }
    else{
        $number++;
    }
    echo $_POST["q1"];
    
    
}

//Q2 -------------------------------
else if ($number == 2){
    $_SESSION["number"] = $number;
    $score = $_SESSION["score"];
print <<<QUESTION
    <p> <b>2.</b> An Apple MacBook is an example of a Linux system.</p>
QUESTION;

    $script = $_SERVER['PHP_SELF'];
print <<<FORM
<form method = "post" action = $script>
<label> <input name="q2" id="q2a" type = "radio" value = "True" /> True  </label>
<label> <input name="q2" id="q2b" type = "radio" value = "False" /> False  </label>
<input type = "submit" value = "Submit" />
</form>
FORM;

    echo (isset($_POST['submit']));
    if (isset($_POST['submit'])){
        if ( $_POST["q2"] == "True"){
            $score += 10;
            $number++;
        }
        else{
            $number++;
        }
    }
    
}

//Q3 ----------------------------------------------

else if ($number == 3){
print <<<QUESTION
<p> <b>3.</b> Which of these do NOT contribute to packet delay in a packet switching network?</p>
QUESTION;

    $script = $_SERVER['PHP_SELF'];
print <<<FORM
<form method = "post" action = $script>
<label> <input name="q3" id="q3" type = "checkbox" value = "a" /> a) Processing delay at a router  </label> <br>
<label> <input name="q3" id="q3" type = "checkbox" value = "b" /> b) CPU workload on a client  </label> <br>
<label> <input name="q3" id="q3" type = "checkbox" value = "c" /> c) Transmission delay along a communications link </label> <br>
<label> <input name="q3" id="q3" type = "checkbox" value = "d" /> d) Propagation delay </label> <br>
<input type = "submit" value = "Submit" />
</form>
FORM;



if (isset($q3) && $q3 =="b"){
    $score += 10;
}

$number++;
}

else if ($number == 4){
print <<<QUESTION
<p> <b>3.</b> Which of these do NOT contribute to packet delay in a packet switching network?</p>
QUESTION;

$script = $_SERVER['PHP_SELF'];
print <<<FORM
<form method = "post" action = $script>
<label> <input name="q3" id="q3" type = "checkbox" value = "a" /> a) Processing delay at a router  </label>
<label> <input name="q3" id="q3" type = "checkbox" value = "b" /> b) CPU workload on a client  </label>
<label> <input name="q3" id="q3" type = "checkbox" value = "c" /> c) Transmission delay along a communications link </label>
<label> <input name="q3" id="q3" type = "checkbox" value = "d" /> d) Propagation delay </label>
<input type = "submit" value = "Submit" />
</form>
FORM;



if (isset($q4) && $q4 =="c"){
    $score += 10;
}

$number++;
}

else if ($number == 5){
print <<<QUESTION
    <b>5.</b> ________ is a networking protocol that runs over TCP/IP, and governs communication between web browsers and web servers.</p>    
QUESTION;

$script = $_SERVER['PHP_SELF'];
print <<<FORM
    <form method = "post" action = $script>
    <label> <input name="q5" id= "q5" type = "text" size = "30" /></label></p>
    <input type = "submit" value = "Submit" />
    </form>
FORM;



if (isset($q5) && strtoupper($q5) =="HTTP"){
    $score += 10;
}

$number++;
}

else if ($number == 6){
print <<<QUESTION
    <b>6.</b>   </p> 
QUESTION;

$script = $_SERVER['PHP_SELF'];
print <<<FORM
    <form method = "post" action = $script>
    <p> <label> <input name="q6"  id="q6" type = "text" size = "30" /></label></p>
    <input type = "submit" value = "Submit" />
    </form>
FORM;



if (isset($q6) && strtolower($q6) =="favicon"){
    $score += 10;
}

$number++;
}

if ($number > $total_number)
{
print <<<FINAL_SCORE
Your final score is $score correct out of 60. <br /><br />
<br /><br />
FINAL_SCORE;
session_destroy();
}




print <<<BOTTOM
</body>
</html>
BOTTOM;

?>