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
                  <a href="adminlistcustomer.php"><li>LIST CUSTOMER</li></a>
                  <a ><li></li>
                  <a class="fa fa-search" href="adminsearchcustomer.php"><li>CUSTOMER SEARCH</li>
                  <a href="adminliststaff.php"><li>LIST STAFF</li>
                  <a ><li></li>
                  <a class="fa fa-search" href="adminsearchstaff.php"><li>STAFF SEARCH</li></a>

             </ul>
          </div>
          </div>
          
          <?php include("headerpakmat.php"); ?>


         <form action="adminrecordfoundstaff.php" method="post">

            <h1 style="color:white" align="center">Search Record Staff </h1>
            <p style="color:white" align="center" ><label class="label" for="staff_id">ID Number : </label>
            <input id="staff_id" type="text" name="staff_id" size="30" maxlength="30" 
            value="<?php if (isset($_POST['staff_id'])); ?>" /></p><br>

	<p align="center" ><input id="submit" type="submit" name="submit" value=" SEARCH " /></p>
</form>

</body>
</html>
    </div>

    <footer class="footer">
        <p>© 2022 PAK MAT WESTERN SDN. BHD. SSM : (1265085-D) | All rights reserved</p>
      </footer>
    
</body>
</html>