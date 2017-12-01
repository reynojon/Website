


<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="./style.css">
</head>

<body>
<div class="mainwrapper">

<?php
require_once('./dbconn.php');

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

	<div class="navigation" >
		<div class="logout"><a href="profile.php">Home</a></div>
	</div>

	<div class="formContainer">
		<h1>Survey</h1>
		<h4>Please tell us a little bit about yourself and the trauma which has affected your life.</h4>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<p class="wideInput">
				<label for="name">Name:</label>
				<input class="textInput" name="name" type="text" required />
			</p>
			<p class="wideInput">
				<label for="email" >Age:</label>
				<input class="textInput" name="age" type="text" required />
			</p>
			<p class="wideInput">
				<label for="trauma">Trauma Experienced:</label>
				<input class="textInput" name="trauma" type="text" required />
			</p>
			<p>
				<input name = "submitSurvey" type = "submit" value="Submit" target="_SELF" >
			</p>
		</form>
	</div>
</div>
</body>
</html>				
