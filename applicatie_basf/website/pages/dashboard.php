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
  <meta name="keywords" />
  <meta name="description" />
  <meta name="robots" content="noindex,nofollow" />
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/basf_icon.png" />
  <!-- Custom CSS -->
  <link href="../../assets/libs/flot/css/float-chart.css" rel="stylesheet" />
  <!-- Custom CSS -->
  <link href="../../dist/css/style.min.css" rel="stylesheet" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="../../dist/css/klant_dashboard.css">
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
  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
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
              <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" />
            </span>
            <!-- Logo icon -->
          </a>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
          <!-- ============================================================== -->
          <!-- toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-start me-auto">
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-bell font-24"></i>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <hr class="dropdown-divider" />
                </li>
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
      <!-- 0000000000000000000000000000000000000000000000000000000000000000000000000000 -->
      <!-- Main -->
      <!-- ============================================================== -->
      <div class="home-content">
        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Aantal bussen</div>
              <div class="number">4</div>
              <div class="indicator">
              </div>
            </div>
            <i class='fas fa-bus cart'></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Aantal Materialen</div>
              <div class="number">7</div>
              <div class="indicator">
              </div>
            </div>
            <i class='fas fa-boxes cart two'></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Vandaag</div>
              <div class="number" id="datum"></div>
              <div class="indicator">
              </div>
            </div>
            <i class='fa fa-calendar cart three'></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Tijd</div>
              <div class="number" id="tijd"></div>
              <div class="indicator">
              </div>
            </div>
            <i class='bx bxs-time cart four'></i>
          </div>
        </div>

        <div class="sales-boxes">
          <div class="recent-sales box">
            <div class="title">Meldingen</div>
            <div class="sales-details">
              <!-- ============================================== -->
              <section>
                <div class="square_box box_three"></div>
                <div class="square_box box_four"></div>
                <div class="container mt-5">
                  <div class="row">

                    <div class="col-sm-12">
                      <div class="alert fade alert-simple alert-success alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show">
                        <!-- <button type="button" class="close font__size-18" data-dismiss="alert" style="left: 10px;">
									<span aria-hidden="true"><a>
                    <i class="fa fa-times greencross"></i>
                    </a></span>
									<span class="sr-only">Close</span> 
								</button> -->
                        <i class="start-icon far fa-check-circle faa-tada animated"></i>
                        <strong class="font__weight-semibold">Well done!</strong> You successfullyread this important.
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="alert fade alert-simple alert-info alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert">
                        <!-- <button type="button" class="close font__size-18" data-dismiss="alert">
									<span aria-hidden="true">
										<i class="fa fa-times blue-cross"></i>
									</span>
									<span class="sr-only">Close</span>
								</button> -->
                        <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
                        <strong class="font__weight-semibold">Heads up!</strong> This alert needs your attention, but it's not super important.
                      </div>

                    </div>

                    <div class="col-sm-12">
                      <div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert">
                        <!-- <button type="button" class="close font__size-18" data-dismiss="alert">
									<span aria-hidden="true">
										<i class="fa fa-times warning"></i>
									</span>
									<span class="sr-only">Close</span>
								</button> -->
                        <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
                        <strong class="font__weight-semibold">Warning!</strong> Better check yourself, you're not looking too good.
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="alert fade alert-simple alert-danger alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert">
                        <!-- <button type="button" class="close font__size-18" data-dismiss="alert">
									<span aria-hidden="true">
										<i class="fa fa-times danger "></i>
									</span>
									<span class="sr-only">Close</span>
								</button> -->
                        <i class="start-icon far fa-times-circle faa-pulse animated"></i>
                        <strong class="font__weight-semibold">Oh snap!</strong> Change a few things up and try submitting again.
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="alert fade alert-simple alert-primary alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert">
                        <!-- <button type="button" class="close font__size-18" data-dismiss="alert">
									<span  aria-hidden="true"><i class="fa fa-times alertprimary"></i></span>
									<span class="sr-only">Close</span>
								</button> -->
                        <i class="start-icon fa fa-thumbs-up faa-bounce animated"></i>
                        <strong class="font__weight-semibold">Well done!</strong> You successfullyread this important.
                      </div>

                    </div>

                  </div>
                </div>
              </section>
              <!-- ============================================== -->
            </div>
            <!-- <div class="button">
              <a href="#">Alles zien</a>
            </div> -->
          </div>
          <!-- <div class="top-sales box" style="min-height: 65vh;"> -->
          <!-- <div class="title">Het weer vandaag</div> -->
          <iframe class="weather" src="https://www.meteoblue.com/nl/weather/widget/three/nunhem_nederland_2749759_%d8%a7%d9%8a%d8%b7%d8%a7%d9%84%d9%8a%d8%a7_2524907?geoloc=fixed&days=4&tempunit=CELSIUS&windunit=KILOMETER_PER_HOUR&layout=image" frameborder="0" scrolling="NO" allowtransparency="true" sandbox="allow-same-origin allow-scripts allow-popups"></iframe>
          <!-- </div> -->
          <!-- ==============================================      roermond_nederland_2748000 -->
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- Main -->
      <!-- 0000000000000000000000000000000000000000000000000000000000000000000000000000 -->
      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== -->
      <!-- <footer class="footer text-center">
          Project BASF 
        </footer> -->
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
  <script src="../../dist/js/klant_dashboard.js"></script>
</body>

</html>
