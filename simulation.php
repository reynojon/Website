<?php
session_start();

if( !isset( $_SESSION['Stored_Username'] ) ) {
 //  echo "Welcome". $_SESSION['Stored_Username']; 
   header("Location: index.php");

}


 

?>

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
<div class="block">

<?php
require_once('./dbconn.php');

$C_simname=$_SESSION['Stored_simname'];
//echo $C_simname;
$sql="SELECT * FROM simulations WHERE name LIKE '$C_simname' ";
$result=mysqli_query($conn,$sql);
if ($result->num_rows > 0) {
    echo "<div class=\"navigation\" >\n";
    
    $row = $result->fetch_assoc();
    
	echo "<h2>Simulation: ". $_SESSION['Stored_simname'] . "</h2>\n"; 
	echo "<div class=\"download\">";
    echo "<a href='".$row['path']."'download>"."Download"."</a>\n"; // Write an anchor with the url as href, and text as value/content
     
  echo "</div>\n";
  echo "<p>"."Download URL: ". $row["path"].  "</p>\n";
  echo "</div>\n";
  
} else {
    echo "0 results";
}
?>


</div>
</body>
</html>	
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



?>

<hr>


</div>
 </div>
</body>
</html>					
