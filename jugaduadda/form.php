<?php
//connecting to the database
define('DB_HOST', 'localhost');
define('DB_NAME', 'id3031606_company');
define('DB_USER','id3031606_root');
define('DB_PASSWORD','root123');

$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());

$db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());
//inserting Record to the database
$fullname= $_POST['fullname'];
$email = $_POST['email'];
$usrtel = $_POST['usrtel'];
$message = $_POST['message'];

$query = "INSERT INTO details(Name,Email,Contact,Message)VALUES('$fullname','$email','$usrtel','$message')";
$result = mysqli_query($con,$query);

if($result)
	{

	    
	    include 'index.html';
	 }
	else
	{
	 die('Error: '.mysqli_error($con));
	}
   	mysqli_close($con);
?>