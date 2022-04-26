<?php
include "../customer/account/account.php";
include "../customer/connection/config.php";


session_start();
$db = new DataBase();
$_user = new Customer($_SESSION['userData']['userID'], $_SESSION['userData'], $db);
$_SESSION['_user'] = $_user;
$_SESSION['ingelogd_userID'] = $_user->getTableID();


header('Location: ' . '../customer/pages/dashboard.php');
?>