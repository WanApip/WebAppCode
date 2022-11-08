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
    <h1 style="color: white" align="center">Staff List</h1>

    <?php include ("headerpakmat.php");?>

<?php
	
//make the query
$q= "SELECT staff_id, name, phone_no, email, position, password FROM staff ORDER BY staff_id";

//run the query
$result= @mysqli_query ($connect, $q);

//if it ran without a problem, display the records
if($result)
{
	//table heading
	echo '<table class="center" style="color: white" border="1" >
	<tr><td><b>Edit</b></td>
	<td><b>Delete</b></td>
	<td><b>Staff ID</b></td>
	<td><b>Name</b></td>
	<td><b>Phone Number</b></td>
	<td><b>Email</b></td>
	<td><b>Position</b></td>
	<td><b>Password</b></td></tr>';

	//fetch and print all the records
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		echo '<tr align="center">
		<td><a href="admineditstaff.php?id=' .$row["staff_id"].'">Edit</a></td>
		<td><a href="admindeletestaff.php?id=' .$row["staff_id"].'">Delete</a></td>
		<td>' .$row ['staff_id']. '</td>
		<td>' .$row ['name']. '</td>
		<td>' .$row ['phone_no']. '</td>
		<td>' .$row ['email']. '</td>
		<td>' .$row ['position']. '</td>
		<td>' .$row ['password']. '</td>
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
	echo '<p class ="error">The current staff could not be retrieved. We apologized for any inconvenience.</p>';

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