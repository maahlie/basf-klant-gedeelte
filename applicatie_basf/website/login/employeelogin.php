<?php 

include "../connection/config.php";
include "../account/account.php";

session_start();

// Maak de database klasse aan
$database = new DataBase();

// Controleer op een buttonpress
if(isset($_POST['_Employee_Loginform_Submit']))
{
    // Haal de waarden op uit de tekstvelden
    $_employee_Email = $_POST['Login_Employee_Email'];
    $_employee_Password = $_POST['Login_Employeepassword'];

    // Haal gegevens op uit de database op basis van de hierboven verkregen waarden
    $_result = $database->getDataAnd("*", "employee", "email", $_employee_Email, "password", $_employee_Password);

    // Controleer of de gebruiker in de database bestaat
    if ($_result->num_rows > 0)
    {
        // Zoja, haal de gegevens op
		$_row = mysqli_fetch_assoc($_result);

        // Maak een gebruiker aan met de juiste rol m.b.v. de gegevens
        switch ($_row["clearanceLvl"]) {
            case '1':
                $_user = new Employee($_row["userID"], $_row, $database);
                break;
            case '2':
                $_user = new Planner($_row["userID"], $_row, $database);
                break;
            case '3':
                $_user = new Customer($_row["userID"], $_row, $database);
                break;
            case '4':
                $_user = new Student($_row["userID"], $_row, $database);
                break;
            default:
                # code...
                break;
        }
        // Sla de gebruiker op in een sessie
        $_SESSION['_user'] = $_user;

        // Sla de user_id op in een sessie
        $_SESSION['ingelogd_userID'] = $_row["userID"];
        
        // Verwijs de gebruiker door naar de dashboard
        header("Location: ../pages/dashboard.php");
    }
    else
    {
        // Zoniet, maak een error sessie aan
        $_SESSION['_employeelogin_Wronginfo'] = "";
        // Verwijs de gebruiker door naar het login scherm
        header("Location: ../employeeindex.php");
    }

}