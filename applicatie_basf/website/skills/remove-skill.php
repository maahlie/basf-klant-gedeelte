<?php
include "../connection/config.php";
include "../account/account.php";

session_start();

// Haal de gebruiker op uit de sessie
$_user = $_SESSION["_user"];

// Controleer op een buttonpress
if(isset($_POST['_delete_Work_Comp']))
{
    // Haal de waarde uit de button
    $_work_Comp_ID = $_POST['_delete_Work_Comp'];

    // Haal de gegevens op die gekoppeld zijn aan de competentie
    $_result = $_user->requestDataWhere("*", "orderworkcomp", "workCompID", $_work_Comp_ID);
    // Voor iedere koppeling
    while ($_res = mysqli_fetch_array($_result))
    {
        // Verwijder de koppeling uit de database
        $_user->removeData("orderworkcomp", "workCompID", $_work_Comp_ID);    
    }
    
    // Verwijder de competentie uit de database
    $_user->removeData("workcomp", "workCompID", $_work_Comp_ID);
}

// Controleer op een buttonpress
if (isset($_POST['_delete_Comp'])) {
    // Haal de waarde uit de button
    $_comp_ID = $_POST['_delete_Comp'];

    // Haal de gegevens op die gekoppeld zijn aan de competentie
    $_result = $_user->requestDataWhere("*", "ordercomp", "compID", $_comp_ID);
    // Voor iedere koppeling
    while ($_res = mysqli_fetch_array($_result))
    {
        // Verwijder de koppeling uit de database
        $_user->removeData("ordercomp", "compID", $_comp_ID);    
    }

    // Verwijder de competentie uit de database
    $_user->removeData("comp", "compID", $_comp_ID);
}
// Verwijs de gebruiker naar het competentie overzicht
header("Location: ../pages/pages-skills-overview.php");
?>