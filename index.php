<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="./style.css">
</head>

<body>
<div class="mainwrapper">

<?php 
	include './dbconnect.php';
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// collect value of input field
$userName= $_REQUEST['userName'];
$password= $_REQUEST['password'];
$email= $_REQUEST['email'];
$therapist= $_REQUEST['therapist'];


if(isset($_POST['addUser'])) {


$In_log_sql = "INSERT INTO User (username,password,email,therapist)
VALUES ('$userName','$password','$email','$therapist')" ;	
if ($conn->query($In_log_sql ) === TRUE) {
echo "Inserted to User successfully";

} 
else {
echo "Error Inserting to User : " . $conn->error;
}


header("Location: " . $_SERVER['REQUEST_URI']);
//  exit();
}
}
?>
	<div class="formContainer">

		<h1>Create A New Account</h1>

		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<p>
					<label for="userName">Username</label>
					<input class="PS_select_input" id="PS_input" name=" userName" type="text" value="" />
				</p>
				<p>
					<label for="password">Password</label>
					<input class="PS_select_input" id="PS_input" name="password" type="password" value="" />
				</p>
				<p>
					<label for="email">Email</label>
					<input class="PS_select_input" id="PS_input" name=" therapist" type="text" value="Therapist" />
				</p>
				<p>
					<label for="therapist">Therapist</label>
					<input class="textInput" id="therapist" type="text"/>
				<p>
				<br />
				<input name = "addUser" type = "submit" id = "update" value = "Register" target="_SELF" >
			
		</form>
		
			<br /><br /><br /><br />
			
			Already Registered? <a href="login.php">Click Here</a>
	</div>

 </div>
</body>
</html>					
