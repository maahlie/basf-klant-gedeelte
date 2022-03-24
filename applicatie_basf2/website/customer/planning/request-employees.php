<?php
include "../connection/config.php";
include "../account/account.php";

session_start();

// Haal de gebruiker op uit de sessie
$_user = $_SESSION["_user"];
$db = new DataBase();

if(isset($_POST['_submit_Request']))
{
    $_department = $_user->getDepartment();
    $_employees = $_POST['_task_Force'];
    $_date = strtotime($_POST['_task_Date']);
    $_date = date("Y-m-d", $_date);
    $_crop = $_POST['_task_crop'];
    $_work = $_POST['_task_work'];
    $_desc = $_POST['_task_Description'];


    $_data = array (
        array("reqStaff", $_employees),
        array("descr", $_desc),
        array("date", $_date),
        array("departmentID", $_department),
        array("crop", $_crop),
        array("workCompName", $_work)
    );

    // Sla de gegevens op in de database
    $_user->registerData("task", $_data);
}

if(isset($_POST['_confirm_change']))
{
    $_task_ID = $_POST['_confirm_change'];
    $_department = $_user->getDepartment();
    $_employees = $_POST['_force'];
    $_date = strtotime($_POST['_date']);
    $_date = date("Y-m-d", $_date);
    $_crop = $_POST['_crop'];
    $_work = $_POST['_work'];
    $_desc = $_POST['_desrciption'];

    $_data = array (
        array("reqStaff", $_employees),
        array("descr", $_desc),
        array("date", $_date),
        array("departmentID", $_department),
        array("crop", $_crop),
        array("workCompName", $_work)
    );

    $db->updateData('task', $_data, 'taskID', $_task_ID);

}

// Controleer op een buttonpress
if(isset($_POST['_submit_Task']))
{
    // Haal waarden uit de inputs
    $_employees = $_POST['_task_Force'];
    $_date = strtotime($_POST['_task_Date']);
    $_date = date("Y-m-d", $_date);
    $_crop = $_POST['_task_crop'];
    $_work = $_POST['_task_work'];
    $_desc = $_POST['_task_Description'];

    // Haal de afdeling op van de gebruiker
    $_department = $_user->getDepartment();

    // Maak een twee-dimensionele array van de gegevens
    $_data = array (
        array("reqStaff", $_employees),
        array("descr", $_description),
        array("date", $_date),
        array("departmentID", $_department),
        array("crop", $_crop),
        array("workCompName", $_work)
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