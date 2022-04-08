<?php

session_start();

class Dashboard extends Dhb
{
    // Ongelezen meldingen function
    public function Aantal_taken()
    {
        
        // Databases ophalen
        $res = $this->connect()->query("SELECT COUNT(*) FROM event WHERE eventStart < NOW() AND eventEnd > NOW() AND userID = '$_SESSION[ingelogd_userID]'");
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
