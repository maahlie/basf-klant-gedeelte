<?php 

include "../connection/config.php";
include "../account/account.php";

session_start();

// Maak de database klasse aan
$database = new DataBase();

// Controleer op een buttonpress
if(isset($_POST['_Customer_Loginform_Submit']))
{
    // Haal de waarden op uit de tekstvelden
    $_customer_Number = $_POST['Login_Customernumber'];
    $_customer_Password = $_POST['Login_Customerpassword'];
    
    // Haal gegevens op uit de database op basis van de hierboven verkregen waarden
    $_result = $database->getDataAnd("*", "klant", "klant_klantnummer", $_customer_Number, "klant_wachtwoord", $_customer_Password);
    
    // Controleer of de gebruiker in de database bestaat
    if ($_result->num_rows > 0) 
    {
        // Zoja, haal de gegevens op
		$_row = mysqli_fetch_assoc($_result);

        // Maak een gebruiker aan met de gegevens
        $_user = new Customer($_row["klant_voornaam"], $_row["klant_achternaam"], $_row["klant_email"], $_row["klant_klantnummer"], $_row["klant_id"], $_row["klant_telefoonnummer"], $database);

        // Sla de gebruiker op in een sessie
		$_SESSION['_user'] = $_user;
        // Verwijs de gebruiker door naar de dashboard
        header("Location: ../pages/dashboard.php");
    }
    else
    {
        // Zoniet, maak een error sessie aan
        $_SESSION['_customerlogin_Wronginfo'] = "";
        // Verwijs de gebruiker door naar het login scherm
        header("Location: ../customerindex.php");
    }

}