<?php
require 'config/config.php';
if(isset($_SESSION['username'])){
	$userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con , "SELECT * FROM users WHERE username = '$userLoggedIn'");
    $user =mysqli_fetch_array($user_details_query);
  }
else
{
	header("Location: register.php");
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Welcome to KiKiTalks</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="assests/js/bootstrap.js"></script>
	
<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
	<link rel="stylesheet" type="text/css" href="assests/css/bootstrap.css">

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
	
<body>

<div class="top_bar">
	<div class="logo">
	<a href="index.php">	<img src="logo.png"></a>
	</div>
	
<nav>

    <a href="<?php echo $userLoggedIn;?>"><?php echo $user['first_name']; ?></a>
	<a href=""><i class="fa fa-home" ></i></a>
	<a href=""><i class="fa fa-envelope"></i></a>
	<a href=""><i class="fa fa-bell-o"></i></a>
	<a href=""><i class="fa fa-users"></i></a>
    <a href=""><i class="fa fa-cog"></i></a>
    <a href="includes/handlers/logout.php"><i class="fa fa-sign-out"></i></a>

</nav>


</div>

<div class="wrapper">