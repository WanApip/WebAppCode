<html>
<head>
     <title>Pak Mat Western Restaurant</title>
     <meta name="viewport" content="width=device-width,initial-scale=1" />
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     

<style>
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
                  <a href="adminlistcustomer.php"><li>CUSTOMER LIST</li></a>
                  <a ><li></li>
                  <a class="fa fa-search" href="adminsearchcustomer.php"><li>CUSTOMER SEARCH</li>
                  <a href="adminliststaff.php"><li>STAFF LIST</li>
                  <a ><li></li>
                  <a class="fa fa-search" href="adminsearchstaff.php"><li>STAFF SEARCH</li></a>

             </ul>
          </div>
          </div>
          <div class="banner-title">
          <h1>Welcome<span> To,</span><br>Admin<span> Page.</span></h1>
          <button onClick="document.location='adminuserpakmat.php'" type="button" class="btn">LOG OUT</button>

          </div> 
    </div>

    <footer class="footer">
        <p>© 2022 PAK MAT WESTERN SDN. BHD. SSM : (1265085-D) | All rights reserved</p>
      </footer>
    
</body>
</html>