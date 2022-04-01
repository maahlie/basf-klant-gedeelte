<?php 
include "levels/customer.php";
include "levels/employee.php";
include "levels/planner.php";
include "levels/student.php";

class UserAccount{
    // --- Fields ---
    protected $_table_ID;
    protected $_database;

    protected $_firstname;
    protected $_lastname;
    protected $_email_Work;
    protected $_email_Private;
    protected $_phone;
    protected $_phone_Emerg;
    protected $_department;
    protected $_clearance;
    
    protected $_address;
    protected $_city;
    protected $_country;
    protected $_postal;
    
    protected $_role;

    // --- Constructor ---
    public function __construct($_table_ID, $_user_Info, $db)
    {
        // Sla de verkregen informatie op
        $this->_table_ID = $_table_ID;
        $this->_database = $db;

        $this->_firstname = $_user_Info['firstName'];
        $this->_lastname = $_user_Info['lastName'];
        $this->_email_Work = $_user_Info['emailWork'];
        $this->_email_Private = $_user_Info['emailPrivate'];       
        $this->_phone = $_user_Info['telNumMobile'];
        $this->_phone_Emerg = $_user_Info['telNumEmergency'];
        $this->_department = $_user_Info['departmentID'];
        $this->_clearance = $_user_Info['clearanceLvl'];
        
        $this->_address = $_user_Info['streetName']. " ". $_user_Info['houseNr'];
        $this->_city = $_user_Info['city'];
        $this->_country = $_user_Info['country'];
        $this->_postal = $_user_Info['postalCode'];
    }

    //----------------get functies-----------------
    // Geef de ID
    public function getTableID()
    {
        return $this->_table_ID;
    }
    
    // Geef de volledige naam
    public function getName()
    {
        $name = $this->_firstname. " ". $this->_lastname;
        return $name;
    }

    // Geef het emailadres
    public function getEmailWork()
    {
        return $this->_email_Work;
    }

    // Geef het emailadres
    public function getEmailPrivate()
    {
        return $this->_email_Private;
    }

    // Geef het telefoonnummer
    public function getPhone()
    {
        return $this->_phone;
    }
    
    // Geef het noodnummer
    public function getEmergency()
    {
        return $this->_phone_Emerg;
    }

    // Geef de afdelingsID
    public function getDepartment()
    {
        return $this->_department;
    }

    // Geef de clearanceID, planner/klant/werknemer/....
    // !-- niet gebruikt --
    public function getClearance()
    {
        return $this->_clearance;
    }

    // Geef het woonadres
    public function getAddress()
    {
        return $this->_address;
    }

    // Geef de stad
    public function getCity()
    {
        return $this->_city;
    }

    // Geef het land
    public function getCountry()
    {
        return $this->_country;
    }

    // Geef de postcode
    public function getPostal()
    {
        return $this->_postal;
    }

    // Geef de rol , planner/klant/werknemer/....
    // Deze is in feite identiek aan clearanceID
    public function getRole(){
        return $this->_role;
    }

    // Personaliseer en voeg navigatie toe
    public function getAccountControls(){
        ?>
            <li class="nav-item dropdown">
              <span class="text-white">
              <SCRIPT LANGUAGE="JavaScript">
                 currentTime=new Date();
                if(currentTime.getHours()<12)
                 document.write("Goedemorgen, ");
                else if(currentTime.getHours()<17)
                 document.write("Goedemiddag, ");
                else 
                 document.write("Goedenavond, ");
              </SCRIPT>
                <?php
                    echo $this->getName();
                ?>
                </span>
                
                <a
                class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                    pro-pic
                "
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                >
                <img
                    src="../../assets/images/users/1.jpg"
                    alt="user"
                    class="rounded-circle"
                    width="31"
                />
                </a>
                <ul
                class="dropdown-menu dropdown-menu-end user-dd animated"
                aria-labelledby="navbarDropdown"
                >

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="pages-user-profile.php"
                    ><i class="mdi mdi-face"></i> Account
                    </a
                >
                <div class="dropdown-divider"></div>
                    <form action='../login/logout.php' method='post'>
                    <button class="dropdown-item"
                        ><i class="fas fa-sign-out-alt"></i> Log uit
                    </button>
                    </form>

                <div class="dropdown-divider"></div>
                </ul>
            </li>
        <?php
    }

    // Toon navigatie
    public function getNav()
    {
        ?>
            <li class="sidebar-item">
                <a
                    class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="dashboard.php"
                    aria-expanded="false"
                    ><i class="mdi mdi-view-dashboard"></i
                    ><span class="hide-menu">Dashboard</span></a
                >
            </li>
        <?php
    }

    // Toon secundaire navigatie
    protected function addNav()
    {
        ?>
            <br>
            <li class="sidebar-item">
                <a href="pages-user-profile.php" class="sidebar-link"
                ><i class="mdi mdi-face"></i
                ><span class="hide-menu"> account </span></a>
            </li>
            <li class="sidebar-item">
                <a href="../login/logout.php" class="sidebar-link"
                ><i class="mdi mdi-code-less-than"></i
                ><span class="hide-menu"> Log uit </span></a>
            </li>
       <?php
    }

