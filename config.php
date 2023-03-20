<?php
session_start();
if (isset($_POST["doctor"])) 
{
	header("location:doctor/login.php");
}
else if (isset($_POST["patient"])) 
{
	header("location:Patient/login.php");
}
else if (isset($_POST["admin"])) 
{
	header("location:admin/login.php");
}
else 
{
  	die("Invalid Details!");
}




?>