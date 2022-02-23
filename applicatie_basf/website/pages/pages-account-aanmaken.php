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
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">
              <!-- ============================================================== -->
              <!-- End Messages -->
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
              <h4 class="page-title">Account werknemer</h4>


            </div>
          </div>
        </div>
        <!-- Container fluid  -->
        <div class="container-fluid">

          <div class="row">
            <!-- column -->
            <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="../account/register-account.php" method="post">
                  <div class="card-body">
                    <h4 class="card-title">Gegevens</h4><br>
                  <div class="col-lg-6">
                  
                  <div class="form-group row"><!--Volledige naam-->
                  <label
                     for="fname">Voor en achternaam</label>
                      <div class="col-sm-9">
                    <input
                      name="_register_Name"
                      type="text"
                      class="form-control"
                      id="fname"
                      placeholder="Voornaam / Achternaam"
                      required
                     />
                   </div>
                 </div>
                   <div class="form-group row"> <!--Adres-->
                      <label
                     for="lname">Adres</label>
                   <div class="col-sm-9">
                      <input
                        name="_register_Address"
                        type="text"
                        class="form-control"
                        id="lname"
                        placeholder="Straatnaam, nr"
                        required
                      />
                    </div>
                    <div class="col-sm-9">
                      <input
                        name="_register_Postal"
                        type="text"
                        class="form-control"
                        id="lname"
                        placeholder="Postcode"
                        required
                      />
                    </div><div class="col-sm-9">
                      <input
                        name="_register_City"
                        type="text"
                        class="form-control"
                        id="lname"
                        placeholder="Woonplaats"
                        required
                      />
                    </div>
                  </div>       
                  <div class="form-group row"> <!--Mobiel telefoon nr.-->
                      <label
                     for="lname">Telefoonnummer mobiel</label>
                   <div class="col-sm-9">
                      <input
                        name="_register_Phone"
                        type="text"
                        class="form-control"
                        id="lname"
                        placeholder="061234567"
                        required
                      />
                    </div>
                  </div>  
                  <div class="form-group row"> <!--Nood telefoon nr.-->
                      <label
                     for="lname">Telefoonnummer thuis/nood</label>
                   <div class="col-sm-9">
                      <input
                        name="_register_Emergency"
                        type="text"
                        class="form-control"
                        id="lname"
                        placeholder="061234567"
                        required
                      />
                    </div>
                  </div>   
                  <div class="form-group row"> <!--Email adres-->
                      <label
                     for="lname">Email adress</label>
                   <div class="col-sm-9">
                      <input
                        name="_register_Email"
                        type="text"
                        class="form-control"
                        id="lname"
                        placeholder="gmail@gmail.com"
                        required
                      />
                    </div>
                  </div>
                  <div class="form-group row"> <!--Wachtwoord-->
                      <label
                     for="lname">Wachtwoord</label>
                   <div class="col-sm-9">
                      <input
                        name="_register_Password1"
                        type="text"
                        class="form-control"
                        id="lname"
                        placeholder="Wachtwoord"
                        required
                      />
                    </div>
                  </div>
                  <div class="form-group row"> <!--Wachtwoord controle-->
                      <label
                     for="lname">Wachtwoord controle</label>
                   <div class="col-sm-9">
                      <input
                        name="_register_Password2"
                        type="text"
                        class="form-control"
                        id="lname"
                        placeholder="Wachtwoord"
                        required
                      />
                    </div>
                  </div>  
                  <div class="form-group row"> <!--Lvl van het nieuwe account-->
                      <label
                     for="lname">Operatorlvl</label>
                   <div class="col-sm-9">
                      <select
                        name="_register_Operatorlvl"
                        class="form-control"
                        id="lname"
                      >
                        <option value="geen"></option>
                        <option value="Op">Operator</option>
                        <option value="S-Op">Senior-Operator</option>
                        <option value="P-Op">Principal-Operator</option>
                      </select>
                    </div>
                  </div>     
                  <div class="form-group row">
                      <label
                     for="lname">Afdeling</label> <!--Afdeling-->
                   <div class="col-sm-9">
                      <select
                        name="_register_Department"
                        class="form-control"
                        id="lname"
                      >
                        <option value="geen"></option>
                        <?php
                          $_result = $_user->requestData('*', 'department');
                          while ($_res = mysqli_fetch_array($_result))
                          {
                            $_value = $_res["departmentID"];
                            $_name = $_res["departmentName"];
                            echo "<option value='$_value'>$_name</option>";
                          }
                        ?>
                      </select>
                    </div>
                  </div>    
                  <div class="form-group row">
                      <label
                     for="lname">Functie</label> <!--Functie-->
                   <div class="col-sm-9">
                      <select
                        name="_register_Function"
                        class="form-control"
                        id="lname"
                      >
                        <?php
                          $_result = $_user->requestData('*', 'userclearance');
                          while ($_res = mysqli_fetch_array($_result))
                          {
                            $_value = $_res["clearanceLvl"];
                            $_name = $_res["lvlName"];
                            echo "<option value='$_value'>$_name</option>";
                          }
                        ?>
                      </select>
                    </div>
                  </div>           
                  <label>Geboorte datum</label> <!--Geboorte datum-->
                  <div class="input-group">
                    <input
                      name="_register_Birth"
                      type="date"
                      class="form-control mydatepicker"
                      placeholder="mm/dd/yyyy"
                      required
                    />
                  </div>
                 
                </div><br>

                  </div>
                  <div class="border-top">
                    <div class="card-body"> <!--Submit-->
                      <button type="submit" class="btn btn-primary" name="_submit_Account">
                        Maak account aan
                      </button>
                    </form>
                      <!--Terug naar het overzicht-->
                      <a class="btn btn-primary" href="pages-employee-overview.php">Annuleer/Terug naar overzicht</a>             
                    </div>
                  </div>
                
              </div>
              <!-- card -->

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
