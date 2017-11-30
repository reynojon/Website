


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

?>

<hr>

<?php
$sql="SELECT * FROM survey ";
$result=mysqli_query($conn,$sql);
	if ($result->num_rows > 0) {
        echo "<div class=\"logout\">";                    
        echo "<a href=\"http://khanshadid.com/cs362/\">Home</a></div>\n <br>";

        while($row = $result->fetch_assoc()) {
            echo "<div class=\"entry\">";                                
            echo "<p>Name: ". $row["name"] . "</p>\n"; 
            echo "<p>Age: ". $row["age"]. "</p>\n"; 
            echo "<p>Trauma: ". $row["trauma"]. "</p>\n"; 
            echo "<hr>";
            echo "</div>";
            
        }

} else {
    echo "0 results";
}
?>


	</div>

 </div>
</body>
</html>	