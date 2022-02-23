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
  <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png" />
  <!-- Custom CSS -->
  <link href="../../assets/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
  <link href="../../assets/extra-libs/calendar/calendar.css" rel="stylesheet" />
  <link href="../../dist/css/style.min.css" rel="stylesheet" />
  <link href="../../dist/css/custom.css" rel="stylesheet" />
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
  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
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
              <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" />
            </span>
          </a>
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
            <!-- ============================================================== -->
            <!-- Search -->
            <!-- ============================================================== -->
            <li class="nav-item search-box">
              <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-magnify fs-4"></i></a>
              <form class="app-search position-absolute">
                <input type="text" class="form-control" placeholder="Search &amp; enter" />
                <a class="srh-btn"><i class="mdi mdi-window-close"></i></a>
              </form>
            </li>
          </ul>
          <!-- ============================================================== -->
          <!-- Right side toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-end">
            <!-- ============================================================== -->
            <!-- End Messages -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">
              <span class="text-white">
                welkom,
                <?php
                echo $_user->getName();
                ?>
              </span>
              <a class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                    pro-pic
                  " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../../assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31" />
              </a>
              <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-settings me-1 ms-1"></i> Account
                </a>
                <div class="dropdown-divider"></div>
                <form action='../login/logout.php' method='post'>
                  <button class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Log uit
                  </button>
                </form>
                <div class="dropdown-divider"></div>
              </ul>
            </li>
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
      <!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Planner</h4>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->


        <?php
        $_employees_Needed = 10;
        ?>
        <div class='_Planner_Container' style="overflow-x:auto;">
          <table class="tg">
            <thead>
              <tr>
                <th class='_Table_White _Table_Border_Right'>Werknemer</th>
                <?php
                for($i = 0; $i < 24;$i++)
                {
                  if($i >= 0 && $i <= 9)
                      {
                        $i = "0".$i;
                      }
                  if($i % 2 == 0){
                    echo "<th class='_Table_White'><div class='_Table_Header_Rotate'>$i:00</div></th>";
                  }
                  elseif($i == 23)
                  {
                    echo "<th class='_Table_Lightgray _Table_Border_Right'><div class='_Table_Header_Rotate'>$i:00</div></th>";
                  }
                  else
                  {
                    echo "<th class='_Table_Lightgray'><div class='_Table_Header_Rotate'>$i:00</div></th>";
                  }
                }
                ?>
                <th class='_Table_White'>Begintijd</th>
                <th class='_Table_White'>Eindtijd</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="_Table_Gray" colspan="27">Afdeling</td>
              </tr>
              <tr>
                <td class="_Table_Gray _Table_Subdepartment" colspan="27">Sub-afdeling</td>
              </tr>
              <form action='' method='post'>
              <?php
              for ($i = 0; $i < $_employees_Needed; $i++) 
              {
                echo "
                <tr>
                  <td class='_Table_White _Table_Border_Right'></td>";
                    for($e = 0; $e < 24;$e++)
                    {
                      if($e % 2 == 0)
                      {
                        echo "<td class='_Table_White' id='_Table_Row${i}_Column$e'></td>";
                      }
                      elseif($e == 23)
                      {
                        echo "<td class='_Table_Lightgray _Table_Border_Right' id='_Table_Row${i}_Column$e'></td>";
                      }
                      else
                      {
                        echo "<td class='_Table_Lightgray' id='_Table_Row${i}_Column$e'></td>";
                      }
                    }
                  echo "<td class='_Table_White'>
                    <select onchange='visualize($i)' id='selectstart$i'>
                      <option selected disabled></option>
                      ";
                        for($q = 0; $q < 24; $q++)
                        {
                          $qplus = $q + 1;
                          $bplus = $b + 1;
                          $qhalf = $q + 0.5;
                          $bhalf = "30";
                          if($q >= 0 && $q <= 9)
                          {
                            $b = "0".$q;
                            $bplus = "0".$q;
                          }
                          else
                          {
                            $b = $q;
                            $bplus = $q;
                          }
                          echo "<option value='$q'>$b:00</option>";
                          echo "<option value='$qhalf'>$bplus:$bhalf</option>";
                        }
                  echo "
                    </select>
                  </td>
                  <td class='_Table_White'>
                    <select onchange='visualize($i)' id='selectend$i'>
                      <option selected disabled></option>
                      ";
                        for($q = 0; $q < 24; $q++)
                        {
                          $qplus = $q + 1;
                          $eplus = $e + 1;
                          $qhalf = $e + 0.5;
                          $ehalf = "30";
                          if($q >= 0 && $q <= 9)
                          {
                            $e = "0".$q;
                            $eplus = "0".$q;
                          }
                          else
                          {
                            $e = $q;
                            $eplus = $q;
                          }
                          echo "<option value='$q'>$e:00</option>";
                          echo "<option value='$qhalf'>$eplus:$ehalf</option>";
                        }
                  echo "
                    </select>
                  </td>
              </tr>
              ";
              }
              ?>
              </form>
            </tbody>
          </table>
        </div>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Container fluid  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== -->
      <footer class="footer text-center">
        Project BASF - de loonslaven
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
  <script src="../../dist/js/custom.js"></script>
</body>

</html>
