<?php 
// Uitbreiding van de  userAccount klasse
class Student extends UserAccount{
    
    // --- Constructor ---
    public function __construct($_table_ID, $_user_Info, $db)
    {
        // Neem de constructor van UserAccount over
        parent::__construct($_table_ID, $_user_Info, $db);
        $this->role = "Student";
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
        <?php
        // Voeg secundaire navigatie toe
        $this->addNav();
    }
}


?>