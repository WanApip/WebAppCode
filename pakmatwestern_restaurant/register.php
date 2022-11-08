<html>
<title>Pak Mat Western</title>
<body>

<?php
// call file to connect to server
include ("header.php");?>

<?php
//This query inserts a record in the restaurant table
//has form been submited?
if ($_SERVER['REQUEST_METHOD']== 'POST') {
	$error = array(); //initalize an error array

//check for a Firstname
if (empty($_POST['name'])) {
	$error [] = 'You forgot to enter your name.';
}
else {
	$n = mysqli_real_escape_string ($connect, trim($_POST ['name']));
}

//check for ic
if (empty($_POST['ic'])) {
	$error [] = 'You forgot to enter your ic number.';
}
else {
	$l = mysqli_real_escape_string ($connect, trim($_POST ['ic']));
}

//check for phone number
if (empty($_POST['phone_no'])) {
	$error [] = 'You forgot to enter your telephone number.';
}
else {
	$i = mysqli_real_escape_string ($connect, trim($_POST ['phone_no']));
}

//check for address
if (empty($_POST['address'])) {
	$error [] = 'You forgot to enter your address.';
}
else {
	$d = mysqli_real_escape_string ($connect, trim($_POST ['address']));
}

//check for record
if (empty($_POST['record'])) {
	$error [] = 'You forgot to enter your record.';
}
else {
	$r = mysqli_real_escape_string ($connect, trim($_POST ['record']));
}

    //register the user in database
    //make the query:
    $q = "Insert INTO customer (customer_id, name, ic, phone_no, address, record) VALUES (' ','$n','$1','$i','$d','$r')";
        $result = @mysqli_query($connect, $q); //run the query
        if ($result){
         //if it runs
        echo '<h1>thank you<h1>';
        exit();
        } else { //if it did run
        //message
        echo '<h1>System error</h1>';

        //debugging message
        echo '<p>' .mysql_error($connect).'<br><br>Query: '.$q. '</p>';
        } //end of it (result)
        mysql_close($connect); //close the database connection.
        exit();

}   //End of the main submit conditional
?>

</p>
<h2> Register </h2>
<h4> *required field </h4>
<form action="register.php" method="post">

<p><label class="label" for="name"> Name : *</label>
<input id = "name" type="text" name="name" size="30" maxlength="150"
value="<?php if (isset($_POST['name'])) echo $_POST ['name']; ?> " /></p>

<p><label class="label" for="ic"> No IC : *</label>
<input id = "ic" type="number" name="ic" size="30" maxlength="150"
value="<?php if (isset($_POST['ic'])) echo $_POST ['ic']; ?> " /></p>

<p><label class="label" for="phone_no"> Telephone Number : *</label>
<input id = "phone_no" type="text" name="phone_no" size="12" maxlength="12"
value="<?php if (isset($_POST['phone_no'])) echo $_POST ['phone_no']; ?> " />
</p>

<p><label class="label" for="address"> Address : *</label></p>
<textarea name="address" rows="5" cols="40"><?php if (isset($_POST['address'])) echo $_POST['address']; ?></textarea>

<p><label class="label" for="record"> Record : *</label></p>
<textarea name="record" rows="5" cols="40"><?php if (isset($_POST['record'])) echo $_POST['record']; ?></textarea>

<p><input id="submit" type="submit" name="submit" value="Register" /> &nbsp; &nbsp;
<input id="reset" type="reset" name="reset" value="Clear All" />
</p>
</form>
</body>
</html>