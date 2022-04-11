<?php
include "../connection/config.php";
include "../account/account.php";

session_start();

$_user = $_SESSION["_user"]; // Haal de gebruiker op

$_dates[] = array();

$_output =''; //maak de string aan waarin de hele planning tabel komt te staan

$_now = date("Y-m-d"); // haal de huidige datum op

if(!isset($_SESSION['_planning_Week'])){ //als er nog geen sessie met week en jaar is, maak ze gebasseerd op huidige datum
  $_week_Nr = date("W", strtotime($_now));

  $_year = date("Y", strtotime($_now));
}else{                                //als die er wel is, gebruik die uit de sessie
  $_week_Nr = $_SESSION['_planning_Week'];
  $_year = $_SESSION['_planning_Year'];
}

$_date_Time = new DateTime();
// Voor iedere loop
for ($i=0; $i < 7; $i++) 
{ 
  // Haal de eerste dag op basis van het jaartal en weeknr en sla deze op als dd-mm
  $_days[0] = $_date_Time->setISODate($_year, $_week_Nr)->format('d-m');
  // Bij iedere loop behalve de eerste
  if ($i > 0) 
  {
    // Tel i dagen erbij op en sla deze op als dd-mm
    $_days[$i] = $_date_Time->modify('+'. $i. ' days')->format('d-m');
  }
}

// Voor iedere loop
for ($i=0; $i < 7; $i++) 
{ 
  // Ontleed de datums in dag en maand en stop deze in een array
  $_date_Array = explode("-", $_days[$i]);
  $_d = "";
  $_m = "";
  // Voor ieder deel
  for($_i = 0; $_i < count($_date_Array); $_i++){
      if($_i == 1)
      {
        // Sla op als maand
        $_m = $_date_Array[$_i];
      }else
      {
        // Sla op als dag
        $_d = $_date_Array[$_i];
      }
  }
  // Verwerk de gegevens in een string van de datum als yyyy-mm-dd
  $_date = $_year. "-". $_m. "-". $_d;
  // Sla deze op in de array op de index i
  $_dates[$i] = $_date;
}

$_days = array();

// Voor iedere loop
for ($i=0; $i < 7; $i++) 
{ 
  // Haal de eerste dag op basis van het jaartal en weeknr en sla deze op als dd-mm
  $_days[0] = $_date_Time->setISODate($_year, $_week_Nr)->format('d-m');
  // Bij iedere loop behalve de eerste
  if ($i > 0) 
  {
    // Tel i dagen erbij op en sla deze op als dd-mm
    $_days[$i] = $_date_Time->modify('+'. $i. ' days')->format('d-m');
  }
}

$_weekdays = array("Maandag", "Dinsdag", "Woensdag", "Donderdag","Vrijdag", "Zaterdag", "Zondag");

// Haal alle actieve werknemers op
$_list_Employees = $_user->requestData("*", "employee");
// Per rij
while ($_res = mysqli_fetch_array($_list_Employees)) 
{
  // Stop de werknemer in de array me de ID als index
  $_employees[$_res["userID"]] = array($_res["userID"], $_res["firstName"]. " ". $_res["lastName"], $_res["telNumMobile"], $_res["clearanceLvl"], $_res["birthDate"]);
}

// Haal de afdelingen op
$_list_Departments = $_user->requestData("*", "department");
// Per rij
while ($_res = mysqli_fetch_array($_list_Departments)) 
{
  // Stop de afdeling in de array met de ID als index
  $_departments[$_res["departmentID"]] = array($_res["departmentName"], $_res["departmentID"], $_res["customerID"]);
}

$_planned = $_user->requestDataBetween("*", "planning", "date", $_dates[0], $_dates[6]);

$_list_Planned = array();
while ($_plan = mysqli_fetch_array($_planned))
  {
    // Per rij, haal de planning op en stop deze in de array
    $_data = array($_plan["userID"], $_plan["departmentID"], $_plan["date"], $_plan["dayPart"]);
    array_push($_list_Planned, $_data);
  }

