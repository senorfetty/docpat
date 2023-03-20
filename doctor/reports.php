<?php
session_start();
require '../db/dbconnect.php';
require 'fpdf/fpdf.php';
$pdf = new FPDF('p','mm','A4');
$pdf ->AddPage();
$pdf ->SetFont('Arial','b', 12);
$pdf ->Cell(30, 4, 'ViKWATANI HOSPITAL', 0, 0, 'c');
$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(40, 4, '', 0, 1, 'c');
$pdf ->SetFont('Arial','', 12);

$pdf ->SetFont('Arial','', 12);
$pdf ->Cell(40, 4,'', 0, 1, 'c');
$pdf ->SetFont('Arial','', 12);

$pdf ->SetFont('Arial','', 10);
$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(200, 4, 'Vikwatani Hospital', 0, 1, 'c');

$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(200, 4, 'P.O. Box, 80100-1234,', 0, 1, 'c');

$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(200, 4, 'Mombasa Kenya,', 0, 1, 'c');

$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(200, 4, '', 0, 1, 'c');
$pdf ->SetFont('Arial','', 10);

$pdf ->SetFont('Arial','', 10);
$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(200, 4, date("l Y/m/d"), 0, 1, 'c');
$pdf ->SetFont('Arial','', 10);

$pdf ->SetFont('Arial','', 10);
$pdf ->Cell(200, 4, 'Vikwatani Health Unit', 0, 1, 'c');
$pdf ->Cell(200, 4,"Doctor's Name: ".$_SESSION["Doctor"], 0, 1, 'c');
$pdf ->Cell(200, 4,"Doctor's Email: ".$_SESSION["DEmail"], 0, 1, 'c');
$pdf ->SetFont('Arial','', 10);

$pdf ->SetFont('Arial','', 12);
$pdf ->Cell(40, 4, '', 0, 1, 'c');
$pdf ->SetFont('Arial','', 12);

if (isset($_POST["Go"])) 
{
	if (empty($_POST['reports']) || empty($_POST['start']) || empty($_POST['end'])) 
	{
	    die('Please fill all required fields!');
	}
	else
	{
		$reports = $_POST['reports'];
		if ($reports =='appointments') 
		{
		 	$sql = "SELECT * FROM appointments WHERE taken_by ='Pending' AND  appo_date BETWEEN '".$_POST['start']."' AND '".$_POST['end']."'";
			$result = $conn->query($sql);
			if ($result->num_rows >= 0) 
			{
				$pdf ->SetFont('Arial','B', 10);
				$pdf ->Cell(200, 4,'ViKWATANI HOSPITAL/ BOOKED APPOINTMENT', 0, 1, 'c');
				$pdf ->Cell(30, 4, '', 0, 0, 'c');
				$pdf ->Cell(30, 4, '', 0, 0, 'c');
				$pdf ->Cell(200, 4, '', 0, 1, 'c');
				$pdf ->SetFont('Arial','', 10);

				$pdf ->SetFont('Arial','B', 10);
				$pdf ->Cell(30, 6, 'Patient\'s Name', 1, 0, 'c');
				$pdf ->Cell(30, 6, 'Patient\'s Email', 1, 0, 'c');
				$pdf ->Cell(40, 6, 'Date', 1, 0, 'c');
				$pdf ->Cell(40, 6, 'Time', 1, 1, 'c');
				$pdf ->SetFont('Arial','', 10);
				while($row = $result->fetch_assoc()) 
				{
					$pdf ->Cell(30, 6, $row["patient_name"], 1, 0, 'c');
					$pdf ->Cell(30, 6, $row["pEmail"], 1, 0, 'c');
					$pdf ->Cell(40, 6, $row["appo_date"], 1, 0, 'c');
					$pdf ->Cell(40, 6, $row["appo_slot"], 1, 1, 'c');   
				}
			}
		} 
		elseif ($reports =='served')
		{
		 	$sql = "SELECT * FROM served WHERE served_by ='".$_SESSION['DEmail']."' AND  appo_date BETWEEN '".$_POST['start']."' AND '".$_POST['end']."'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) 
			{
				$pdf ->SetFont('Arial','B', 10);
				$pdf ->Cell(200, 4,'ViKWATANI HOSPITAL/ MY APPOINTMENT HISTORY', 0, 1, 'c');
				$pdf ->Cell(30, 4, '', 0, 0, 'c');
				$pdf ->Cell(30, 4, '', 0, 0, 'c');
				$pdf ->Cell(200, 4, '', 0, 1, 'c');

				$pdf ->SetFont('Arial','', 10);
				$pdf ->SetFont('Arial','B', 10);
				$pdf ->Cell(30, 6, 'Patient\'s Name', 1, 0, 'c');
				$pdf ->Cell(30, 6, 'Patient\'s Email', 1, 0, 'c');
				$pdf ->Cell(40, 6, 'Date', 1, 0, 'c');
				$pdf ->Cell(40, 6, 'Time', 1, 1, 'c');
				$pdf ->SetFont('Arial','', 10);
				while($row = $result->fetch_assoc()) 
				{
					$pdf ->Cell(30, 6, $row["patient_name"], 1, 0, 'c');
					$pdf ->Cell(30, 6, $row["pEmail"], 1, 0, 'c');
					$pdf ->Cell(40, 6, $row["appo_date"], 1, 0, 'c');
					$pdf ->Cell(40, 6, $row["appo_slot"], 1, 1, 'c');   
				}
			}
		} 	 
	}
}



$pdf ->SetFont('Arial','', 10);
$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(40, 4, '', 0, 1, 'c');

$pdf ->SetFont('Arial','', 10);
$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(40, 4, 'Thank you,', 0, 1, 'c');

$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(40, 4, '', 0, 1, 'c');

$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(30, 4, '', 0, 0, 'c');
$pdf ->Cell(40, 4, 'Vikwatani Hospital', 0, 1, 'c');
$pdf ->SetFont('Arial','', 10);	
$pdf->Output();
?>