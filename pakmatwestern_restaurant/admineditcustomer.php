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
          

<h2 style="color: white" align="center"> EDIT A RECORD </h2>
<?php include ("headerpakmat.php");?>

<?php
         //look for a valid user id, either through GET or POST
         if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
            $id = $_GET['id'];
         } elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
            $id = $_POST['id'];
         } else {
            echo '<p style="color: white" align="center" class = "error"> This page has been accesses in error.</p>';
            exit();
         }

         if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $error = array();

            //look for firstname
            if(empty($_POST['customer_name'])) {
               $error[] = 'You forgot to enter the First Name.';
            } else {
               $n = mysqli_real_escape_string($connect, trim($_POST['customer_name']));
            }

            //look for lastname
            if(empty($_POST['ic'])) {
               $error[] = 'You forgot to enter the Ic';
            }  else {
               $l = mysqli_real_escape_string($connect, trim($_POST['ic'])) ;
            }

            //look for Insurance Number
            if (empty($_POST['phone_no'])) {
               $error [] = 'You forgot to enter the Phone Number.';
            }  else {
               $i = mysqli_real_escape_string($connect,trim($_POST['phone_no'])) ;
            }


            //look for Diagnose
            if (empty($_POST['customer_address'])) {
               $error [] = 'You forgot to enter the Address.';
            }  else {
               $d = mysqli_real_escape_string($connect,trim($_POST['customer_address'])) ;
            }


            //if no problem occured
            if(empty($error)) {

               $q = "SELECT customer_id FROM customer WHERE phone_no = '$i' AND customer_id != $id";

               $result = @mysqli_query($connect,$q);

               if(mysqli_num_rows($result) == 0) {
                  $q = "UPDATE customer SET customer_name = '$n', ic = '$l', phone_no = '$i', customer_address = '$d' WHERE customer_id = '$id' LIMIT 1";

                  $result = @mysqli_query($connect,$q);

                  if(mysqli_affected_rows($connect) == 1) {

                     echo '<h3 style="color: white" align="center" style="color:white" align="center"> The user has been edited</h3>';
                  } else {
                     echo '<p style="color: white" align="center" class ="error"> The user has no be edited due to the system error.We apologize for any inconvenience.</p>';
                     echo '<p>' .mysqli_error($connect). '<br> query : ' .$q. '</p>';     
                  }

               }  else {
                  echo '<p style="color: white" align="center" class = "error"> The ic no has already been registered</p>';
               }
            }  else {
               echo '<p style="color: white" align="center" class = "error"> The following error (s) occured : <br>';
               foreach ($error as $msg) 
               {
                  echo " -$msg<br> \n";   
               }
               echo '</p><p style="color: white" align="center"> Please try again.</p>';
            }
         }

         $q = "SELECT customer_name, ic, phone_no, customer_address FROM customer WHERE customer_id = $id";
         $result = @mysqli_query($connect,$q);

         if(mysqli_num_rows($result) == 1) {
            //get patient information
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            //create the form
            echo '<form action = "admineditcustomer.php" method = "post">
            <p style="color: white" align="center"><label class = "label" for = "customer_name"> Name : </label><br>
            <input id = "customer_name" type = "text" name = "customer_name" size = "30" maxlength = "30" value = "'.$row[0].'"></p><br>

            <p style="color: white" align="center"><label class = "label" for = "ic"> Ic No : </label><br>
            <input id = "ic" type = "text" name = "ic" size = "30" maxlength = "30" value = "'.$row[1].'"></p><br>

            <p style="color: white" align="center"><label class = "label" for = "phone_no"> Phone No :</label><br>
            <input id = "phone_no" type = "text" name = "phone_no" size = "30" maxlength = "30" value = "'.$row[2].'"></p><br>

            <p style="color: white" align="center"><label class = "label" for = "customer_address"> Address : </label><br>
            <input id = "customer_address" type = "text" name = "customer_address" size = "30" maxlength = "30" value = "'.$row[3].'"></p><br>


            <br><p align="center"><input id = "submit" type = "submit" name = "submit" value = "   Edit   "></p>

            <br><input type = "hidden" name = "id" value = "'.$id.'"/>
            
            </form>';


         } else {
            echo '<p class = "error"> This page has been accessed in error.</p>';
         }

         mysqli_close($connect);

         ?>


    </div>

    <footer class="footer">
        <p>© 2022 PAK MAT WESTERN SDN. BHD. SSM : (1265085-D) | All rights reserved</p>
      </footer>
    
</body>
</html>