$_planner = $_user->requestDataAnd("*", "employee", "firstName", "Luc", "lastName", "Peters");
// Per rij
$_planner = mysqli_fetch_array($_planner); 

foreach ($_departments as $_department) {

    $_planned_emp = array();
    $_ids = array();
    foreach ($_list_Planned as $_planning) {
        if ($_planning[1] == $_department[1]) {
            $_employee = array($_planning[0], $_planning[2], $_planning[3]);
            $_planned_emp[$_planning[0]][] = $_employee;
            $_ids[] = $_planning[0];
        }
    }

    $_ids = array_unique($_ids);
    
    if (!empty($_ids)) {
        $_output.= '<span id="dept">'. $_department[0].
                '</span><br>
                <table class="table table-bordered">
                    <tr>
                    <th>'. $_employees[$_department[2]][1]. '<br>'. $_employees[$_department[2]][2]. '</th>
                    ';

                    for ($i=0; $i < 7; $i++) { 
                        $_output.= '<th>'. $_weekdays[$i]. '<br>'. $_days[$i]. '</th>';
                    }
                    $_output.='</tr>';

                    
                    foreach ($_ids as $_id) {
                        $_index = $_planned_emp[$_id][0][0];
                        $_output.= '<tr><td></td>'; 
                        for ($j=0; $j < count($_dates); $j++) { 
                            $_check = false;
                            foreach ($_planned_emp[$_id] as $_planning) {
                                if($_planning[1] == $_dates[$j])
                                {
                                    if ($_employees[$_index][3] == 4) 
                                    {
                                        $_output.='<td style="background-color: #ffe6ff;">'. $_employees[$_index][1];

                                        $_age = floor((time() - strtotime($_employees[$_index][4])) / 31556926);
                                        if ((floor((time() - strtotime($_employees[$_index][4])) / 31556926)) < 18) {
                                            $_output.='<span>*</span>';
                                        }

                                        if ($_planning[2] == 'm') {
                                            $_output.='<span class="dayPart"> M</span>';
                                        }
                                        elseif ($_planning[2] == 'o') {
                                            $_output.='<span class="dayPart"> O</span>';
                                        }

                                        $_output.='</td>';   
                                    }
                                    else
                                    {
                                        $_output.='<td>'. $_employees[$_index][1];

                                        if ($_planning[2] == 'm') {
                                            $_output.='<span class="dayPart"> M</span>';
                                        }
                                        elseif ($_planning[2] == 'o') {
                                            $_output.='<span class="dayPart"> O</span>';
                                        }
                                        
                                        $_output.='</td>'; 
                                    }
                                    
                                    
                                    $_check = true;        
                                }
                            }
                            if (!$_check) {
                                $_output.='<td></td>';
                            }
                        }
                        $_output.= '</tr>';
                    }                 
                $_output.='</table>
                <br>';
    }
}

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
    />
    <meta
      name="description"
    />
    <meta name="robots" content="noindex,nofollow" />
    <!-- Favicon icon -->
    
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../../assets/images/favicon.png"
    />
    <!-- Custom CSS -->
    <link
    rel="stylesheet"
    type="text/css"
    href="../../assets/extra-libs/multicheck/multicheck.css"
  />
  <link
    href="../../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css"
    rel="stylesheet"
  />

    <link href="../../assets/libs/flot/css/float-chart.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet" />

    <!--styles voor de planning tabel-->
    <style>
    table {
        width: 100%;
    }

    #dept {
      font-size: large;
      font-weight: bold;
    }

    td {
      font-size: 15px;
    }

    table td, table th, .table-bordered td, .table-bordered th {
        border-collapse:collapse;
        border-width: 1px;
        width: 12.5%;
    }
    
    .table-bordered thead {
        background-color: #2255A4;
        color: white;
    }
    
    .table-bordered th {
        font-weight: bold;
        font-size: 16px;
        background-color: orange;
    }
    
    .table-bordered tr:nth-child(odd) {
        background: rgba(0, 0, 0, 0.05);
    }
    
    .table-bordered tr:nth-child(even) {
        background: white;
    }

    .head {
        background-color: orange;
        width: 100%;
        text-align: center;
    }

    h2 {
        color: red;    
        text-align: center;
    }  

    .dayPart {
        color: orange;
        font-size: 15px;
    }
    </style>

  </head>

  <body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin5">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="dashboard.php">
              <!--End Logo icon -->
              <!-- Logo text -->
              <span class="logo-text ms-2">
                <!-- dark Logo text -->
                <img
                  src="../../assets/images/logo-text.png"
                  alt="homepage"
                  class="light-logo"
                />
              </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <a
              class="nav-toggler waves-effect waves-light d-block d-md-none"
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
            ></a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
          >
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-start me-auto">
              <li class="nav-item d-none d-lg-block">
                <a
                  class="nav-link sidebartoggler waves-effect waves-light"
                  href="javascript:void(0)"
                  data-sidebartype="mini-sidebar"
                  ><i class="mdi mdi-menu font-24"></i
                ></a>
              </li>              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <i class="mdi mdi-bell font-24"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </li>
                </ul>
              </li>
   
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">

              <!-- ============================================================== -->
              <!-- User profile and search -->
              <!-- ============================================================== -->
              <?php
                $_user->getAccountControls();
              ?>
              <!-- ============================================================== -->
              <!-- User profile and search -->
              <!-- ============================================================== -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- ============================================================== -->
      <!-- End Topbar header -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
          <ul id="sidebarnav" class="pt-4">
              <?php 
                $_user->getNav();
              ?>
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center"> <!--toon huidig jaar-->
              <h4 class="page-title">Planner <script> new Date().getFullYear()>2017&&document.write(" - "+new Date().getFullYear()); </script></h4> 
            </div>
          </div>
        </div>
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
         <div class="col-12">
        <div class="card">           
       <div class="card-body">                 
     <div class="table-responsive">                  
   <div class="container">
   <form action="../planning/planning.php" method="post"> <!-- Sla geselecteerde werkzaamheden op -->
                <label style="margin:8px; font-size:larger" for="week">Voor de week:</label>
                    <select id='week' name='week' style="width: 5%; margin:8px;" class='form-control input-group'>;
                        <?php

                            $_num_weeks = date('W', strtotime('December 28th'));  //haal de week waarin 28 dec valt op, die valt altijd in de laatste week
                            $_num_weeks++;
                            for($i=1; $i<$_num_weeks; $i++) //laat voor elke week een optie zien in de dropdown
                            {
                              if($i==$_week_Nr){  //check of het week nummer al geselecteerd is
                                echo '<option selected value="' . $i . '">' . $i . '</option>';
                              }else{
                                echo '<option value="' . $i . '">' . $i . '</option>';
                              }
                            }

                        ?>
                    </select>
                    <button type="submit" class="btn btn-info" style="margin:8px;" name="_select_week">Toon planning</button>
    </form>
   <div class="row">
    <div class="col-12"><br>
      <?php echo $_output; //toon de gemaakte tabel ?>
       </div>
      </div>
    <br><br>

      </div>
     </div>
    </div>
   </div>
  </div>
 </div>

        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
          Project BASF 
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="../../assets/libs/flot/excanvas.js"></script>
    <script src="../../assets/libs/flot/jquery.flot.js"></script>
    <script src="../../assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="../../assets/libs/flot/jquery.flot.time.js"></script>
    <script src="../../assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="../../assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="../../assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="../../dist/js/pages/chart/chart-page-init.js"></script>

    <!-- this page js -->
    <script src="../../assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="../../assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="../../assets/extra-libs/DataTables/datatables.min.js"></script>

    <script>
      /****************************************
       *       Basic Table                   *
       ****************************************/
      $("#zero_config").DataTable(
        {
         "language": {
          "zeroRecords": "Geen gevonden archieven",
          "lengthMenu": "Getoonde _MENU_ archieven",
          "info": "Getoond _START_ tot _END_ van _TOTAL_ archieven",
          "search": "Zoek:",
          "paginate": {
            "next": "Volgende",
            "previous": "Vorige"
            }
          }
        } 
      );
    </script>
  </body>
</html>