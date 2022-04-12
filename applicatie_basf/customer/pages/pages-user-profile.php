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
      function hideStatic()
      {
        let info_static = document.getElementsByClassName('info_static');

        for (let i = 0; i < info_static.length; i++){
          if(info_static[i].style.display=='inline'){
            info_static[i].style.display = 'none';
          }else{
            info_static[i].style.display = 'inline';
          }
        }

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
                  class="light-logo"/>
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
            data-navbarbg="skin5">
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
                  <div class="d-flex flex-column align-items-center text-center"> <!-- Profiel foto, dit was een extra idee voor later -->
                    <img src="../../assets/images/users/1.jpg" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4> <!-- Naam, Functie en afdeling -->
                        <?php
                          echo $_user->getName();
                        ?>
                      </h4>
                      <p class="text-secondary mb-1">
                        <?php 
                          $_row = mysqli_fetch_array($_user->requestDataWhere('lvlName', 'userclearance', 'clearanceLvl', $_user->getClearance()));
                          $_functie = $_row["lvlName"]; 
                          echo $_functie; 
                        ?>
                      </p>
                      <p class="text-muted font-size-sm"> 
                        <?php 
                          if (is_Null($_user->getDepartment())) {
                            $_department = "";
                          }else {    
                            $_row = mysqli_fetch_array($_user->requestDataWhere('departmentName', 'department', 'departmentID', $_user->getDepartment()));
                            $_department = $_row["departmentName"]; 
                          }  
                          echo $_department; 
                        ?>
                      </p>
                    </div>
                    <div class="row">
                    <div class="col-sm-12"> <!-- Button om terug naar het sahboard te gaan -->
                      <a class="btn btn-info " target="__blank" href="dashboard.php">terug naar het dashboard</a>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                <form method="POST" name="edit_form" action="../account/update_info.php">
                  <div class="row">
                    <div class="col-sm-3"> <!-- Naam -->
                      <h6 class="mb-0">Naam</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php
                        echo $_user->getName();
                      ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row"> <!-- Woonplaats -->
                    <div class="col-sm-3">
                      <h6 class="mb-0">Woonplaats</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php
                        echo $_user->getCity();
                      ?>
                    </div>
                    <input type='text' class="info_static form-control" id='_city' name='_city' value='' style="display: none;" placeholder="Stad/dorp">
                  </div>
                  <hr>
                  <div class="row"> <!-- Adress -->
                    <div class="col-sm-3">
                      <h6 class="mb-0">Adress</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php
                        echo $_user->getAddress();
                      ?>
                    </div>
                    <input type='text' class="info_static form-control" id='_street' name='_street' value='' style="display: none;" placeholder="Straatnaam">
                    <input type='text' class="info_static form-control" id='_house_nr' name='_house_nr' value='' style="display: none;" placeholder="Huisnummer">
                  </div>
                  <hr>
                  <div class="row"> <!-- email adress -->
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email werk</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                       <?php
                          echo $_user->getEmailWork();
                       ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row"> <!-- email adress -->
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email privé</h6>
                    </div>
                    <div class="col-sm-9 text-secondary ">
                       <?php
                          echo $_user->getEmailPrivate();
                       ?>
                    </div>
                    <input type='text' class="info_static form-control" id='_emailP' name='_emailP' value='' style="display: none;">
                  </div>
                  <hr>
                  <div class="row"> <!-- Mobiel telefoon nummer -->
                    <div class="col-sm-3">
                      <h6 class="mb-0">Tel mobiel</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php
                      echo $_user->getPhone();
                     ?>
                    </div>
                    <input type='text' class="info_static form-control" id='_phone' name='_phone' value='' style="display: none;">
                  </div>
                  <hr>
                  <div class="row"> <!-- Nood telefoon nummer -->
                    <div class="col-sm-3">
                      <h6 class="mb-0">Tel nood</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php
                        echo $_user->getEmergency();
                      ?>
                    </div>
                    <input type='text' class="info_static form-control" id='_emergency' name='_emergency' value='' style="display: none;">
                  </div>
                  <hr>
                  <div class="row info_static" style="display: none;">
                    <div class="col-sm-3"> <!-- wachtwoord -->
                      <h6 class="mb-0">Wachtwoord</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    </div>
                    <input type='password' class="info_static form-control" id='_password' name='_password' value='' style="display: none;" minlength="8">
                  </div>
                  <hr>
                    <!-- knop om je gegevens aan te kunnen passen, *nog niet functioneel* -->
                  <button type="button" class="btn btn-info" onclick="hideStatic();"><i class="mdi mdi-brush"></i> Bewerk informatie</button>
                  <input type="submit" id="btn_edit" name="btn_edit" class="btn btn-info info_static" style="display: none;" onclick="hideStatic();"></input>
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
