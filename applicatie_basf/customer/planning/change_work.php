<?php
include "../connection/config.php";
include "../account/account.php";

session_start();

// Haal de gebruiker op uit de sessie
$_user = $_SESSION["_user"];
$db = new DataBase();

$_id = $_REQUEST['id'];


$list = $_user->requestDataWhere("workCompID", "departmentworkcomp", "departmentID", $_id);
$row = $list->fetch_all();


$_options_str = "";

for($i=0; $i<$list->num_rows; $i++)
{
    $_list_worknames = $_user->requestDataWhere("workCompName", "workcomp", "workCompID", $row[$i][0]);
    $row2 = $_list_worknames->fetch_all();

    $_options_str .= '<option value="' . $row[$i][0] . '">' . $row2[0][0] . '</option>';
}

echo $_options_str;

?>