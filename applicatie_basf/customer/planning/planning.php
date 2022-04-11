<?php

include "../connection/config.php";
include "../account/account.php";

session_start();

// Haal de datum op
$_now = date("Y-m-d");

if(isset($_POST['_select_week']))  //als er een specifiek weeknummer is opgegeven gebruik die
{
  $_week_Nr = $_POST['week'];
  
    $_year = date("Y", strtotime($_now));   //haal het huidige jaar op

    // Sla deze op in een sessie
    $_SESSION["_planning_Week"] = $_week_Nr;
    $_SESSION["_planning_Year"] = $_year;
}

header("Location: ../pages/pages-calendar.php"); //redirect naar de planning
?>