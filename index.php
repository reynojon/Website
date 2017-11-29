<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="./style.css">
</head>

<body>
<div class="mainwrapper">

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
					<input class="textInput" name="userName" type="text" required />
				</p>
				<p>
					<label for="password">Password</label>
					<input class="textInput" name="password" type="password" required />
				</p>
				<p>
					<label for="email">Email</label>
					<input class="textInput" name="email" type="text" required />
				</p>
				<p>
					<label for="therapist">Therapist</label>
					<input class="textInput" name="therapist" type="text"/>
				<p>
				<br />
				<input name = "addUser" type = "submit" name="update" value = "Register" target="_SELF" >
			
		</form>
		
			<br /><br /><br /><br />
			
			Already Registered? <a href="login.php">Click Here</a>
	</div>

 </div>
</body>
</html>					
