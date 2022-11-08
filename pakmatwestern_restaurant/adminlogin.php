<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Staff</title>
	<!--- custom css file link ----->
    <link rel="stylesheet" href="loginstyle.css">
<style>
.form-container{
	min-height: 100vh;
	padding: 20px;
    padding-bottom:60px;
	display: flex;
    align-items: center;
    justify-content: center;
	background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.6)),url(pexels-min-an-1171585.jpg);
	background-position: center;
	background-size: cover;
	overflow-x: hidden;
	position: relative;
}
</style>
</head>
<body>

	<?php
//call file to connect server Pak Mat Western
include ("headerpakmat.php");?>


<?php 
//This section  processes submissions from the login form
//check if the form has been submitted
if ($_SERVER['REQUEST_METHOD']== 'POST') {

//validate the username
if (!empty($_POST['staff_id'])) {
	$un = mysqli_real_escape_string($connect, $_POST['staff_id']);
} else {
	$un =FALSE;
	echo '<p class = "error"> You forgot to enter your ID.</p>';
}

//validate the password
if (!empty($_POST['password'])){
	$p = mysqli_real_escape_string($connect, $_POST['password']);
}
else {
	$p = FALSE;
	echo '<p class = "error"> You forgot to enter your password.</p>';
}

//if no problems
if ($un && $p) {

//retrieve the id, firstname, lastname, for the username and password combination
$q = "SELECT staff_id, name, phone_no, email, position, password FROM staff WHERE (staff_id = '$un' AND password = '$p')";

//run the query and assign it to the variable $result
   $result = mysqli_query ($connect, $q);

   //count the number of rows that match the username/password combination
   //if one database row (record) matches the input:
   if (@mysqli_num_rows ($result) == 1) {
   	//start the session, fetch the record and insert the three values in an array
   	session_start();
   	$_SESSION = mysqli_fetch_array ($result, MYSQLI_ASSOC);
	header("location:HomeAdmin.php");

   	echo '<p>Succesful Log In</p>';
	


   	//cancel the rest of the script
   	exit();

   	mysqli_free_result ($result);
   	mysqli_close ($connect);
   	//no match was made
   }
   else{
   	echo '<p class = "error">The username and password entered do not match our records <br> Perhaps you need to register, just click the Register button</p>';
   }
//if there was a problem
}
else {
	echo '<p class ="error"> Please try again. </p>';
}
  mysqli_close ($connect);
} //end of submit conditional

?>

<div class="form-container">


<form action="adminlogin.php" method="post">
<h3 align="center" >Login<br>
<img class="logo1" src="pakmatlogo-removebg-preview.png"></h3>

<label class="label" for="staff_id"> ID: </label>
<input id = "staff_id" type="text" name="staff_id" size="4" maxlength="6" value="<?php if (isset($_POST['staff_id'])) echo $_POST['staff_id'];?>">

<label class="label" for="password"> Password: </label>
	<input id="password" type="password" name="password" size="15" maxlength="60" value="<?php if (isset($_POST['password'])) echo $_POST['password'];?>">
	<p>&nbsp;</p>

<p><input id="submit" type="submit" name="submit" value="Login" />
   <input id="reset" type="reset" name="reset" value="Clear All" />
   </p>
    <p>Don't have an account? <a href="registerStaff.php">REGISTER NOW</a></p>
</form>
</div>

</body>
</html>