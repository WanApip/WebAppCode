<html>
<title>Pak Mat Western</title>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="include.css" />
</head>

<body>

<?php include ("header.php");?>


<?php
//make the query
$q = "SELECT customer_id, name, ic, phone_no, address, record FROM customer ORDER BY customer_id";

//run the query
$result = @mysqli_query($connect, $q);

//if it ran without a problem, displays the records
if ($result)
 {
	//Table heading
	echo'<table border="2">
		<tr><td><b>Edit</b></td>
		<td><b>Delete</b></td>
		<td><b>ID customer</b></td>
		<td><b>Name</b></td>
		<td><b>No IC</b></td>
		<td><b>Telephone No</b></td>
		<td><b>Address</b></td>
		<td><b>Record</b></td></tr>';


		//Fetch and print all the records
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			echo '<tr>
			<td><a href="edit_customer.php?id='.$row['customer_id'].'">Edit</a></td>
			<td><a href="delete_customer.php?id='.$row['customer_id'].'">Delete</a></td>
			<td>' .$row ['customer_id']. '</td>
			<td>' .$row ['name']. '</td>
			<td>' .$row ['ic']. '</td>
			<td>' .$row ['phone_no']. '</td>
			<td>' .$row ['address']. '</td>
			<td>' .$row ['record']. '</td>
		    </tr>';
		}
		//close the table
	    echo '</table>';

	    //free up the resources
	    mysqli_free_result ($result);

//if failed to run		
} else {

	//error message
	echo '<p class="error">The current customer could not be retrieved. We apologize for any incovinience.</p>';

	//debugging message
	echo '<p>' .mysqli_error($connect).' <br><br/>Query: '.$q.'</p>';	
}   //end of it ($result)
//close the database connection
mysqli_close($connect);
?>

</div>
</div>
</body>
</html>