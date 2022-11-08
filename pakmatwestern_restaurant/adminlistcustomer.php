<html>
<head>
     <title>Pak Mat Western Restaurant</title>
     <meta name="viewport" content="width=device-width,initial-scale=1" />
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">

<style>
  body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {
    font-family: "Amatic SC", sans-serif
}    
.hero{
	height: 100vh;
	background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.6)),url(pexels-min-an-1171585.jpg);
	background-position: center;
	background-size: cover;
	overflow-x: hidden;
	position: relative;
}

.center {
    margin-left: auto;
    margin-right: auto;
}

.footer {
  text-align: center;
  padding: 40px;
  background-color: rgb(32, 27, 27);
  color: white;
  font-size: 10px;
}
</style>
     
</head>
<body>
    <div class="hero">
    <div class="nav-bar">
       <div class="nav-logo">
          <img src="pakmatlogo-removebg-preview.png">  
      </div>
      <div class="nav-links" id="nav-links">
              <ul>
              <a href="HomeAdmin.php"><li>HOME</li></a>
                  <a href="adminregistercustomer.php"><li>REGISTER CUSTOMER</li></a>
                  <a href="adminlistcustomer.php"><li>CUSTOMER LIST</li></a>
                  <a ><li></li>
                  <a class="fa fa-search" href="adminsearchcustomer.php"><li>CUSTOMER SEARCH</li>
                  <a href="adminliststaff.php"><li>STAFF LIST</li>
                  <a ><li></li>
                  <a class="fa fa-search" href="adminsearchstaff.php"><li>STAFF SEARCH</li></a>

             </ul>
          </div>
    </div>
    <h1 style="color: white" align="center">Customer List</h1>

      <?php include ("headerpakmat.php");?>

<?php
	
//make the query
$q= "SELECT customer_id, customer_name, ic, phone_no, customer_address FROM customer ORDER BY customer_id";

//run the query
$result= @mysqli_query ($connect, $q);

//if it ran withut a problem, display the records
if($result)
{
    
	//table heading
	echo 
    '<table class="center" style="color: white" border="1"  ></style>
	<tr align="center"><td><b> Edit </b></td>
	<td><b> Delete </b></td>
	<td><b>Customer ID</b></td>
	<td><b>Name</b></td>
	<td><b>IC Number</b></td>
	<td><b>Phone Number</b></td>
	<td><b>Address</b></td></tr>';

	//fetch and print all the records
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		echo '<tr align="center">
		<td><a href="admineditcustomer.php?id=' .$row["customer_id"].'">Edit</a></td>
		<td><a href="admindeletecustomer.php?id=' .$row["customer_id"].'">Delete</a></td>
		<td>' .$row ['customer_id']. '</td>
		<td>' .$row ['customer_name']. '</td>
		<td>' .$row ['ic']. '</td>
		<td>' .$row ['phone_no']. '</td>
		<td>' .$row ['customer_address']. '</td>
		</tr>';
	}
	//close the table
	echo '</table>';

	//free up the resources
	mysqli_free_result ($result);
}

//if failed to run
else 
{
	//error message
	echo '<p class ="error">The current customer could not be retrieved. We apologized for any inconvenience.</p>';

	//debugging message
	echo '<p>' .mysqli_error($connect). '<br><br>Query: '.$q. '</p>';
}//end of it ($result)

//close the database connection
mysqli_close($connect);

?>
    </div>
          </div> 
    </div>

    <footer class="footer">
        <p>© 2022 PAK MAT WESTERN SDN. BHD. SSM : (1265085-D) | All rights reserved</p>
      </footer>
    
 </div>
</body>
</html>