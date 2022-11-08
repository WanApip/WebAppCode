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
                  <a href="adminsearchstaff.php" class="previous">&laquo; <li>PREVIOUS PAGE</li></a>

             </ul>
          </div>
          </div>
          
          <?php include("headerpakmat.php"); ?>

            <h2 style="color:white" align="center"> Search Result </h2>

            <?php

            $id = $_POST['staff_id'];
            $id = mysqli_real_escape_string($connect,$id);

            $q = "SELECT staff_id, name, phone_no, email, position, password FROM staff WHERE staff_id = '$id' ORDER BY staff_id";

            $result = @mysqli_query ($connect,$q);

            if($result) {
               echo '<table class="center" style="color: white" border="20"  >
               <tr><td><b> ID </b></td>
               <td><b> Name </b></td>
               <td><b> Phone Number </b></td>
               <td><b> Email </b></td>
               <td><b> Position </b></td>
               </tr>';

               //fetch and display record
               while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                  echo '<tr align="center">
                  <td>' .$row['staff_id']. '</td>
                  <td>' .$row['name']. '</td>
                  <td>' .$row['phone_no']. '</td>
                  <td>' .$row['email']. '</td>
                  <td>' .$row['position']. '</td>
                  </tr>';
               }
               echo '</table>';
               mysqli_free_result($result);
            }  else {
               echo '<p class = "error"> If no record is shown, this is because you had an incorrect or missing entry in search form. <br> Click the back button on the browser and try again.</p>';
               echo '<p>' .mysqli_error($connect). '<br><br>Query : '.$q.'</p>';
            }
            mysqli_close($connect);
            ?>

            </div>
         </div>
         </div>
      </div>
   </div>
</body>
</html>

    <footer class="footer">
        <p>© 2022 PAK MAT WESTERN SDN. BHD. SSM : (1265085-D) | All rights reserved</p>
      </footer>
    
</body>
</html>