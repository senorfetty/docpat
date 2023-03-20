<?php
session_start();
require '../db/dbconnect.php';
$data = $_POST;
if (isset($_POST["signup"])) 
{
	if (empty($data['name']) ||
	    empty($data['email']) ||
	    empty($data['specialties']) ||
	    empty($data['password']) ||
	    empty($data['c_password'])) 
	{
	    echo "<h1 style='color: red'>Please fill in all the required fields!</h1>";
	  	header("Refresh: 2; url=register.php");
	}
	if ($data['password'] !== $data['c_password']) 
	{
	   
	   header("location:register.php");
	}

	$sql = "SELECT * FROM doctors WHERE d_email='".$data['email']."'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
	  	echo "<h1 style='color: red'>This User Exists!</h1>";
	  	header("Refresh: 2; url=register.php");
	}
	else
	{
		$DId = "Dr".mt_rand(111,999).'!'.mt_rand(111,999);
		$sql = "INSERT INTO doctors (d_id, d_name, d_email, d_specialties, d_password) VALUES 
		('".$DId."', '".$data['name']."', '".$data['email']."','".$data['specialties']."', '".$data['password']."')";
		if ($conn->query($sql) === TRUE) 
		{
			$sql = "SELECT * FROM doctors WHERE d_email='".$data['email']."'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) 
			{
			  	while($row = $result->fetch_assoc()) 
			  	{
			  		$_SESSION["DEmail"] = $row["d_email"];
			    	$_SESSION["Doctor"] = $row["d_name"];
			    	$_SESSION["Specialty"] = $row["d_specialties"];
			    	header("location:index.php");
			  	}
			}  	
		} 
		else 
		{
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	} 
}


//Log in...
$login = $_POST;
if (isset($_POST["login"])) 
{
	if (empty($login['lemail']) ||
	    empty($login['lpassword'])) 
	{
		echo "<h1 style='color: red'>Please fill in all the required fields!</h1>";
	  	header("Refresh: 2; url=login.php");
	}
	$sql = "SELECT * FROM doctors WHERE d_email='".$login['lemail']."' AND  d_password='".$login['lpassword']."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
	  	while($row = $result->fetch_assoc()) 
	  	{
	  		$_SESSION["DEmail"] = $row["d_email"];
	    	$_SESSION["Doctor"] = $row["d_name"];
	    	$_SESSION["Specialty"] = $row["d_specialties"];
	    	header("location:index.php");
	  	}
	}
	else 
	{
		echo "<h1 style='color: red'>Invalid Details!</h1>";
	  	header("Refresh: 2; url=login.php"); 
	}	
}
//Schedule Appointment...
$schedule = $_POST;
if (isset($_POST["schedule"])) 
{
	//Confirm that the appointment exists.
	$sql = "SELECT * FROM appointments WHERE appointment_id='".$_SESSION["appid"]."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		$row = $result->fetch_assoc();
		date_default_timezone_set("Africa/Nairobi");
		$BookingDateTime = date("Y-m-d")."T".date("h:i");
		$ScheduleID = mt_rand(1111,9999);

		$sql = "UPDATE appointments SET taken_by='".$_SESSION["DEmail"]."', status = 'Scheduled' WHERE appointment_id='".$row["appointment_id"]."'";
		if ($conn->query($sql) === TRUE) {
		  header("location:patients.php");
		} 
		else 
		{
		  echo "Error updating record: " . $conn->error;
		}
	}
	else
	{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

$served = $_POST;
if (isset($_POST["served"])) 
{
	//Confirm that the appointment exists.
	$sql = "SELECT * FROM appointments WHERE appointment_id='".$_SESSION["appid"]."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		$row = $result->fetch_assoc();
		$sql = "INSERT INTO served (appointment_id, specialty, patient_name, pEmail, appo_date, appo_slot, served_by) VALUES ('".$row['appointment_id']."', '".$row['specialty']."', '".$row['patient_name']."', '".$row['pEmail']."', '".$row['appo_date']."', '".$row['appo_slot']."', '".$row['taken_by']."')";

		if($conn->query($sql) === TRUE) 
		{
		  	$sql = "DELETE FROM appointments WHERE appointment_id='".$row["appointment_id"]."'";
			if($conn->query($sql) === TRUE) 
			{
				echo "<h1 style='color: green'>The Appointments has been marked as Served!</h1>";
			  	header("Refresh: 2; url=upcoming.php");
			} 
			else 
			{
			  	echo "Error deleting record: " . $conn->error;
			}
		} 
		else 
		{
		  	echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	else
	{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>