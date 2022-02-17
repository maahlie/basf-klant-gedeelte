<?php
session_start();

// Controleer of er een gebruiker is inglogd
if(isset($_SESSION['_user']))
{
  // Zoja, Verwijs naar de dashboard
  header("Location: pages/dashboard.php");
}
else
{
  // Zoniet, Verwijs naar het loginscherm
  header("Location: employeeindex.php");
}