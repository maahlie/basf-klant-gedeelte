<?php 
// Uitbreiding van de  userAccount klasse
class Planner extends UserAccount{
    

    // --- Constructor ---
    public function __construct($_table_ID, $_user_Info, $db)
    {
        // Neem de constructor van UserAccount over
        parent::__construct($_table_ID, $_user_Info, $db);
        $this->role = "Planner";
    }

    // Toon navigatie
    public function getNav()
    {
        // Neem de navigatie van UserAccount over
        parent:: getNav();
        ?>
            <li class="sidebar-item">
                <a
					class="sidebar-link waves-effect waves-dark sidebar-link"
					href="pages-planner.php"
					aria-expanded="false"
					><i class="mdi mdi-border-inside"></i
					><span class="hide-menu">Werk planner</span></a
                >
            </li>
            <li class="sidebar-item">
                <a
                    class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="pages-employee-overview.php"
                    aria-expanded="false"
                    ><i class="mdi mdi-account-multiple"></i
                    ><span class="hide-menu">Werknemer overzicht</span></a
                >
            </li>
            <li class="sidebar-item">
                <a
                    class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="pages-account-aanmaken.php"
                    aria-expanded="false"
                    ><i class="mdi mdi-account-multiple-plus"></i
                    ><span class="hide-menu">Account aanmaken</span></a
                >
            </li>
            <li class="sidebar-item">
                <a
                    class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="pages-skills-overview.php"
                    aria-expanded="false"
                    ><i class="mdi mdi-calendar-today"></i
                    ><span class="hide-menu">Competenties overzicht</span></a
                >

            </li>
            <li class="sidebar-item">
                <a
                    class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="pages-verlof-goedkeuren.php"
                    aria-expanded="false"
                    ><i class="mdi mdi-calendar-today"></i
                    ><span class="hide-menu">Aangevraagd verlof</span></a
                >
                
            </li>
        <?php
        // Voeg secundaire navigatie toe
        $this->addNav();
    }

    // Haal alle werknemers op uit de database
    public function getEmployees(){
        $_result = $this->_database->getData('*', 'employee');
        return $_result;
    }

    // Haal een werknemer op uit de database op basis van zijn/haar userID
    public function getEmployee($_id){
        $_result = $this->_database->getDataWhere('*', 'employee', 'userID', $_id);
        return $_result;
    }
}


?>