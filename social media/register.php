
<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';




?>







<!DOCTYPE html>
<html>
<head>
	<title>Welcome to KiKiTalks</title>
<link rel="stylesheet" type="text/css" href="assests/css/register_style.css">
<script src="jquery-1.10.2.min.js"></script>
   <script src="JQUERYMain.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>
<body>
   
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="k.png" >

  </a>
</nav>












<div id="box">
            <div id="main"></div>

     <div id="loginform">        
      <h1>SIGN IN</h1>

    <form action="register.php" method="POST">
                        <input type="email" name="log_email" placeholder="Email Address" value="<?php
                        if (isset($_SESSION['log_email'])) {
                            echo $_SESSION['log_email'];
                        }
                        ?>" required>
                        <br>
                        <input type="password" name="log_password" placeholder="Password" required>
                        <br>
                        <?php
                        if (in_array("Email or password was incorrect<br>", $error_array)) {
                            echo "Email or password was incorrect<br>";
                        }
                        ?>
                        <br>
                        <input type="submit" name="login_button" value="Login" style="background-color: #11BABA; color: white; border-radius: 5px;" >
                        <br>
                      
                    </form>
</div>


  <div id="signupform">
<h1>SIGN UP</h1>
<form action="register.php" method="POST">


	<input type="text" name="reg_fname" placeholder="first Name" value="<?php if (isset($_SESSION['reg_fname'])) {

      echo $_SESSION['reg_fname'];
	}?>" required>
	<br>

	<?php
	if (in_array("your first name must be between 2 and 25 characters<br>", $error_array)) echo "your first name must be between 2 and 25 characters<br>";
	?>
	
	<input type="text" name="reg_lname" placeholder="Last Name" value="<?php if (isset($_SESSION['reg_lname'])) {

      echo $_SESSION['reg_lname'];
	}?>"required>
    <br>
<?php
	if (in_array("your lastname must be between 2 and 25 characters<br>", $error_array)) echo "your lastname must be between 2 and 25 characters<br>";
	?>




    <input type="email" name="reg_email" placeholder="Email" value="<?php if (isset($_SESSION['reg_email'])) {

      echo $_SESSION['reg_email'];
	}?>"required>
    <br>




    <input type="email" name="reg_email2" placeholder="Confirm email" value="<?php if (isset($_SESSION['reg_email2'])) {

      echo $_SESSION['reg_email2'];
	}?>"required>
   <br>
<?php
	if (in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>";
elseif (in_array("invalid format<br>", $error_array)) echo "invalid format<br>";
elseif (in_array("email doesnt match<br>", $error_array)) echo "email doesnt match<br>";
	?>

<br>


    <input type="password" name="reg_password" placeholder="password"value="<?php if (isset($_SESSION['reg_password'])) {

      echo $_SESSION['reg_password'];
	}?>" required>

	<br>




    <input type="password" name="reg_password2" placeholder="confirm password"value="<?php if (isset($_SESSION['reg_password2'])) {

      echo $_SESSION['reg_password2'];
	}?>" required>
	<br>
	
<?php
	if (in_array("your password must be between 5 to 30 characters<br>", $error_array)) echo " your password must be between 5 to 30 characters<br>";
	elseif (in_array("your password can only contain english characters and alphabets only<br>", $error_array)) echo "your password can only contain english characters and alphabets only<br>";
	elseif (in_array("your password do not match<br>", $error_array)) echo "your password do not match<br>";
	?>
<br>
	<input type="submit" name="register_button" value="Register" style="background-color: #11BABA; color: white; border-radius: 5px; ">
<br>
<?php
if (in_array("<span style ='color:#14C800;'> you are all set !! gohead and login </span> <br>", $error_array)) 

echo "<span style ='color:#14C800;'> you are all set !! gohead and login </span> <br>";
?>

</form>

</div>

   <div id="login_msg">Have an account?</div>
            <div id="signup_msg">Don't have an account?</div>
            
            <button id="login_btn">LOGIN</button>
            <button id="signup_btn">SIGN UP</button>
            
            
        </div>
	





</body>
</html>