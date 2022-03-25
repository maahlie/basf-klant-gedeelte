<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../connection/config.php";
include "../account/account.php";

session_start();
$_user = $_SESSION["_user"];

if (!empty($_POST)) {
    $_dateStart = $_POST['startDate']; 
    $_dateEnd = $_POST['endDate']; 
    
    foreach($_POST['bus'] as $bus) {
        $_data = array (
            array('userID', $_user->getTableID()),
            array('busID', intval($bus)),
            array('dateStart', $_dateStart),
            array('dateEnd', $_dateEnd)
        );
        
        $_user->registerData('orderbus', $_data);
    }
    header("Location: ../pages/material.php");
} 
?>