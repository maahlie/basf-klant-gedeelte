<?php
    session_start();
    include "dbClass.php";
    $SqlCommands = new SqlCommands();
    $SqlCommands->connectDB();

    if (isset($_POST["submit"]))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
    }
    $sql = "SELECT * FROM employee WHERE emailWork = ?;";
    $stmt = $SqlCommands->pdo->prepare($sql);
    $params = [$email];
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $inputHached = hash('sha256', $password . $result['salt']);
    } else {
        $inputHached = false; 
    }

    if ($result && $inputHached == $result['password']) {
        switch ($result['clearanceLvl']) {
            case 1:
                $_SESSION['userData'] = $result; 
                header('Location: ' . '../employee/createUser.php');
                break;
            case 2:
                $_SESSION['userData'] = $result; 
                header('Location: ' . '../planner/createUser.php');
                break;
            case 3:
                $_SESSION['userData'] = $result; 
                header('Location: ' . '../customer/createUser.php');
                break;
            case 4:
                $_SESSION['userData'] = $result; 
                header('Location: ' . '../employee/createUser.php');
                break;
            default:
                # code...
                break;
        }
    } else {
        $_SESSION['error'] = "onjuist"; 
        header('Location: ' . '../index.php');
    }
?>