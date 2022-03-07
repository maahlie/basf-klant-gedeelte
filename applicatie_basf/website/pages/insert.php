<?php
session_start();
//insert.php

$connect = new PDO('mysql:host=localhost;dbname=basf_db', 'root', '');

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO events 
 (userid, title, start_event, end_event) 
 VALUES (:userid, :title, :start_event, :end_event)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':userid' => $_SESSION['ingelogd_userID'],
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end']
  )
 );
}


?>