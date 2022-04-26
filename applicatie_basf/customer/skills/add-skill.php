<?php
include "../connection/config.php";
include "../account/account.php";

session_start();

// Haal de gebruiker op uit de sessie
$_user = $_SESSION["_user"];

// Controleer op een buttonpress
if(isset($_POST['_submit_Work_Comp']))
{
    // Haal de waarde uit het tekstveld
    $_work_Comp_Name = $_POST['_work_Comp_Name'];

    // Maak een twee-dimensionele array van de gegevens
    $_data = array (
        array("workCompName", $_work_Comp_Name)
    );

    // Sla de gegevens op in de database
    $_user->registerData("workcomp", $_data);
}

// Controleer op een buttonpress
if (isset($_POST['_submit_Comp'])) 
{
    // Haal de waarde uit het tekstveld
    $_comp_Name = $_POST['_comp_Name'];

    // Maak een twee-dimensionele array van de gegevens
    $_data = array (
        array("compName", $_comp_Name)
    );

    // Sla de gegevens op in de database
    $_user->registerData("comp", $_data);
}

// Verwijs de gebruiker naar het competentie overzicht
header("Location: ../pages/pages-skills-overview.php");
?>