<?php
include "../connection/config.php";
include "../account/account.php";

session_start();

$_user = $_SESSION["_user"];
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
   <div class="row">
     <?php
      $_result_dept = $_user->requestData("*", "department");

      $_depts = mysqli_fetch_all($_result_dept, MYSQLI_ASSOC);


      
      //laat alle departments zien
      for ($i=0; $i < $_result_dept->num_rows; $i++){
        $_result_planning = $_user->requestDataWhere("*", "planning", "departmentID", $_depts[$i]['departmentID']);
        $_planning = mysqli_fetch_all($_result_planning, MYSQLI_ASSOC);
        $_dates=[];
        
      echo '
      <div name="afdeling" class="col-12"><br>
      <h4>'.$_depts[$i]['departmentName'].'</h4>
      <div class="table-responsive">
        <table class="table table-bordered">

          <thead>
          <tr id="ROW1">  <!--Met de arrows kunnen wisselen tussen de weken, vooruit en terug kijken-->
              <th scope="col"> <button type="button" class="btn btn-info"><i class="fas fa-angle-left"></i></button>
              <button type="button" class="btn btn-info"><i class="fas fa-angle-right"></i></button>
              </th>';
              //maak voor elke dag van de week een table head, beginend met maandag, dit is nu alleen nog maar van volgende week
              for($p=0; $p<7; $p++){

                  $_days = [ '', '1 day', '2 days', '3 days', '4 days', '5 days', '6 days' ];
                  $_date = date_create(date("Y-m-d", strtotime('monday next week')));
                  
                  if($p!=0){
                    date_add($_date, date_interval_create_from_date_string($_days[$p]));
                    $_date_real = date_format($_date, 'Y-m-d');
                    $_date_usable = date_format($_date, 'y-m-d');
                  }else{
                    $_date_real = date_format($_date, 'Y-m-d');
                    $_date_usable = date_format($_date, 'y-m-d');                  
                  }
                  
                  array_push($_dates, $_date_real);

                  echo '<th scope="col">'; echo $_date_usable; echo'</th>';

              }
              echo '
            </tr>
          </thead>
          <tbody>';

            //laat voor elk department dagdeel + naam zien van een werknemer
          for($o=0; $o < $_result_planning->num_rows; $o++){
            $_names = $_user->requestDataWhere("firstName, lastName", "employee", "userID", $_planning[$o]['userID']);
            $_names_array = mysqli_fetch_all($_names, MYSQLI_ASSOC);

            echo '
              <tr>
                <th scope="row">'.$_names_array[0]['firstName'].' '.$_names_array[0]['lastName'].'</th> <!--Naam werknemer-->';

                for($v=0; $v<7; $v++){
                  if($_planning[$o]['date']==$_dates[$v]){
                    echo '<td>'.$_planning[$o]['dayPart'].'</td>';
                  }else{
                    echo '<td></td>';
                  }
                }

              echo'  
              </tr>';
          }

          echo '
          </tbody>
        </table>
      </div>
    </div>';
      }
     ?>
  </div><br>

  

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
