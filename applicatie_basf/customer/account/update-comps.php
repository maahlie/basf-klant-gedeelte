<?php 

include "../connection/config.php";
include "account.php";

session_start();

// Haal de gebruiker op uit de sessie
$_user = $_SESSION["_user"];
// Haal de id van de werknemer op uit de sessie
$_id = $_SESSION['_last_ID'];

// Controleer op een buttonpress
if(isset($_POST['_Submit_Comp']))
{
    // Maak een algemene lege array aan
    $_checked = array();

    // Controleer op aangevinkte checkboxes
    if (isset($_POST['Comp'])) {
        // Voor elke checkbox
        foreach ($_POST['Comp'] as $_checkbox) {
            // Maak een twee-dimensionele array van de gegevens
            $_data = array (
                array("userID", $_id),
                array("compID", $_checkbox)          
            );

            // Sla de gegevens op in een algemene array
            array_push($_checked, $_checkbox);

            // Haal data uit de database op basis van de userID, van de werknemer, en compID, van de checkbox  
            $_data_Request = $_user->requestDataAnd("*", "ordercomp", "userID", $_id, "compID", $_checkbox);
            // Controleer of de data al bestaat
            if ($_data_Request->num_rows == 0) {
                // Als de data nog niet bestaat, sla deze dan op in de database
                $_user->registerData("ordercomp", $_data);
            }
        }
    }

    // Haal data op uit de database
    $_result = $_user->requestData("*", "comp");
    // Maak een algemene lege array aan
    $_ids = array();

    // Voor iedere rij in de gegevens van de database
    while ($_res = mysqli_fetch_array($_result))
    {
        // Zet deze in de algemene array van competenties
        array_push($_ids, $_res["compID"]);
    }
    
    // Kijk naar het verschil tussen de 2 algemene arrays en sla deze op in een nieuwe array
    $_unchecked = array_diff($_ids, $_checked);

    // Voor elk verschil 
    foreach ($_unchecked as $_comp_ID) {
        // Verwijder deze uit de database
        $_user->removeDataAnd("ordercomp", "userID", $_id, "compID", $_comp_ID);
    }
}


// Verwijs naar het werknemer profiel
header("Location: ../pages/pages-employee-profile.php");
