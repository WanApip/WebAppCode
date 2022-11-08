<!DOCTYPE html>
<html>
<head>
	<title>Pak Mat Western</title>
</head>
<body>

<?php include("header.php");?>

<form action="recordfound_customer.php" method="post">
	<h1>Search record customer</h1>.
	<p><label class="label" for="ic">Number IC:</label>
	<input id="ic" type="text" name="ic" size="30" maxlength="30" value="<?php if(isset($_POST['ic']))echo $_POST['ic'];?>"/></p>


	<p><input id="submit" type="submit" name="submit" value="search" /></p>
</form>

</body>
</html>