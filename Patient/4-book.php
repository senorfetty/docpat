<?php
require "2-lib-appo.php";
if (empty($_POST["date"]) ||
    empty($_POST["slot"]) ||
    empty($_POST["user"]) ||
    empty($_POST["specialty"])) 
{
    echo "<h1 style='color: red'>Please specify type of service!</h1>";
    header("Refresh: 1.5; url=book.php");        
}
else{
    $AppointmentFee = 2000;
    $Total =$AppointmentFee + (int) $_SESSION["ServiceFee"];
    echo $_APPO->save ($_POST["date"], $_POST["slot"], $_POST["user"], $_POST["specialty"], $_SESSION["Email"], $_SESSION["Patient"], $Total)
      ? "OK" : $_APPO->error;
    header("location:book.php");
}