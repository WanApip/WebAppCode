<html>
<head>
     <title>Pak Mat Western Restaurant</title>
     <meta name="viewport" content="width=device-width,initial-scale=1" />
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="loginstyle.css">
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
.form-container{
	min height: 100vh;
	padding: 20px;
    padding-bottom:60px;
	display: flex;
    align-items: center;
    justify-content: center;
	background-position: center;
	background-size: cover;
	overflow-x: hidden;
	position: relative;
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
<?php
// call file to connect to server
include ("headerpakmat.php");?>

<?php
//This query inserts a record in the restaurant table 
//has form been submitted?
if ($_SERVER ['REQUEST_METHOD']== 'POST')
{
    $error = array(); //initialize an error array

//check for a Firstname
if(empty($_POST ['customer_name']))
{
    $error [] = 'You forgot to enter your Name.';
}

else
{
    $n = mysqli_real_escape_string ($connect, trim ($_POST ['customer_name']));
}

//check for IC
if(empty($_POST ['ic']))
{
    $error [] = 'You forgot to enter your IC.';
}

else
{
    $l = mysqli_real_escape_string ($connect, trim ($_POST ['ic']));
}

//check for phone number
if(empty($_POST ['phone_no']))
{
    $error [] = 'You forgot to enter your telephone number.';
}

else
{
    $i = mysqli_real_escape_string ($connect, trim ($_POST ['phone_no']));
}
//check for address
if(empty($_POST ['customer_address']))
{
    $error [] = 'You forgot to enter your address.';
}

else
{
    $d = mysqli_real_escape_string ($connect, trim ($_POST ['customer_address']));
}

    //register the user in the database
    //make the query
    $q = "Insert INTO customer (customer_id, customer_name, ic, phone_no, customer_address) VALUES (' ', '$n', '$l', '$i', '$d')";
    $result = @mysqli_query ($connect, $q);  //run the query
    
    if ($result)
    {  //if it run
    header("location:HomeAdmin.php"); 
    echo '<h1>Thank you</h1>';
    exit();
    }

    else
    {  //if it did run
    //message
        echo '<h1>System error</h1>';

    //debugging message
        echo '<p>' .mysqli_error($connect). '<br><br>Query: '.$q. '</p>';
    } //end of if (result)
}
?>
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

          <div class="form-container">
 

<form action="adminregistercustomer.php" method="post">
<h3 align="center" >Register Customer<br>
<img class="logo1" src="pakmatlogo-removebg-preview.png"></h3>

<label class ="label" for ="customer_name"> Name : </label>
    <input id = "customer_name" type="text" name="customer_name" size="30" maxlength="150"
    value="<?php if (isset($_POST['customer_name'])) echo $_POST ['customer_name']; ?> " /><br>

<label class ="label" for ="ic"> Ic No : </label><br>
    <input id = "ic" type="text" name="ic" size="30" maxlength="60"
    value="<?php if (isset($_POST['ic'])) echo $_POST ['ic']; ?> " />

<label class ="label" for ="phone_no"> Telephone Number : </label>
    <input id = "phone_num" type="text" name="phone_no" size="30" maxlength="12"
    value="<?php if (isset($_POST['phone_no'])) echo $_POST ['phone_no']; ?> " />

<label class ="label" for ="customer_address"> Address :</label><br><br>
    <textarea id = "customer_address" name="customer_address" rows="5" cols="50"
    value="<?php if (isset($_POST['customer_address'])) echo $_POST ['customer_address']; ?> " ></textarea>

<p><input id="submit" type="submit" name="submit" value="Register" /> &nbsp;&nbsp;
<input id="reset" type="reset" name="reset" value="Clear All" />
</p>

</form>
          </div>
    </div>
          
    </div>

    <footer class="footer">
        <p>© 2022 PAK MAT WESTERN SDN. BHD. SSM : (1265085-D) | All rights reserved</p>
      </footer>
    
</body>
</html>