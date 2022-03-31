<?php

class Dashboard extends Dhb
{

    public function Ongelezen_meldingen()
    {

        //cookies aanmaken
        if (!isset($_COOKIE["aantal_oude_meldingen"])) {
            setcookie("aantal_oude_meldingen", 0);
        }

        // Databases ophalen
        $res = $this->connect()->query('SELECT COUNT(*) FROM dailymessage WHERE active = 0');
        $num_rows = $res->fetchColumn();
        setcookie("aantal_nieuwe_meldingen", $num_rows);


        if ($_COOKIE["aantal_nieuwe_meldingen"] == $_COOKIE["aantal_oude_meldingen"]) {
            return 0;
        } else {
            setcookie("aantal_oude_meldingen", $_COOKIE["aantal_nieuwe_meldingen"]);
            $ongelezen =  ($_COOKIE["aantal_nieuwe_meldingen"] - $_COOKIE["aantal_oude_meldingen"]);
            if($ongelezen < 0){
                return 0;
            }else{
                return $ongelezen;
            }
        }

    }

    public function aantal_bussen(){
        $aantalBussen = 0;
        $bus = $this->connect()->query('SELECT busAmount FROM bus');
        while($row = $bus->fetch()){
            $aantalBussen += $row["busAmount"];
        }
        return $aantalBussen;
    }
}
