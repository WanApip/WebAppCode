<!DOCTYPE html> 
<html>
<head>
	<title>Pak Mat Western</title>
</head>
<body>

<?php include ("header.php");?>

<h2> Edit a record</h2>



<?php
//look for a valid user id, either throuh GET or POST
if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
	$id = $_GET['id'];	
} elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
    $id =$_POST['id'];	
} else {
	echo '<p class ="error">This page has been accessed in error.</p>';
	exit();
}

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	$error == array();

	//check for a Firstname
if (empty($_POST ['name'])) {
	$error [] = 'Your forgot to enter your Name.';
}
else {
	$n = mysqli_real_escape_string ($connect, trim($_POST ['name']));
}

    //check for ic
if (empty($_POST ['ic'])) {
	$error [] = 'Your forgot to enter your ic number.';
}
else {
	$l = mysqli_real_escape_string ($connect, trim($_POST ['ic']));
}
 
    //check for phone number
if (empty($_POST ['phone_no'])) {
	$error [] = 'Your forgot to enter your telephone number.';
}
else {
	$i = mysqli_real_escape_string ($connect, trim($_POST ['phone_no']));
}

    //check for address
if (empty($_POST ['address'])) {
	$error [] = 'Your forgot to enter your address.';
}
else {
	$d = mysqli_real_escape_string ($connect, trim($_POST ['address']));
}

    //check for record
if (empty($_POST ['record'])) {
	$error [] = 'Your forgot to enter your record.';
}
else {
	$n = mysqli_real_escape_string ($connect, trim($_POST ['record']));
}


  //if no problem occured
  if (empty($error)) {

  	  $q = "SELECT customer_id FROM customer WHERE record = '$r' AND customer_id != $id";
 
 $result = @mysqli_query($connect, $q);

 if(mysqli_num_rows($result) == 0 ){
 	$q = "UPDATE customer SET name= '$n' , ic = '$l', phone_no = '$i', address = '$d', record = '$r' WHERE customer_id= '$id' LIMIT 1";
 }

 $result = @mysqli_query($connect, $q);

 if (mysqli_affected_rows($connect) == 1){

 	echo '<h3>The user has been edited</h3>';
 } else {
 	echo '<p class="error"> The user has not be edited due to the system error. We apologize for any incovinience.</p>';
 	echo '<p>' .mysqli_error($connect). '<br/> query: ' .$q. ' </p>';
 }

 }else {
 	echo '<p class="error">The ic has already been registered</p>';
  }
    }else {
    	echo '<p class ="error"> The following error (s) occured: <br/>';
    	foreach ($error as $msg) 
      {  
    		echo "-$msg<br/> \n";
    	}
    	echo '</p><p>Please try again.</p>';
}



$q = "SELECT name, ic, phone_no, address, record FROM customer WHERE customer_id=$id";
$result = @mysqli_query($connect, $q);

if (mysqli_num_rows($result) == 1 ) {
	//get customer information
	$row = mysqli_fetch_array ($result, MYSQLI_NUM);

	//create the form
echo '<form action ="edit_customer.php" method="post"> 

    <p><label class = "label" for "name" > Name: </label>
    <input id = "name" type = "text" name = "name" size = "30"maxlength="30" value="'.$row[0].'"></p>

     <p><br><label class = "label" for "ic" > No IC: </label>
    <input id = "ic" type = "text" name = "ic" size = "30" maxlength="30" value="'.$row[1].'"></p>

    <p><br><label class = "label" for="phone_no" > Telephone Number: </label>
    <input id = "phone_no" type ="text" name ="phone_no" size="30" maxlength="30" value="'.$row[2].'"></p>

    <p><br><label class = "label" for="address" > Address: </label>
    <textarea name="address" rows="5" cols="40">'.$row[3].' </textarea></p>

 <p><br><label class = "label" for="record" > Record: </label>
    <textarea name="record" rows="5" cols="40">'.$row[4].' </textarea></p>

   <br><p><input id="submit" type="submit" name="submit" value="Edit"></p>

   <br><input type="hidden" name="id" value="'.$id.'"/>

   </form>';


} else {
	echo '<p class="error"> This page has been acessed in error.</p>';
}

mysqli_close ($connect);

?>
</body>
</html>