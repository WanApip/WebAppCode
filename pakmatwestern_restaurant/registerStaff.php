<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Staff</title>

    <!--- custom css file link ----->
    <link rel="stylesheet" href="loginstyle.css">
    <style>
.form-container{
	min height: 100vh;
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
// call file to connect to server
include ("headerpakmat.php");?>


<?php
//This query inserts a record in the restaurant table
//has form been submitted?
if ($_SERVER['REQUEST_METHOD']== 'POST') {
	$error = array(); //initialize an error array

//check for a name
if (empty($_POST['name'])) {
	$error [] = 'You forgot to enter your name.';
}
else {
	$n = mysqli_real_escape_string ($connect, trim ($_POST['name']));
}

//check for a phone number
if (empty($_POST['phone_no'])) {
	$error [] = 'You forgot to enter your telephone number.';
}
else {
	$l = mysqli_real_escape_string ($connect, trim ($_POST['phone_no']));
}

//check for email
if (empty($_POST['email'])) {
	$error [] = 'You forgot to enter your email.';
}
else {
	$s = mysqli_real_escape_string ($connect, trim ($_POST ['email']));
}

//check for position
if (empty($_POST['position'])) {
	$error [] = 'You forgot to enter your position.';
}
else {
	$e = mysqli_real_escape_string ($connect, trim ($_POST ['position']));
}

//check for password
if (empty($_POST['password'])) {
	$error [] = 'You forgot to enter your password.';
}
else {
	$p = mysqli_real_escape_string ($connect, trim ($_POST ['password']));
}

    //register the user in database
    //make the query:
    $q = "Insert INTO staff (staff_id, name, phone_no, email, position, password) VALUES (' ','$n','$l','$s','$e','$p')";
        $result = @mysqli_query($connect, $q); //run the query
        if ($result){ //if it runs
        header("location:adminlogin.php");   
        echo '<h1>thank you<h1>';
        exit();
        } else { //if it did run
        //message
        echo '<h1>System error</h1>';

        //debugging message
        echo '<p>' .mysqli_error($connect).'<br><br>Query: '.$q. '</p>';
        } //end of it (result)
        mysqli_close($connect); //close the database connection.
        exit();

} //End of the main submit conditional
?>



<div class="form-container">
 

<form action="registerStaff.php" method="post">
<h3 align="center" >Register<br>
<img class="logo1" src="pakmatlogo-removebg-preview.png"></h3>
    
    <label class="label" for="name"> Name:</label>
   <input id = "name" type="text" name="name" size="30" maxlength="150"
   value="<?php if (isset($_POST['name'])) echo $_POST ['name']; ?> " />

    <label class="label" for="phone_no"> Telephone Number:</label>
    <input type="tel" id = "phone_no"  name="phone_no"  value="<?php if (isset($_POST['phone_no'])) echo $_POST ['phone_no']; ?> " /></p>
    

    <label class="label" for="email"> Email:</label>
    <input id = "email" type="email" name="email" size="30" maxlength="150"
    value="<?php if (isset($_POST['email'])) echo $_POST ['email']; ?> " /><br><br>

    <label class="label" for="position">Choose Your Position : </label>
    <select name="position" id="text">
    <option>Admin</option>
    <option>Manager</option>
    <option>Staff</option></select><br><br>
     <?php if (isset($_POST['position'])) echo $_POST ['position']; ?>

    <label class="label" for="password"> Password:</label>
    <input id = "password" type="password" name="password" size="12" maxlength="12"
    value="<?php if (isset($_POST['password'])) echo $_POST ['password']; ?> " />


   <p><input id="submit" type="submit" name="submit" value="Register" /> &nbsp; &nbsp;
   <input id="reset" type="reset" name="reset" value="Clear All" />
   </p>
    <p>already have an account? <a href="adminlogin.php">LOGIN NOW</a></p>
</form>


</div>
</body>
</html>