<?php
include "../connection/config.php";
include "account.php";

session_start();

// Haal de gebruiker op uit de sessie
$_user = $_SESSION["_user"];

// Controleer op een buttonpress
if(isset($_POST['_submit_Account']))
{
    // Haal de waarde op uit het tekstveld
    $_name = $_POST['_register_Name'];

    // Ontleed de naam tussen voor- en achternaam
    $_name_Array = explode(" ", $_name);
    $_firstname = "";
    $_lastname = "";
    for($_i = 0; $_i < count($_name_Array); $_i++){
        if($_i == 1)
        {
            $_lastname.=$_name_Array[$_i];
        }
        elseif($_i > 1)
        {
            $_lastname.=" ". $_name_Array[$_i];
        }else
        {
            $_firstname = $_name_Array[$_i];
        }
    }

    // Haal de waarde op uit het tekstveld
    $_address = $_POST['_register_Address'];

    // Ontleed het adres tussen straat en huisnummer
    $_address_Array = explode(" ", $_address);
    $_street = "";
    $_houseNr = "";
    for($_i = 0; $_i < count($_address_Array); $_i++){
        if($_i == 1)
        {
            $_houseNr.=$_address_Array[$_i];
        }
        else
        {
            $_street = $_address_Array[$_i];
        }
    }
    
    // Haal de waardes op uit de tekstvelden
    $_postal = $_POST['_register_Postal'];
    $_city = $_POST['_register_City'];
    $_phone = $_POST['_register_Phone'];
    $_emergency = $_POST['_register_Emergency'];
    $_email = $_POST['_register_Email'];
    $_pass1 = $_POST['_register_Password1'];
    $_pass2 = $_POST['_register_Password2'];
    $_lvl = $_POST['_register_Operatorlvl'];
    $_dep = $_POST['_register_Department'];
    $_function = (int)$_POST['_register_Function'];
    $_birth = strtotime($_POST['_register_Birth']);
    // Vervoeg de datum voor de database naar een 'yyyy-mm-dd' formaat
    $_birth = date("Y-m-d", $_birth);

    // Controleer of de ingevoerde wachtwoorden identiek zijn
    if ($_pass1 == $_pass2) 
    {
        // Zoja, controleer of de opgegeven email al bestaat in het systeem
        $_result = $_user->requestDataWhere('*', 'employee', 'email', $_email);
        if ($_result->num_rows < 1) 
        {
            // Maak een twee-dimensionele array van de gegevens
            $_data = array (
                array("firstName", $_firstname),
                array("lastName", $_lastname),
                array("email", $_email),
                array("birthDate", $_birth),
                array("telNumMobile", $_phone),
                array("telNumEmergency", $_emergency),
                array("password", $_pass1),
                array("salt", 0),
                array("clearanceLvl", $_function),
                array("active", 1),
                array("streetName", $_street),
                array("postalCode", $_postal),
                array("country", "Nederland"),
                array("houseNr", $_houseNr),
                array("city", $_city)
            );
            // Controleer of er een afdeling is aangegeven
            if ($_dep != "geen") {
                // Zoja, maak een array van de waaren en voeg deze toe aan de twee-dimensionele array
                $_dep_Array = array("departmentID", (int)$_dep);
                array_push($_data, $_dep_Array);
            }

            // Sla de gegevens op in de database
            $_user->registerData('employee', $_data);

            // Haal de aangemaakt werknemer op
            $_result = $_user->requestDataWhere('*', 'employee', 'email', $_email);
            $_res = mysqli_fetch_array($_result);
            
            // Controleer welk operator niveau de gebruiker heeft en pas de waarden aan
            switch ($_lvl) {
                case "Op":
                    $_i_Work_Max = 14;
                    $_i_Comp_Max = 8;
                    break;
                case "S-Op":
                    $_i_Work_Max = 17;
                    $_i_Comp_Max = 12;
                    break;
                case "P-Op":
                    $_i_Work_Max = 20;
                    $_i_Comp_Max = 14;
                    break;
                default:
                    $_i_Work_Max = 0;
                    $_i_Comp_Max = 0;
                    break;
            }

            // Ken werkzaamheden toe aan de werknemer op basis van de wwaarden
            for ($i=1; $i < $_i_Work_Max; $i++) { 
                // Maak een twee-dimensionele array van de gegevens
                $_data_Comp = array (
                    array("userID", $_res["userID"]),
                    array("workCompID", $i)
                );
                // Sla de gegevens op in de database
                $_user->registerData("orderworkcomp", $_data_Comp);
            }

            // Ken werkzaamheden toe aan de werknemer op basis van de wwaarden
            for ($i=1; $i < $_i_Comp_Max; $i++) { 
                // Maak een twee-dimensionele array van de gegevens
                $_data_Comp = array (
                    array("userID", $_res["userID"]),
                    array("CompID", $i)
                );
                // Sla de gegevens op in de database
                $_user->registerData("ordercomp", $_data_Comp);
            }
            // Verwijs naar het werknemer overzicht
            header("Location: ../pages/pages-employee-overview.php");
        }
        else {
            // Verwijs naar account aanmaken pagina
            // !--Email bestaal al--!
            header("Location: ../pages/pages-account-aanmaken.php");
        }
    }
    else {
        // Verwijs naar account aanmaken pagina
        // !--Wachtwoorden komen niet overeen--!
        header("Location: ../pages/pages-account-aanmaken.php");
    }
}
?>