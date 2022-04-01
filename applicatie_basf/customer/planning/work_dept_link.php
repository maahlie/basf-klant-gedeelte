<?php

include "../connection/config.php";
include "../account/account.php";

session_start();

$_user = $_SESSION["_user"];
$db = new DataBase();

// Controleer op een buttonpress
if(isset($_POST['_Submit_Work_Comp']))
{
    $_dept = $_POST['_dept'];
    // Maak een algemene lege array aan
    $_checked = array();

    // Controleer op aangevinkte checkboxes
    if (isset($_POST['workComp'])) {
        // Voor elke checkbox
        foreach ($_POST['workComp'] as $_checkbox) {
            // Maak een twee-dimensionele array van de gegevens
            $_data = array (
                array("departmentID", $_dept),
                array("workCompID", $_checkbox)
            );

            // Sla de gegevens op in een algemene array
            array_push($_checked, $_checkbox);

            // Haal data uit de database op basis van de userID, van de werknemer, en workCompID, van de checkbox  
            $_data_Request = $_user->requestDataAnd("*", "departmentworkcomp", "userID", $_user->getTableID(), "workCompID", $_checkbox);
            // Controleer of de data al bestaat
            if ($_data_Request->num_rows == 0) {
                // Als de data nog niet bestaat, sla deze dan op in de database
                $_user->registerData("departmentworkcomp", $_data);
            }
        }
    }

    // Haal data op uit de database
    $_result = $_user->requestData("*", "departmentworkcomp");
    // Maak een algemene lege array aan
    $_ids = array();

    // Voor iedere rij in de gegevens van de database
    while ($_res = mysqli_fetch_array($_result))
    {
        // Zet deze in de algemene array van competenties
        array_push($_ids, $_res["workCompID"]);
    }
    
    // Kijk naar het verschil tussen de 2 algemene arrays en sla deze op in een nieuwe array
    $_unchecked = array_diff($_ids, $_checked);

    // Voor elk verschil 
    foreach ($_unchecked as $_comp_ID) {
        // Verwijder deze uit de database
        $_user->removeDataAnd("departmentworkcomp", "departmentID", $_dept, "workCompID", $_comp_ID);
    }
}
header("Location: ../pages/pages-customer-compDeptLink.php");

?>