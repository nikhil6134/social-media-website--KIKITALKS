
<?php
$con = mysqli_connect("localhost","root","","holo");
if(mysqli_connect_errno())

{
	echo "failed to connect:" . mysqli_connect_errno();

}

$query = mysqli_query($con,"INSERT INTO test VALUES(NULL,'optimus prime')");


?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
hello this is nikhil!!!
</body>
</html>