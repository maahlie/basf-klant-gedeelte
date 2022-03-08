<?php
session_start();

class Calandar
{
    // con var aanmaken
    public $connect;

    public function __construct()
    {
        $this->connect = new PDO('mysql:host=localhost;dbname=basf_db', 'root', '');
    }
    //Load function aanmaken
    public function Load()
    {
        $data = array();

        $query = "SELECT * FROM events WHERE userid = '$_SESSION[ingelogd_userID]' ORDER BY id";

        $statement = $this->connect->prepare($query);

        $statement->execute();

        $result = $statement->fetchAll();

        foreach ($result as $row) {
            $data[] = array(
                'id'   => $row["id"],
                'title'   => $row["title"],
                'start'   => $row["start_event"],
                'end'   => $row["end_event"]
            );
        }

        echo json_encode($data);
    }
    //Insert function aanmaken
    public function Insert()
    {
        if (isset($_POST["title"])) {
            $query = "
            INSERT INTO events 
            (userid, title, start_event, end_event) 
            VALUES (:userid, :title, :start_event, :end_event)
            ";
            $statement = $this->connect->prepare($query);
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
            UPDATE events 
            SET title=:title, start_event=:start_event, end_event=:end_event 
            WHERE id=:id
            ";
            $statement = $this->connect->prepare($query);
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
            DELETE from events WHERE id=:id
            ";
            $statement = $this->connect->prepare($query);
            $statement->execute(
                array(
                    ':id' => $_POST['id']
                )
            );
        }
    }
}
