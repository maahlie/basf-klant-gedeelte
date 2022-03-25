<?php 
// Uitbreiding van de  userAccount klasse
class Employee extends UserAccount{
    
    // --- Constructor ---
    public function __construct($_table_ID, $_user_Info, $db)
    {
        // Neem de constructor van UserAccount over
        parent::__construct($_table_ID, $_user_Info, $db);
        $this->role = "Werknemer";
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
                    class="sidebar-link has-arrow waves-effect waves-dark"
                    href="javascript:void(0)"
                    aria-expanded="false"
                    ><i class="mdi mdi-receipt"></i
                    ><span class="hide-menu">Formulieren </span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                   
                    <li class="sidebar-item">
                        <a href="pages-verlof.php" class="sidebar-link"
                            ><i class="mdi mdi-note-plus"></i
                            ><span class="hide-menu"> Vraag verlof aan </span></a
                        >
                    </li>
                </ul>
            </li>
        <?php
        // Voeg secundaire navigatie toe
        $this->addNav();
    }
    
}


?>