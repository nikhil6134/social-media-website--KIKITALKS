
<?php

$fname="";
$lname="";
$em="";
$em2="";
$password="";
$password2="";
$date ="";
$error_array= array();
if(isset($_POST['register_button'])){
	$fname = strip_tags($_POST['reg_fname']); //remove html tags
	$fname= str_replace(' ', '',$fname); //remove spaces
    $fname= ucfirst(strtolower($fname));//uppercase first letter
    $_SESSION['reg_fname'] = $fname;
    
    $lname = strip_tags($_POST['reg_lname']); //remove html tags
	$lname= str_replace(' ', '',$lname); //remove spaces
	$lname= ucfirst(strtolower($lname));//uppercase first letter
    $_SESSION['reg_lname']= $lname;

    $em = strip_tags($_POST['reg_email']); //remove html tags
	$em= str_replace(' ', '',$em); //remove spaces
	$em= ucfirst(strtolower($em));//uppercase first letter
    $_SESSION['reg_email']= $em;

    $em2 = strip_tags($_POST['reg_email2']); //remove html tags
	$em2= str_replace(' ', '',$em2); //remove spaces
	$em2= ucfirst(strtolower($em2));//uppercase first letter
    $_SESSION['reg_email2']= $em2;


	$password = strip_tags($_POST['reg_password']); //remove html tags
	$password2= strip_tags($_POST['reg_password2']);

	$date = date("Y-m-d");


	if($em==$em2)
	{

     if(filter_var ($em,FILTER_VALIDATE_EMAIL))

     {
$em= filter_var($em, FILTER_VALIDATE_EMAIL);

$e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");

$num_rows= mysqli_num_rows($e_check);

if($num_rows>0){

	array_push($error_array,"Email already in use<br>");
}

    



     }

     else
     {
     	array_push($error_array,  "invalid format<br>");
     }


}

else
	{
		array_push($error_array ,"email doesnt match<br>");
	}

if(strlen($fname) > 25 || strlen($fname)<2)
{
	array_push($error_array, "your first name must be between 2 and 25 characters<br>");
}

if(strlen($lname) > 25 || strlen($lname)<2)
{
	 array_push($error_array, "your lastname must be between 2 and 25 characters<br>");
}

if($password!= $password2)
{
	array_push($error_array, "your password do not match<br>");
}

else
{
	if(preg_match('/[^A-Za-z0-9]/', $password)){

      array_push($error_array ,"your password can only contain english characters and alphabets only<br>");

      } 
}

if(strlen($password)>30 || strlen($password)<5)
{
	 array_push($error_array,"your password must be between 5 to 30 characters<br>");
}

if (empty($error_array)) {
$password = md5($password); //encrypt password before sending to database

//genertate username by concanating first and last name 
$username =  strtolower($fname."_".$lname);
$check_username_query = mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
$i=0;

while (mysqli_num_rows($check_username_query)!=0) {

	$i++;
	$username=$username."_".$i;
	$check_username_query = mysqli_query($con , "SELECT username FROM users WHERE username='$username'");
   }
	



//profile picture is assigned to the user
   
$rand = rand(1,2);
   
if($rand==1)
   $profile_pic = "assests/images/profile_pic/default_profilepic/a.jpg";
elseif ($rand==2) 
	$profile_pic = "assests/images/profile_pic/default_profilepic/b.jpg";
	

$query = mysqli_query($con , "INSERT INTO users VALUES ('','$fname','$lname','$username','$em','$password','$date','$profile_pic','0','0','no',',')");
array_push($error_array, "<span style ='color:#14C800;'> you are all set !! gohead and login </span> <br>");

//clear the session variables
$_SESSION['reg_fname']="";
$_SESSION['reg_lname']="";
$_SESSION['reg_email']="";
$_SESSION['reg_email2']="";

}


}

?>
