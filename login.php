<?php
session_start(); // start up your PHP session! 
?>


<?php
	// header("Location: " . $_SERVER['REQUEST_URI']);

  echo "Username= khan Password= 123 ";
  $servername = "localhost";
  $username = "khanshad_admin";
  $password = "Fd3=QL}TC^e@";
  $dbname = "khanshad_cs362";

//connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Make sure of conn
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 


if($_SERVER["REQUEST_METHOD"] == "POST"){
// username and password pulled from form
$C_username=$_REQUEST['username'];
$C_password=$_REQUEST['password'];
//login check
echo "'$C_username'   '$C_password'";
$sql="SELECT * FROM User WHERE username LIKE '$C_username' and password LIKE '$C_password'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$count=0;
$count=mysqli_num_rows($result);

//There is only one entry so 
if($count==1)
{
$_SESSION['Stored_Username']=$C_username;
header("location: profile.php");

}
else
{
$error="Username or Password is invalid";
echo "Did not work '$count' ";

}


}
?>

<html>
<head>
	<title>User Login</title>
	<link rel="stylesheet" href="./style.css">
</head>
<body>
<div class="mainwrapper">
	<div class="formContainer">

		<h1>Log In</h1>

		<form name="frmUser" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
				<p>
					<label for="username">Username</label>
					<input class="textInput" name="username" type="text" required />
				</p>
				<p>
					<label for="password">Password</label>
					<input class="textInput" name="password" type="password" required />
				</p>
				<input name="submit" type = "submit" value="Submit" />
		</form>
		
			<br /><br /><br /><br />
			
			Not Yet Registered? <a href="index.php">Click Here</a>
	</div>
 </div>
</body>
</html>
