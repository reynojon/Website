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



?>

<hr>

<?php

$C_simname=$_SESSION['Stored_simname'];
echo $C_simname;
$sql="SELECT * FROM simulations WHERE name LIKE '$C_simname' ";
$result=mysqli_query($conn,$sql);
if ($result->num_rows > 0) {
    echo "<div class=\"navigation\" >";
    echo "<div class=\"navitem\" id=\"brand\" >";
    $row = $result->fetch_assoc();
    
  echo "Sim: ". $_SESSION['Stored_simname']; 
  echo "</div>";
     echo "<div class=\"navitem\" >";
     echo "<a href='".$row['path']."'download>"."Download"."</a>"; // Write an anchor with the url as href, and text as value/content
     
  echo "</div>";
  echo "<p>"."Username: ". $row["path"].  "</p>";
  echo "<p>"."Therapist: ". $row["therapist"].  "</p>";
  
} else {
    echo "0 results";
}
?>
<hr> 
<hr>

</div>
 </div>
</body>
</html>					