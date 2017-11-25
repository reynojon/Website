


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

<hr>
<h1>Register</h1>
<a href="login.php">login</a>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<label class="PS_select_label" id="PS_label" > User </label>
<input class="PS_select_input" id="PS_input" name=" userName" type="text" value="" />

<label class="PS_select_label" id="PS_label" > password</label>
<input class="PS_select_input" id="PS_input" name="password" type="password" value="" />

<label class="PS_select_label" id="PS_label" >email</label>
<input class="PS_select_input" id="PS_input" name="email" type="text" value="email" />


<label class="PS_select_label" id="PS_label" > Therapist</label>
<input class="PS_select_input" id="PS_input" name=" therapist" type="text" value="Therapist" />


<input name = "addUser" type = "submit" id = "update" value = "Insert User" target="_SELF" >

</form>
<hr> 
<hr>

</div>
 </div>
</body>
</html>					