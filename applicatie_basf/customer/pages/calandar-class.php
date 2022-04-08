<?php
session_start();

class Calandar extends Dhb
{
    // con var aanmaken
    public $connect;

    public function __construct()
    {
        $this->connect = new PDO('mysql:host=localhost;dbname=basfdb', 'root', '');
    }
    //Load function aanmaken
    public function Load()
    {
        $data = array();

        $query = "SELECT * FROM event WHERE userID = '$_SESSION[ingelogd_userID]' ORDER BY eventID";

        $statement = $this->connect()->prepare($query);

        $statement->execute();

        $result = $statement->fetchAll();

        foreach ($result as $row) {
            $data[] = array(
                'id'   => $row["eventID"],
                'title'   => $row["eventTitle"],
                'start'   => $row["eventStart"],
                'end'   => $row["eventEnd"]
            );
        }

        echo json_encode($data);
    }
    //Insert function aanmaken
    public function Insert()
    {
        if (isset($_POST["title"])) {
            $query = "
            INSERT INTO event 
            (userid, eventTitle, eventStart, eventEnd) 
            VALUES (:userid, :title, :start_event, :end_event)
            ";
            $statement = $this->connect()->prepare($query);
            $statement->execute(
                array(
                    ':userid' => $_SESSION['ingelogd_userID'],
                    ':title'  => $_POST['title'],
                    ':start_event' => $_POST['start'],
                    ':end_event' => $_POST['end']
                )
            );
        }
    }
    //Update function aanmaken
    public function Update()
    {
        if (isset($_POST["id"])) {
            $query = "
            UPDATE event 
            SET eventTitle=:title, eventStart=:start_event, eventEnd=:end_event 
            WHERE eventID=:id
            ";
            $statement = $this->connect()->prepare($query);
            $statement->execute(
                array(
                    ':title'  => $_POST['title'],
                    ':start_event' => $_POST['start'],
                    ':end_event' => $_POST['end'],
                    ':id'   => $_POST['id']
                )
            );
        }
    }
    //Delete function aanmaken
    public function Delete()
    {
        if (isset($_POST["id"])) {
            $query = "
            DELETE from event WHERE eventID=:id
            ";
            $statement = $this->connect()->prepare($query);
            $statement->execute(
                array(
                    ':id' => $_POST['id']
                )
            );
        }
    }
}
