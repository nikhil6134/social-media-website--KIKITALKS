<?php

ob_start();
$timezone = date_default_timezone_set("Asia/Kolkata");

session_start();
$con = mysqli_connect("localhost","root","","holo");
if(mysqli_connect_errno())

{
	echo "failed to connect:" . mysqli_connect_errno();

}

?>