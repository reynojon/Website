<?php
session_start();
if( !isset( $_SESSION['Stored_Username'] ) ) {
 //  echo "Welcome". $_SESSION['Stored_Username']; 
   header("Location: index.php");
}
 
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./style.css">
</head>
<body>
<div class="mainwrapper">

<?php
require_once('./dbconn.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
  // username and password pulled from form
  $C_simname=$_REQUEST['simname'];
  //login check
  $_SESSION['Stored_simname']=$C_simname;
  header("location: simulation.php");
  
  
  }
?>

<?php
$C_username=$_SESSION['Stored_Username'];
$sql="SELECT * FROM User WHERE username LIKE '$C_username' ";
$result=mysqli_query($conn,$sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		echo "<div class=\"navigation\">\n";
		echo "<div class=\"logout\">";
		echo "<a href=\"logout.php\">Logout</a></div>\n";
		echo "<p>Welcome: ". $row["username"] . "</p>\n"; 
		echo "<p>Therapist: ". $row["therapist"]. "</p>\n"; 
		echo "<hr>";
		echo "</div>";
} else {
    echo "0 results";
}
?>

	<div class="formContainer">
		<form name="frmUser" method="post" action="/cs362/profile.php" />
				<p>
					<h2>Please Identify Your Source of Trauma</h2>
          <a href="http://khanshadid.com/cs362/survey.php">Click Here</a>
				</p>
				<p>
					<h2>Choose A Simulation to Download</h2>
				</p>
				<p>
					<select name="simname">
					  <option value="One">Sim One</option>
					  <option value="Two">Sim Two</option>
					  <option value="Three">Sim Three</option>
					  <option value="Four">Sim Four</option>
					</select>
				</p>
				<br />
				<input type="submit" name="submit" value="Download" />
		</form>
	</div>

 </div>
</body>
</html>	
