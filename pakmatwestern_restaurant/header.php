<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pak Mat Western Restaurant</title>
</head>

<body>

<?php
	$connect = mysqli_connect ("localhost","root","","pakmatwestern_restaurant");

	if (!$connect){
		die('error:' .mysqli_connect_error());
	}

?>
</body>
</html>