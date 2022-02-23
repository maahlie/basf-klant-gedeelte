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
              <h4 class="page-title">Dashboard</h4>
            </div>
          </div>
        </div>
        <!-- Container fluid  -->
        <div class="container-fluid">

          <div class="row">
            <!-- column -->
            <div class="col-lg-6"><!--Persoonlijke notificaties, Bijvoorbeeld: als je verlof aanvraag beoordeeld is, als er een verandering in je rooster of in het systeem is-->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Laatste notificaties</h4>
                </div>
                <div class="comment-widgets scrollable">
                  <!-- Comment Row -->
                  <div class="d-flex flex-row comment-row mt-0">
                    <div class="p-2">
                      <img
                        src="../../assets/images/users/1.jpg"
                        alt="user"
                        width="50"
                        class="rounded-circle"
                      />
                    </div>
                    <div class="comment-text w-100">
                      <h6 class="font-medium">Systeem</h6>
                      <span class="mb-3 d-block"
                      >Welkom op het dashboard, u bent succesvol voor de eerste keer ingelogd.
                      </span>
                    </div>
                  </div>
                  <!-- Comment Row -->
                  <div class="d-flex flex-row comment-row">
                    <div class="p-2">
                      <img
                        src="../../assets/images/users/4.jpg"
                        alt="user"
                        width="50"
                        class="rounded-circle"
                      />
                    </div>
                    <div class="comment-text active w-100">
                      <h6 class="font-medium">Michelle Joosten</h6>
                      <span class="mb-3 d-block"
                        >Heeft u toegevoegd aan het werk rooster van 24/11/2021.
                      </span>
                    </div>
                  </div>
                  <!-- Comment Row -->
                  <div class="d-flex flex-row comment-row">
                    <div class="p-2">
                      <img
                        src="../../assets/images/users/5.jpg"
                        alt="user"
                        width="50"
                        class="rounded-circle"
                      />
                    </div>
                    <div class="comment-text w-100">
                      <h6 class="font-medium">John Doeting</h6>
                      <span class="mb-3 d-block"
                        >Heeft uw verlof aanvraag van 2/10/2021 goed gekeurd.
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- card -->
              <div class="card"> <!--opvulling voor het dashboard-->
                <div class="card-body">
                  <h4 class="card-title mb-0">Veld data</h4>
                  <div class="mt-3">
                    <div class="d-flex no-block align-items-center">
                      <span>81% Komkommers geoogst</span>
                      <div class="ms-auto">
                        <span>125</span>
                      </div>
                    </div>
                    <div class="progress">
                      <div
                        class="progress-bar progress-bar-striped"
                        role="progressbar"
                        style="width: 81%"
                        aria-valuenow="10"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                  </div>
                  <div>
                    <div class="d-flex no-block align-items-center mt-4">
                      <span>72% Wortelen geplant</span>
                      <div class="ms-auto">
                        <span>120</span>
                      </div>
                    </div>
                    <div class="progress">
                      <div
                        class="progress-bar progress-bar-striped bg-success"
                        role="progressbar"
                        style="width: 72%"
                        aria-valuenow="25"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                  </div>
                  <div>
                    <div class="d-flex no-block align-items-center mt-4">
                      <span>53% onderzoek gedaan</span>
                      <div class="ms-auto">
                        <span>785</span>
                      </div>
                    </div>
                    <div class="progress">
                      <div
                        class="progress-bar progress-bar-striped bg-info"
                        role="progressbar"
                        style="width: 53%"
                        aria-valuenow="50"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                  </div>
                  <div>
                    <div class="d-flex no-block align-items-center mt-4">
                      <span>30% gewassen besproeid</span>
                      <div class="ms-auto">
                        <span>30</span>
                      </div>
                    </div>
                    <div class="progress">
                      <div
                        class="progress-bar progress-bar-striped bg-danger"
                        role="progressbar"
                        style="width: 30%"
                        aria-valuenow="75"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- column -->

            <div class="col-lg-6">
              <!-- card -->
              <div class="card">

                  <!-- Comment Row -->
                  <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-0">Updates</h4><!--idee, op basis van de verjaardagen een melding waarin de werknemer een fijne verjaardag toe wordt gewenst-->
                </div>
                <ul class="list-style-none">
                  <li class="d-flex no-block card-body border-top">
                    <i class="mdi mdi-gift fs-4 w-30px mt-1"></i>
                    <div>
                      <a href="#" class="mb-0 font-medium p-0"
                        >Gefeliciteerd Jan!, Fijne verjaardag</a
                      >
                      <span class="text-muted"
                        >Wij wensen u een fijne dag.</span
                      >
                    </div>
                    <div class="ms-auto">
                      <div class="tetx-right">
                        <h5 class="text-muted mb-0">11</h5>
                        <span class="text-muted font-16">Jan</span>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
    
              <!-- card new -->
              <div class="card"> <!--opvulling voor het dashboard, dit zou bijvorbeeld een nieuws feed kunnen worden-->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a
                      class="nav-link active"
                      data-bs-toggle="tab"
                      href="#home"
                      role="tab"
                      ><span class="hidden-sm-up"></span>
                      <span class="hidden-xs-down">Tab1</span></a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      data-bs-toggle="tab"
                      href="#profile"
                      role="tab"
                      ><span class="hidden-sm-up"></span>
                      <span class="hidden-xs-down">Tab2</span></a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      data-bs-toggle="tab"
                      href="#messages"
                      role="tab"
                      ><span class="hidden-sm-up"></span>
                      <span class="hidden-xs-down">Tab3</span></a
                    >
                  </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">
                  <div class="tab-pane active" id="home" role="tabpanel">
                    <div class="p-20">
                      <p>
                       Welkom op het dashboard, U kunt zich door de applicatie heen navigeren via de balk aan de linkerzijde.
                      </p>
                      <img
                        src="../../assets/images/background/img5.jpg"
                        class="img-fluid"
                      />
                    </div>
                  </div>
                  <div class="tab-pane p-20" id="profile" role="tabpanel">
                    <div class="p-20">
                      <img
                        src="../../assets/images/background/img6.png"
                        class="img-fluid"
                      />
                      <p class="mt-2">
                      Welkom op het dashboard, U kunt in de navigatie balk aan de linkerzijde tussen pagina's wisselen.
                        Als u uw account wilt zien of wilt uitloggen, klik dan op het icoontje rechts boven in de hoek.
                      </p>
                    </div>
                  </div>
                  <div class="tab-pane p-20" id="messages" role="tabpanel">
                    <div class="p-20">
                      <p>
                      Welkom op het dashboard, U kunt in de navigatie balk aan de linkerzijde tussen pagina's wisselen.
                        Als u uw account wilt zien of wilt uitloggen, klik dan op het icoontje rechts boven in de hoek.
                      </p>
                      <img
                        src="../../assets/images/background/img4.jpg"
                        class="img-fluid"
                      />
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