    public function showDept()
    {
        $list = $this->requestDataWhere("departmentID, departmentName", "department", "customerID", $this->getTableID());
        $row = $list->fetch_all();
        
        for($i=0; $i<$list->num_rows; $i++)
        {
          echo '<option value="' . $row[$i][0] . '">' . $row[$i][1] . '</option>';
        }
    }

    // public function showWork()
    // {
    //     $list = $this->requestData("workCompName", "workcomp");
    //     $row = $list->fetch_all();
        
    //     for($i=0; $i<$list->num_rows; $i++)
    //     {
    //       echo '<option value="' . $row[$i][0] . '">' . $row[$i][0] . '</option>';
    //     }
    // }

    //!---------------get functies----------------!

    //----------------set functies-----------------
    // Verander de naam en wijzig deze in de database
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
            array("firstName", $this->_firstname),
            array("lastName", $this->_lastname)          
        );
        $this->_database->updateData("employee", $_data, "userID", $this->_table_ID);
    }

    // Verander de email en wijzig deze in de database
    public function setEmail($_email)
    {
        $this->_email = $_email;

        // Maak een twee-dimensionele array van de gegevens
        $_data = array (
            array("email", $this->_email)          
        );

        $this->_database->updateData("employee", $_data, "userID", $this->_table_ID);
    }

    // Verander het telefoonnummer en wijzig deze in de database
    public function setPhone($_phone)
    {
        $this->_phone = $_phone;

        // Maak een twee-dimensionele array van de gegevens
        $_data = array (
            array("telNumMobile", $this->_phone)          
        );

        $this->_database->updateData("employee", $_data, "userID", $this->_table_ID);
    }

    // Verander het noodnummer en wijzig deze in de database
    public function setEmergency($_phone)
    {
        $this->_phone_Emerg = $_phone;

        // Maak een twee-dimensionele array van de gegevens
        $_data = array (
            array("telNumEmergency", $this->_phone)          
        );

        $this->_database->updateData("employee", $_data, "userID", $this->_table_ID);
    }
    
    // Verander het adres en wijzig deze in de database
    public function setAddress($_streetName, $_houseNr)
    {
        $this->_address = $_streetName. " ". $_houseNr ;

        // Maak een twee-dimensionele array van de gegevens
        $_data = array (
            array("streetName", $this->_firstname),
            array("Lastname", $this->_lastname)          
        );

        $this->_database->updateData("employee", $_data, "userID", $this->_table_ID);
    }

    // Verander de stad en wijzig deze in de database
    public function setCity($_city)
    {
        $this->_city = $_city;

        // Maak een twee-dimensionele array van de gegevens
        $_data = array (
            array("city", $this->_city)          
        );

        $this->_database->updateData("employee", $_data, "userID", $this->_table_ID);
    }

    // Verander het land en wijzig deze in de database
    public function setCountry($_country)
    {
        $this->_country = $_country;

        // Maak een twee-dimensionele array van de gegevens
        $_data = array (
            array("country", $this->_country)          
        );

        $this->_database->updateData("employee", $_data, "userID", $this->_table_ID);
    }

    // Verander de postcode en wijzig deze in de database
    public function setPostal($_postal)
    {
        $this->_postal = $_postal;

        // Maak een twee-dimensionele array van de gegevens
        $_data = array (
            array("postalCode", $this->_postal)          
        );

        $this->_database->updateData("employee", $_data, "userID", $this->_table_ID);
    }
    //!---------------set functies----------------!

    //---------------database functies----------------
    // Haal data op uit de database en geef deze
    public function requestData($_select, $_table)
    {
        $_result = $this->_database->getData($_select, $_table);
        return $_result;
    }

    // Haal data op uit de database op basis van 1 waarde en geef deze
    public function requestDataWhere($_select, $_table, $_where, $_value)
    {
        $_result = $this->_database->getDataWhere($_select, $_table, $_where, $_value);
        return $_result;
    }

    // Haal data op uit de database op basis van 2 waarden en geef deze
    public function requestDataAnd($_select, $_table, $_where1, $_value1, $_where2, $_value2)
    {
        $_result = $this->_database->getDataAnd($_select, $_table, $_where1, $_value1, $_where2, $_value2);
        return $_result;
    }

    // Sla data op, op basis van de gegeven informatie
    public function registerData($_table, $_array)
    {
        $this->_database->insertData($_table, $_array);
    }

    // Verwijder data uit de database op basis van 1 waarde 
    public function removeData($_table, $_where, $_value)
    {
        $this->_database->deleteData($_table, $_where, $_value);
    }

    // Verwijder data uit de database op basis van 2 waarden
    public function removeDataAnd($_table, $_where1, $_value1, $_where2, $_value2)
    {
        $this->_database->deleteDataAnd($_table, $_where1, $_value1, $_where2, $_value2);
    }
    //!---------------database functies----------------!
}

?>