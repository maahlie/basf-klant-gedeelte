<?php

// Files includen

include "../connection/config.php";
include "../account/account.php";
include "includes/dhp.inc.php";
include "includes/dashboard.inc.php";

// Connect met de database

$connect = new Dhb;

// Class ophalen

$Dashboard_class = new Dashboard();

$aantal_taken = $Dashboard_class->Aantal_taken();

$aantal_bussen = $Dashboard_class->Aantal_bussen();

// Start de session als het niet gestart is om session variablen te kunnen gebruiken

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$_user = $_SESSION["_user"];

$_SESSION["news_aantal_keren"] = 5;


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
  <!-- Site title -->
  <title>Dashboard</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/basf_icon.png" />
  <!-- Custom CSS -->
  <link href="../../assets/libs/flot/css/float-chart.css" rel="stylesheet" />
  <!-- Custom CSS -->
  <link href="../../dist/css/style.min.css" rel="stylesheet" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link" id="change"><i class="mdi mdi-white-balance-sunny" id="sunmoon"></i></a>
            </li>
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
      <!-- Main -->
      <!-- =======================Div for Boxs=============================== -->
      <div class="home-content">
        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Aantal bussen</div>
              <div class="number"><?php echo $aantal_bussen ?></div>
              <div class="indicator">
              </div>
            </div>
            <i class='fas fa-bus cart'></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Vandaag taken</div>
              <div class="number"> <?php echo  $aantal_taken ?> </div>
              <div class="indicator">
              </div>
            </div>
            <i class='fas fa-tasks cart two'></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Week nummer</div>
              <div class="number" id="week"></div> <!-- See klant_dashboard.js file -->
              <div class="indicator">
              </div>
            </div>
            <i class='fas fa-calendar-week cart'></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Dag naam</div>
              <div class="number" id="dag_naam"></div> <!-- See klant_dashboard.js file -->
              <div class="indicator">
              </div>
            </div>
            <i class='fas fa-calendar-plus cart two'></i>
          </div>
          <div class="box meerboxs">
            <div class="right-side">
              <div class="box-topic">De huidige datum</div>
              <div class="number" id="huidige_dag"></div> <!-- See klant_dashboard.js file -->
              <div class="indicator">
              </div>
            </div>
            <i class='fas fa-calendar-check cart'></i>
          </div>
          <div class="box meerboxs">
            <div class="right-side">
              <div class="box-topic">De huidige maand</div>
              <div class="number" id="huidige_maand"></div> <!-- See klant_dashboard.js file -->
              <div class="indicator">
              </div>
            </div>
            <i class='fas fa-calendar-day cart two'></i>
          </div>
          <div class="box meerboxs">
            <div class="right-side">
              <div class="box-topic">Het huidige jaar</div>
              <div class="number" id="huidige_jaar"></div> <!-- See klant_dashboard.js file -->
              <div class="indicator">
              </div>
            </div>
            <i class='fas fa-calendar cart'></i>
          </div>
          <div class="box meerboxs">
            <div class="right-side">
              <div class="box-topic">De huidige tijd</div>
              <div class="number" id="huidige_tijd"></div> <!-- See klant_dashboard.js file -->
              <div class="indicator">
              </div>
            </div>
            <i class='bx bxs-time cart four'></i>
          </div>
        </div>
        <!-- =======================Button for More boxs=============================== -->
        <!-- tussen button  -->
        <button id="add-boxs" onclick="addboxs()">Meer</button>
        <!-- tussen button  -->
        <div class="sales-boxes">
          <!-- =======================Div for calandar=============================== -->
          <div class="recent-sales box">
            <iframe class="calandar" scrolling="no" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" src="fullcalandar.php"></iframe>
          </div>
          <!-- =======================Meldingen=============================== -->
          <div class="top-sales box scrollbardiv">
            <div class="title">Meldingen</div>
            <section>
              <div class="square_box box_three"></div>
              <div class="square_box box_four"></div>
              <div class="container mt-5">
                <div class="row">
                  <!-- Meldingen ophalen van database -->
                  <?php
                  $design = ["alert-success", "alert-info", "alert-warning", "alert-danger", "alert-primary", "alert-extra"];
                  $count = 0;
                  // $meldingen = $connect->connect()->query('SELECT * FROM dailymessage WHERE messageID > (SELECT count(messageID) - 6 FROM dailymessage WHERE active = 0) AND active = 0 ORDER BY messageID DESC'); //MAX(messageID)
                  $meldingen = $connect->connect()->query('SELECT * FROM dailymessage WHERE active = 0 ORDER BY messageID DESC LIMIT 6');
                  while($row = $meldingen->fetch()){
                    ?>
                    <div class="col-sm-12">
                    <div class="alert fade alert-simple <?php echo $design[$count] ?> alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show">
                      <strong class="font__weight-semibold"><?php echo $row["entryDate"] ?></strong><br><?php echo $row["message"] ?>
                    </div>
                  </div>
                    <?php
                    $count ++;
                  }
                  ?>
                  <!-- Meldingen opgehaald -->
                </div>
              </div>
            </section>
          </div>
        </div>
        <div class="sales-boxes">
          <!-- =======================Iframe for weather=============================== -->
          <iframe class="weather" src="https://www.meteoblue.com/nl/weather/widget/three/nunhem_nederland_2749759_%d8%a7%d9%8a%d8%b7%d8%a7%d9%84%d9%8a%d8%a7_2524907?geoloc=fixed&days=4&tempunit=CELSIUS&windunit=KILOMETER_PER_HOUR&layout=image" frameborder="0" scrolling="NO" allowtransparency="true" sandbox="allow-same-origin allow-scripts allow-popups"></iframe>
          <!-- =========================================================== -->
          <div class="recent-sales box" id="recent-sales">
          <div class="title">Bussen overzicht</div>
          <div class="sales-details">
            <ul class="details">
              <li class="topic">Naam</li>
              <?php
              $count = 0;
              $busNaam = $connect->connect()->query('SELECT busType FROM bus LIMIT 11');
              while($row = $busNaam->fetch()){
                $naamArray = explode(',', $row['busType']);
                ?>
                <li><?php echo $naamArray[0]; ?></li>
              <?php
                $count++;
              }
              ?>
            </ul>
            <ul class="details">
              <li class="topic">Kenteken</li>
              <?php
              $count = 0;
              $busNaam = $connect->connect()->query('SELECT busType FROM bus LIMIT 11');
              while($row = $busNaam->fetch()){
                $naamArray = explode(',', $row['busType']);
                ?>
                <li><?php echo $naamArray[1]; ?></li>
              <?php
                $count++;
              }
              ?>
            </ul>
            <ul class="details">
              <li class="topic">Type</li>
              <?php
              $count = 0;
              $busNaam = $connect->connect()->query('SELECT busType FROM bus LIMIT 11');
              while($row = $busNaam->fetch()){
                $naamArray = explode(',', $row['busType']);
                ?>
                <li><?php if(isset($naamArray[2])){
                  echo $naamArray[2];
                }else{
                  echo "Kleine bus";
                } ?></li>
              <?php
                $count++;
              }
              ?>
            </ul>
            <ul class="details">
              <li class="topic">Aantal</li>
              <?php
              $count = 0;
              $busNaam = $connect->connect()->query('SELECT busAmount FROM bus LIMIT 11');
              while($row = $busNaam->fetch()){
                ?>
                <li><?php echo $row["busAmount"]; ?></li>
              <?php
                $count++;
              }
              ?>
            </ul>
          </div>
          <div class="button">
            <a href="material.php">Alles zien</a>
          </div>
        </div>
        </div>
      </div>
      <!-- ===========================xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx===================================-->
      <!-- <iframe src="news.php" frameborder="0" class="news" scrolling="no"></iframe> -->
      <!-- ==============================================================-->
      <!-- Main -->
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
  <script src="../../dist/js/darkmode.js"></script>
</body>

</html>
