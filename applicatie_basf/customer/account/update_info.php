<?php
include "../connection/config.php";
include "account.php";

session_start();

// Haal de gebruiker op uit de sessie
$_user = $_SESSION["_user"];

if(isset($_POST['btn_edit'])){

    $_city = $_POST['_city']; 
    $_street_name = $_POST['_street']; 
    $_house_nr = $_POST['_house_nr']; 

    $_emailP = $_POST['_emailP']; 
    $_phone = $_POST['_phone'];
    $_emergency = $_POST['_emergency'];
    $_password = $_POST['_password'];

    if($_password!=""){
        $_salt = hash('sha256', mt_rand(1001, 99999));
        $_password_hashed = hash('sha256', $_password.$_salt);  
        $_user->setPassword($_password_hashed, $_salt);  
    }

    if($_city!=""){
        $_user->setCity($_city);
    }

    if($_street_name!=""&&$_house_nr!= ""){
        $_user->setStreet($_street_name, $_house_nr);
    }

    if($_emailP!=""){
        $_user->setEmailP($_emailP);
    }

    if($_phone!=""){
        $_user->setPhone($_phone);
    }

    if($_emergency!=""){
        $_user->setEmergency($_emergency);
    }

    
}

header("Location: ../pages/pages-user-profile.php");
?>