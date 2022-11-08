<html>
<head><title>Pak Mat Western</title></head>

<body>

<?php include ("header.php"); ?>

<h2>Search Result</h2>

<?php

if ((isset ($_GET['ic'])) && (is_numeric($_GET['ic']))) {
$in = $_POST['ic'];
}
elseif ((isset ($POST['ic'])) && (is_numeric($POST['ic'])))
{
	$id=$_POST['ic'];
}
else {
	echo '<p class = "error">This page has been accessed in error.</p>';
		exit();
}

if($_in ['REQUEST_METHOD'] == 'POST'){
	$error = array();}

	//check for a Firstname
if (empty($_POST ['ic'])) {
	$error [] = 'You forgot to enter your ic.';
}
else{
	$in = mysqli_real_escape_string ($connect, trim ($_POST ['ic']));
}
$in = mysqli_real_escape_string($connect, $in);

	$q = "SELECT customer_id, name, ic, phone_no, address, record FROM customer WHERE ic= '$in' ORDER BY customer_id";

	$result = @mysqli_query ($connect, $q); 

	if($result)
	{
		echo '<table border="2">
		<tr><td><b>ID Number</b></td></tr>
		<tr><td><b>Name</b></td></tr>
		<tr><td><b>IC Number</b></td></tr>
		<tr><td><b>Telephone Number</b></td></tr>
		<tr><td><b>Address</b></td></tr>
		<tr><td><b>Record</b></td></tr>';

		//fetch and display record
		while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
			echo '<tr>
			<td>' .row['customer_id']. '</td>
			<td>' .row['name']. '</td>
			<td>' .row['ic']. '</td>
			<td>' .row['phone_no']. '</td>
			<td>' .row['address']. '</td>
			<td>' .row['record']. '</td>
			</tr>';
		}

		echo '</table>';
		mysqli_free_result ($result);
	}

	else
	{
		echo '<p class="error">If no record shown , this is because you had an incorrect or missing entry in the search form.<br>Click the back button on the browser and try again.<p>';

		echo '<p>' .mysqli_error($connect). '<br><br>Query:' .$q.'</p>';
	}

	mysqli_close($connect);
?>

</body>
</html>