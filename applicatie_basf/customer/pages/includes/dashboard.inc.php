<?php

class Dashboard extends Dhb
{
    // Ongelezen meldingen function
    public function Ongelezen_meldingen()
    {

        // Databases ophalen
        $res = $this->connect()->query('SELECT COUNT(*) FROM dailymessage WHERE active = 0');
        $num_rows = $res->fetchColumn();
        setcookie("aantal_nieuwe_meldingen", $num_rows, time() + 3600, "/");


        if ($_COOKIE['aantal_nieuwe_meldingen'] === $_COOKIE['aantal_oude_meldingen']) {
            return 0;
        } else {
            $ongelezen =  ($_COOKIE["aantal_nieuwe_meldingen"] - $_COOKIE["aantal_oude_meldingen"]);
            setcookie("aantal_oude_meldingen", $ongelezen , time() + 3600, "/");
            if($ongelezen < 0){
                return 0;
            }else{
                return $ongelezen;
            }
        }

    }
    // Aantal bussen function
    public function aantal_bussen(){
        $aantalBussen = 0;
        $bus = $this->connect()->query('SELECT busAmount FROM bus');
        while($row = $bus->fetch()){
            $aantalBussen += $row["busAmount"];
        }
        return $aantalBussen;
    }
}
