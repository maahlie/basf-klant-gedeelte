<?php
include "../connection/config.php";
include "../account/account.php";

session_start();

// Haal de gebruiker op uit de sessie
$_user = $_SESSION["_user"];

// Controleer op een buttonpress
if(isset($_POST['_submit_Task']))
{
    // Haal waarden uit de inputs
    $_employees = $_POST['_task_Force'];
    $_date = strtotime($_POST['_task_Date']);
    // Vervoeg de datum voor de database naar een 'yyyy-mm-dd' formaat
    $_date = date("Y-m-d", $_date);
    $_description = $_POST['_task_Description'];

    // Haal de afdeling op van de gebruiker
    $_department = $_user->getDepartment();

    // Maak een twee-dimensionele array van de gegevens
    $_data = array (
        array("reqStaff", $_employees),
        array("descr", $_description),
        array("date", $_date),
        array("departmentID", $_department)
    );

    // Sla de gegevens op in de database
    $_user->registerData("task", $_data);
}

// Controleer op een buttonpress
if (isset($_POST['_delete_Task'])) {
    // Haal de waarde op uit de button
    $_task_ID = $_POST['_delete_Task'];

    // Verwijder deze uit de database
    $_user->removeData("task", "taskID", $_task_ID);
}

// Verwijs de gebruiker door naar werknemers aanvragen
header("Location: ../pages/pages-customer-request.php");
?>