<?php
include "../connection/config.php";
include "../account/account.php";

session_start();

$_user = $_SESSION["_user"];

if (isset($_GET["param"])) 
{
  $_id = $_GET["param"];
  $_SESSION["_last_ID"] = $_id;
}
else {
  $_id = $_SESSION["_last_ID"];
}


$_result = $_user->getEmployee($_id);
$_res = mysqli_fetch_array($_result);
?>


<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />

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
      href="../../assets/libs/fullcalendar/dist/fullcalendar.min.css"
      rel="stylesheet"
    />
    <link href="../../assets/extra-libs/calendar/calendar.css" rel="stylesheet" />
    <link href="../../dist/css/style.min.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
      if (typeof window.history.pushState == 'function') 
      {
        window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF']; ?>');
      }
	  </script>
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
              <!-- Logo icon -->
              <!-- <b class="logo-icon"> -->
              <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
              <!-- Dark Logo icon -->
              <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

              <!-- </b> -->
              <!--End Logo icon -->
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
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
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">

        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Account</h4>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->

        <div class="col-md-12">
        <div class="card">

       <div class="container">
        <div class="main-body">   
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="../../assets/images/users/1.jpg" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4> <!-- Naam, functie en afdeling,  -->
                        <?php
                          echo $_res["firstName"]. " ". $_res["lastName"];
                        ?>
                      </h4>
                      <p class="text-secondary mb-1">
                        <?php 
                          $_row = mysqli_fetch_array($_user->requestDataWhere('lvlName', 'userclearance', 'clearanceLvl', $_res["clearanceLvl"]));
                          $_functie = $_row["lvlName"]; 
                          echo $_functie; 
                        ?>
                      </p>
                      <p class="text-muted font-size-sm"> 
                        <?php
                          if (is_Null($_res["departmentID"])) {
                            $_department = "";
                          }else {    
                            $_row = mysqli_fetch_array($_user->requestDataWhere('departmentName', 'department', 'departmentID', $_res["departmentID"]));
                            $_department = $_row["departmentName"];
                          }
                          echo $_department;
                        ?>
                      </p>
                    </div>
                    <div class="row">
                    <div class="col-sm-12"> <!--button terug naar het werknemer overzicht-->
                      <a class="btn btn-info " href="pages-employee-overview.php">terug naar werknemer overzicht</a>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3"> <!-- Naam -->
                      <h6 class="mb-0">naam</h6> 
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php
                        echo $_res["firstName"]. " ". $_res["lastName"];
                      ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3"> <!-- Woonplaats -->
                      <h6 class="mb-0">Woonplaats</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php 
                        echo $_res["city"]; 
                      ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3"> <!-- Adres -->
                      <h6 class="mb-0">Adres</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php
                        echo $_res["streetName"]. " ". $_res["houseNr"];
                      ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3"> <!-- Email adres -->
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php
                        echo $_res["email"];
                      ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3"> <!-- Mobiel telefoon nummer -->
                      <h6 class="mb-0">Tel mobiel</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php
                        echo $_res["telNumMobile"];
                      ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3"> <!-- Nood telefoon nummer -->
                      <h6 class="mb-0">Tel nood</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php
                        echo $_res["telNumEmergency"];;
                      ?>
                    </div>
                 </div>
              <hr> <!-- Button informatie bewerken -->
              <button type="button" class="btn btn-info"><i class="mdi mdi-brush"></i> Bewerk informatie</button>
           </div>   
       </div>            
    </div>

    <div class="tab"> <!-- Wissel tussen werkzaamheden & Competenties -->
      <button class="tablink tablinks active" href='javascript:void(0)' onclick="openTab(event, 'werkzaamheden');">Werkzaamheden</button>
      <button class="tablink tablinks" href='javascript:void(0)' onclick="openTab(event, 'competenties');">Competenties</button>
    </div>
  
 <div class="container tabcard" id="werkzaamheden">
  <div class="row">
    <div class="col-12" style="overflow-x: auto;">
      <form action="../account/update-comps.php" method="post"> <!-- Sla geselecteerde werkzaamheden op -->
       <br><button type="submit" class="btn btn-info" name="_Submit_Work_Comp"><i class="mdi mdi-brush"></i> Sla werkzaamheden op</button>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col"><h4>Selecteer werkzaamheden</h4></th>
            </tr>
          </thead>
          <tbody>
            <?php // werkzaamheden
              $_result = $_user->requestData('*', 'workcomp');
              $_i = 0;
              while ($_res = mysqli_fetch_array($_result))
              {
                if ($_i == 0) {
                  echo "<tr>";
                } 
                elseif (($_i % 4) == 0) {
                  echo "</tr><tr>";
                }

                echo '<td>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck'. $_i. '" name="workComp[]" value="'. $_res["workCompID"]. '"';

                          $_check = $_user->requestDataAnd('*', 'orderworkcomp', 'workCompID', $_res["workCompID"], 'userID', $_id);
                          $_check = mysqli_fetch_array($_check);
                          if ($_check > 0) {
                            echo 'checked>';
                          }
                          else {
                            echo '>';
                          }
                          echo '
                          <label class="custom-control-label" for="customCheck'. $_i.'">'.$_res["workCompName"]. '</label>
                        </div>
                      </td>';
                $_i++;
              }
            ?>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>

<div class="container tabcard" id="competenties" style="display: none;">
  <div class="row">
    <div class="col-12" style="overflow-x: auto;">
      <form action="../account/update-comps.php" method="post"> <!-- Sla geselecteerde competenties op -->
    <br>  <button type="submit" class="btn btn-info" name="_Submit_Comp"><i class="mdi mdi-brush"></i> Sla competenties op</button> 
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col"><h4>Selecteer Competenties</h4></th>
            </tr>
          </thead>
          <tbody>
            <?php // competenties
              $_result = $_user->requestData('*', 'comp');
              $_i = 0;
              while ($_res = mysqli_fetch_array($_result))
              {
                if ($_i == 0) {
                  echo "<tr>";
                } 
                elseif (($_i % 4) == 0) {
                  echo "</tr><tr>";
                }

                echo '<td>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCompCheck'. $_i. '"name="Comp[]" value="'. $_res["compID"]. '"';

                          $_check = $_user->requestDataAnd('*', 'ordercomp', 'compID', $_res["compID"], 'userID', $_id);
                          $_check = mysqli_fetch_array($_check);
                          if ($_check > 0) {
                            echo 'checked>';
                          }
                          else {
                            echo '>';
                          }
                          echo '
                          <label class="custom-control-label" for="customCompCheck'. $_i.'">'.$_res["compName"]. '</label>
                        </div>
                      </td>';
                $_i++;
              }
            ?>
           </tbody>
          </table>
         </form>
        </div>
       </div>
      </div>

      </div>
    </div>
   </div>                
  </div>
 </div>
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
    <script src="../../dist/js/jquery.ui.touch-punch-improved.js"></script>
    <script src="../../dist/js/jquery-ui.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="../../assets/libs/moment/min/moment.min.js"></script>
    <script src="../../assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="../../dist/js/pages/calendar/cal-init.js"></script>
  </body>
</html>
