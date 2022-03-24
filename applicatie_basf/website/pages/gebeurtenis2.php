<?php
session_start(); 

$k = $_POST['id'];
$k = trim($k);

$_SESSION["news_aantal_keren"] = $k;

?>

<script>
    var iframe = document.getElementById("news"); //Get element by id
    iframe.src = iframe.src; // refresh iframe on button click
</script>