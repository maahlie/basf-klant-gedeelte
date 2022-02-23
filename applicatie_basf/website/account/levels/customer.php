<?php 
// Uitbreiding van de  userAccount klasse
class Customer extends UserAccount{
    

    // --- Constructor ---
    public function __construct($_table_ID, $_user_Info, $db)
    {
        // Neem de constructor van UserAccount over
        parent::__construct($_table_ID, $_user_Info, $db);
        $this->role = "Klant";
    }

    // Toon navigatie
    public function getNav()
    {
        // Neem de navigatie van UserAccount over
        parent:: getNav();
        ?>

            <li class="sidebar-item">
                <a href="pages-calendar.php" class="sidebar-link"
                  ><i class="mdi mdi-calendar-check"></i
                  ><span class="hide-menu"> Planning </span></a
                >
            </li>
            <li class="sidebar-item">
                <a
                    class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="pages-customer-request.php"
                    aria-expanded="false"
                    ><i class="mdi mdi-account-multiple-plus"></i
                    ><span class="hide-menu">Werknemers aanvragen</span></a
                >
            </li>

        <?php

        // Voeg secundaire navigatie toe
        $this->addNav();
    }

    // Update naam !-- niet gebruikt --
    public function setName($_name)
    {
        // Deel de volledige naam op in voor- en achternaam
        $_nameArray = explode(" ", $_name);
        $_lastname = "";
        for($i = 0; $i < count($_nameArray); $i++){
            if($i == 1){
                $_lastname.=$_nameArray[$i];
            }elseif($i > 1){
                $_lastname.=" ". $_nameArray[$i];
            }else{
                $_firstname = $_nameArray[$i];
            }
        }

        $this->_firstname = $_firstname;
        $this->_lastname = $_lastname;

        // Maak een twee-dimensionele array van de gegevens
        $_data = array (
            array("klant_voornaam", $this->_firstname),
            array("klant_achternaam", $this->_lastname)          
        );
        // Update de gegevens in de database
        $this->_database->updateData("klant", $_data, "klant_id", $this->_table_ID);
    }

    // Update naam !-- niet gebruikt --
    public function setEmail($_email)
    {
        $this->_email = $_email;

        // Maak een twee-dimensionele array van de gegevens
        $_data = array (
            array("klant_email", $this->_email)          
        );
        // Update de gegevens in de database
        $this->_database->updateData("klant", $_data, "klant_id", $this->_table_ID);
    }

    // Update naam !-- niet gebruikt --
    public function setPhone($_phone)
    {
        $this->_phone = $_phone;

        // Maak een twee-dimensionele array van de gegevens
        $_data = array (
            array("klant_telefoon", $this->_phone)          
        );
        // Update de gegevens in de database
        $this->_database->updateData("klant", $_data, "klant_id", $this->_table_ID);
    }
    
}


?>