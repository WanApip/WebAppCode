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
a {
  text-decoration: none;
  padding: 8px 16px;
}

.previous {
  
  color: black;
}
.table h3{
   text-align: center;
   color: azure;
}
.table p{
   text-align: center;
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
                  <a href="adminlistcustomer.php" class="previous">&laquo; <li>PREVIOUS PAGE</li></a>

             </ul>
          </div>
          </div>
          

          <?php include ("headerpakmat.php");?>

<h2 style="color: white" align="center"> Delete a record </h2>
    <div class="table">
<?php

//look for a valid user id, either through GET or POST
if ((isset ($_GET['id'])) && (is_numeric($_GET['id'])))
{
	$id=$_GET['id'];
}

elseif ((isset ($POST['id'])) && (is_numeric($POST['id'])))
{
	$id=$_POST['id'];
}

else
{
	echo '<p style="color: white" class="error">This page has been accessed in error.</p>';
	exit();
}

if ($_SERVER ['REQUEST_METHOD'] == 'POST')
{
	if ($_POST['sure'] == 'Yes')
	{
		//delete the record
		//make the query

		$q= "DELETE FROM customer Where customer_id=$id LIMIT 1";

		$result= @mysqli_query ($connect, $q);

		if (mysqli_affected_rows ($connect) ==1)
			{
				//if there was no problem
				//display message

				echo '<h3> The user has been deleted.</h3>';
			}

		else
		{
			//display error message
			echo '<p class="error">The record could not be deleted.<br>Probably because it does not exist or due to system error.<p>';

			//debugging message
			echo '<p>'.mysqli_error($connect).'<br>Query:'.$q.'</p>';
		}
	}

	else
	{
		echo '<h3>The user has NOT been deleted.</h3>';
	}
}

else 
{
	//display the form
	//retrieve the member's data

	$q = "SELECT customer_name FROM customer WHERE customer_id=$id";

	$result = @mysqli_query ($connect, $q);

	if (mysqli_num_rows($result) == 1)
	{
		//get the member's data
		$row = mysqli_fetch_array ($result, MYSQLI_NUM);
		echo "<h3>Are you sure want to permanently delete $row[0]? </h3>";

		echo '<form action="admindeletecustomer.php" method="post">

		<p><input id = "submit-no" type = "submit" name="sure" value="Yes">

		<input id ="submit-no" type="submit" name="sure" value="No"><p>

		<input type="hidden" name="id" value="'.$id.'">

		</form>';
	}

	else 
	{
		echo'<p class="error"> This page has been accessed in error.</p>';

		echo '<p>$nbsp;</p>';
	}
}

mysqli_close($connect);

?>
    </div>
    </div>
    
    <footer class="footer">
        <p>© 2022 PAK MAT WESTERN SDN. BHD. SSM : (1265085-D) | All rights reserved</p>
      </footer>
    
</body>
</html>