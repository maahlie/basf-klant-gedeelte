<?php

session_start();
// Vernietig alle bestaande sessies
session_destroy();
// Verwijs de gebruiker naar de index
header("Location: ../index.php");