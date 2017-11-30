


<!DOCTYPE html>
<html>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<head>

</head>

<body>
<div class="mainwrapper">
<div class="block">

<?php
$servername = "localhost";
$username = "khanshad_admin";
$password = "Fd3=QL}TC^e@";
$dbname = "khanshad_cs362";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 



if ($_SERVER["REQUEST_METHOD"] == "POST") {
// collect value of input field
$name= $_REQUEST['name'];
$age= $_REQUEST['age'];
$trauma= $_REQUEST['trauma'];



if(isset($_POST['submitSurvey'])) {


$In_log_sql = "INSERT INTO survey (name,age,trauma)
VALUES ('$name','$age','$trauma')" ;	
if ($conn->query($In_log_sql ) === TRUE) {
  $_SESSION['surveyTaker']=$name;
} 
else {
echo "Error " . $conn->error;
}


header("location: view-surveys.php");
//  exit();
}
}
?>

<hr>
<h1>Survey</h1>
<a href="http://khanshadid.com/cs362/">Home</a>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<p>
        <label for="name"  > What is Your Name?</label><br>
        <input class="textInput" name="name" type="text"  />
				</p>
				<p>
          <label for="email" >What is Your Age?</label><br>
          <input class="textInput" name="age" type="text"   />			
				<p>
        <label for="trauma">What Kind of Trauma Did you Experience?</label><br>
        <input class="PS_select_input" id="PS_input" name="trauma" type="text" />
				<p>
				<br />
        <input name = "submitSurvey" type = "submit" id = "Submit" value = "Submit" target="_SELF" >
        
		</form>

<hr> 
<hr>

</div>
 </div>
</body>
</html>					