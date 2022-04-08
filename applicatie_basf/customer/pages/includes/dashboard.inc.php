<?php

session_start();

class Dashboard extends Dhb
{
    // Ongelezen meldingen function
    public function Aantal_taken()
    {
        // var aanmaken
        $date = date("Y-m-d" , strtotime("+1 day"));
        // Databases ophalen
        $res = $this->connect()->query("SELECT COUNT(*) FROM event WHERE userID = '$_SESSION[ingelogd_userID]' AND eventEnd = '$date'");
        $num_rows = $res->fetchColumn();
        return $num_rows;

    }
    // Aantal bussen function
    public function Aantal_bussen()
    {
        $aantalBussen = 0;
        $bus = $this->connect()->query('SELECT busAmount FROM bus');
        while ($row = $bus->fetch()) {
            $aantalBussen += $row["busAmount"];
        }
        return $aantalBussen;
    }
}
