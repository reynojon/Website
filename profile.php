<?php
session_start();

if( !isset( $_SESSION['Stored_Username'] ) ) {
 //  echo "Welcome". $_SESSION['Stored_Username']; 
   header("Location: index.php");

}


 

?>


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

if($_SERVER["REQUEST_METHOD"] == "POST"){
  // username and password pulled from form
  $C_simname=$_REQUEST['simname'];
  //login check
  $_SESSION['Stored_simname']=$C_simname;
  header("location: simulation.php");
  
  
  }


?>

<hr>

<?php

$C_username=$_SESSION['Stored_Username'];
$sql="SELECT * FROM User WHERE username LIKE '$C_username' ";
$result=mysqli_query($conn,$sql);
if ($result->num_rows > 0) {
    echo "<div class=\"navigation\" >";
    echo "<div class=\"navitem\" id=\"brand\" >";
  echo "Welcome: ". $_SESSION['Stored_Username']; 
  echo "</div>";
     echo "<div class=\"navitem\" >";
  echo" <a href=\"logout.php\">Logout</a> ";
  echo "</div>";
  $row = $result->fetch_assoc();
  echo "<p>"."Username: ". $row["username"].  "</p>";
  echo "<p>"."Therapist: ". $row["therapist"].  "</p>";
  
} else {
    echo "0 results";
}
?>
<hr> 
<hr>

<form name="frmUser" method="post" action=""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"">
<table border="0" cellpadding="10" cellspacing="1" width="500" align="center">
<tr class="tableheader">
<td align="center" colspan="2">Download SImulation</td>
</tr>
<tr class="tablerow">
<td align="right">Username</td>
<td>
<select name="simname">
  <option value="One">Sim One</option>
  <option value="Two">Sim Two</option>
  <option value="Three">Sim Three</option>
  <option value="Four">Sim Four</option>
</select>
</td>
</tr>
<tr class="tableheader">
<td align="center" colspan="2"><input type="submit" name="submit" value="Submit"></td>
</tr>
</table>
</form>
</div>
 </div>
</body>
</html>					