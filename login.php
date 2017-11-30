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

</head>
<body>
<h4><a href="index.php">register</a></h4>
<form name="frmUser" method="post" action=""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"">
<table border="0" cellpadding="10" cellspacing="1" width="500" align="center">
<tr class="tableheader">
<td align="center" colspan="2">Welcome To Our Project</td>
</tr>
<tr class="tablerow">
<td align="right">Username</td>
<td><input type="text" name="username"></td>
</tr>
<tr class="tablerow">
<td align="right">Password</td>
<td><input type="password" name="password"></td>
</tr>
<tr class="tableheader">
<td align="center" colspan="2"><input type="submit" name="submit" value="Submit"></td>
</tr>
</table>
</form>
</body></html>