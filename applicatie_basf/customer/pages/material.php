<?php
include "../connection/config.php";
include "../account/account.php";

session_start();

$_user = $_SESSION["_user"];

$_employees = array();
$_list_emp = $_user->requestData("*", "employee");
while($_res2 = mysqli_fetch_array($_list_emp)){
  $_employees[$_res2['userID']] = $_res2['firstName']." ".$_res2['lastName'];
}

$_now = date("Y-m-d");
$_week_Nr = date("W", strtotime($_now));
  $_week_Nr++;
  $_year = date("Y", strtotime($_now));

$_day = array();

$_date_Time =new DateTime();
// Voor iedere loop
for ($i=0; $i < 7; $i++) 
{ 
  // Haal de eerste dag op basis van het jaartal en weeknr en sla deze op als dd-mm
  $_day[0] = $_date_Time->setISODate($_year, $_week_Nr)->format('d-m-Y');
  // Bij iedere loop behalve de eerste
  if ($i > 0) 
  {
    // Tel i dagen erbij op en sla deze op als dd-mm
    $_day[$i] = $_date_Time->modify('+'. $i. ' days')->format('d-m-Y');
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
    <link href="../../assets/libs/flot/css/float-chart.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  </head>

  <body>
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper -->
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
      <!-- Topbar header -->
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
              <!-- Logo icon -->
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            
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
              </li>              
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false">
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
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">
              <!-- ============================================================== -->
              <!-- User profile  -->
              <!-- ============================================================== -->
              <?php
                $_user->getAccountControls();
              ?>
              <!-- ============================================================== -->
              <!-- User profile -->
              <!-- ============================================================== -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- ============================================================== -->
      <!-- End Topbar header -->
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
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Vraag hier uw bus/bussen aan.</h4>
            </div>
          </div>
        </div>
        <!-- Container fluid  -->
        <div class="container-fluid">
        
        <h3>Bussen</h3>
<form action="../planning/insertbus.php" method="post">
        
       

  <?php
    $_result = $_user->requestData("*", "bus");
    while ($_res = mysqli_fetch_array($_result))
    {
      $_value = $_res["busID"];
      $_name = explode(', ', $_res["busType"])[0];
      $_plate = explode(', ', $_res["busType"])[1];
      $_amount = $_res["busAmount"];
      echo "<div><input type='checkbox' id='" . $_plate . "' value='" . $_value . "' name='bus[]'><label for='" . $_plate . "'>" . $_name . ', ' . $_plate . ', ' . $_amount . " personen</label></div>";
    }
  ?>

        <style>
          .contact-form-textarea{
          width: 100%;
          height: 130px;
          
        }
          </style>
          <input type="date" id="start-date" name="startDate" required>
          <input type="date" id="end-date" name="endDate" required>
          <br><br>
          <input type="submit">
          </form>
          <style>
          
          #customers {
            font-family: Arial, Helvetica, sans-serif;
            font-size: small;
            border-collapse: collapse;
            width: 60%;
          }

          #customers td, #customers th {
            border: 1px solid grey;
            padding: 3px;
          }

          #customers tr:nth-child(even){background-color: #f2f2f2;}

          #customers tr:hover {background-color: #27a9e3;}

          #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #3e5569;
            color: white;
          }
          
          </style>
          
  <table id="customers" style="margin-top:-450px; margin-left:350px;">
    <tr>
        <th>Bus</th>
        <?php
            $_dates = array("Maandag", "Dinsdag", "Woensdag", "Donderdag", "Vrijdag", "Zaterdag", "Zondag");
            for ($i=0; $i < 7; $i++) { 
                echo "<th>". $_dates[$i]. "<br>". $_day[$i]. "</th>";
            }
        ?>
        
    </tr>
    <?php

      $_result = $_user->requestData("*", "bus");
       $date_now = date("Y-m-d");

      while ($_res = mysqli_fetch_array($_result))
      {
        $_value = $_res["busID"];
        $_name = explode(', ', $_res["busType"])[0];
        $_plate = explode(', ', $_res["busType"])[1];
        $_amount = $_res["busAmount"];

        echo "<tr><td>". $_name . " - ". $_plate ."</td>";

        $_orderedBusses = $_user->requestDataWhere('*', 'orderbus', 'busID', $_value);
        $today = time();
        $wday = date('w', $today);   
         
        while ($_res1 = mysqli_fetch_array($_orderedBusses))
        {
            
        $_dateStart = strtotime(date("d-m-Y", strtotime($_res1['dateStart'])));
        $_dateEnd = strtotime(date("d-m-Y", strtotime($_res1['dateEnd'])));
        
          if ($date_now < $_res1['dateEnd']) {
            for ($i=0; $i < 7; $i++) {
                $_dateDay = strtotime(date("d-m-Y", strtotime($_day[$i]))); 
              if (($_dateStart <= $_dateDay) && ($_dateEnd >= $_dateDay)) {
                echo '<td>' . $_employees[$_res1["userID"]] . '</td>';
              }
              else {
                  echo '<td></td>';
              }
            }
          }
        }
        ?>
        </tr>
        <?php
      }
    ?>
  </table>
  
       
        </div>
    
                    
                
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- Recent comment and chats -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
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
  </body>
</html>