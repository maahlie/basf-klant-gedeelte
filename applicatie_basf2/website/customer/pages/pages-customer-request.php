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
    <link
      href="../../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css"
      rel="stylesheet"
    />
    <script>

      function submitUpdate() {
        let columnTable = document.getElementsByClassName("editTd");
        let task_list = document.getElementsByClassName("_task_dropdown");
        let columnTxb = document.getElementsByClassName("updateTxb");

        let test = task_list[i].options[task_list[i.selectedIndex]].value;


        for (let i = 0; i < columnTable.length; i++) {
          columnTxb[i].value = columnTable[i].innerHTML;
        }
      }

      function hideForm() {
        let column = document.getElementsByClassName("editTd");
        let confirm_btn = document.getElementsByClassName("btn_confirm");
        let delete_btn = document.getElementsByClassName("btn_delete");
        let edit_btn = document.getElementById("edit_btn");
        let thing = document.getElementById("editing");
        let task_list = document.getElementsByClassName("_task_dropdown");
        let crop_name = document.getElementsByClassName("_crop_name");

        if(column[0].contentEditable  == 'false')
        {

          edit_btn.innerHTML = "Stop";
          edit_btn.style.color = "red";
          thing.style.display = 'inline';

          for (let i = 0; i < column.length; i++) 
          {
            column[i].contentEditable  = 'true';
            column[i].style.backgroundColor  = '#d9d9d9';
          }

          for (let i = 0; i < confirm_btn.length; i++)
          {
            confirm_btn[i].style.display = 'inline';
            delete_btn[i].style.display = 'none';
            confirm_btn[i].style.backgroundColor = 'green';
            confirm_btn[i].style.borderColor = 'green';
            task_list[i].style.display = 'inline';
            crop_name[i].style.display = 'none';
          }
        } else {

          edit_btn.innerHTML = "Bewerk";
          edit_btn.style.color = "";
          thing.style.display = 'none';

          for (let i = 0; i < column.length; i++) 
          {
            column[i].contentEditable  = 'false';
            column[i].style.backgroundColor  = '';
          }

          for (let i = 0; i < confirm_btn.length; i++)
          {
            confirm_btn[i].style.display = 'none';
            delete_btn[i].style.display = 'inline';
            delete_btn[i].style.backgroundColor = '';
            task_list[i].style.display = 'none';
            crop_name[i].style.display = 'inline';
          }
        }    
      }
    </script>
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
              <h4 class="page-title">Vraag werknemers aan voor uw werkzaamheden.</h4>
            </div>
          </div>
        </div>
        <!-- Container fluid  -->
        <div class="container-fluid">
          <div class="row">
            <!-- column -->

            <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="../planning/request-employees.php" method="post"> 
                  <div class="card-body">
                    <h4 class="card-title">Werk indeling</h4><br>
                  <div class="col-lg-6">
                  
                  <div class="form-group row">
                  <label
                     for="fname">Week </label>
                      <div class="col-sm-9">
                    <input
                      type="number"
                      class="form-control"
                      id="fname"
                      placeholder="..."
                      min="1"
                      max="52"
                      name="_task_Force"
                     />
                   </div>
                 </div>          
               <label>Gewas</label>
                  <div class="input-group">
                  <input list="crop" class="form-control" placeholder="...">
                    <datalist id="crop">

                    </datalist>
                  </div>
                </div><br>
                <div class="form-group row">
                 <label
                   for="cono1">Werkindeling</label>
                   <div class="col-lg-6">
                   <div class="table-responsive">   
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Ma.</th>
                          <th>Di.</th>
                          <th>Wo.</th>
                          <th>Do.</th>
                          <th>Vr.</th>
                          <th>Za.</th>
                          <th>Zo.</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th>Joep<br>Ton<br>Egbert</th>
                          <th>Joep<br>Ton<br>Egbert</th>
                          <th>Joep<br>Ton<br>Egbert</th>
                          <th>Gijs<br>Rick<br>Joop</th>
                          <th>Gijs<br>Rick<br>Joop</th>
                          <th>Ricardo<br>Guy<br>Tom</th>
                          <th>Ricardo<br>Guy<br>Tom</th>
                        </tr>
                      </tbody>
                    </table> 
                  </div>
                </div>
                  <div class="border-top">
                    <div class="card-body">
                      <button type="submit" class="btn btn-primary" name="_submit_Task">
                        Toon werkindeling
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
            
            <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="../planning/request-employees.php" method="post"> 
                  <div class="card-body">
                    <h4 class="card-title">Aanvraag maken</h4><br>
                  <div class="col-lg-6">
                  
                  <div class="form-group row">
                  <label
                     for="fname">Hoeveel werknemers zijn er nodig</label>
                      <div class="col-sm-9">
                    <input
                      type="number"
                      class="form-control"
                      id="fname"
                      placeholder="5, 10, 20"
                      min="1"
                      max="100"
                      name="_task_Force"
                      required
                     />
                   </div>
                 </div>          
                 <label>Gewas</label>
                  <div class="input-group">
                    <select id="crop" name="_crop" class="form-control">
                      <?php      
                            $list = $_user->requestDataWhere("departmentID, departmentName", "department", "customerID", $_user->getTableID());
                            $row = $list->fetch_all();
                            
                            for($i=0; $i<$list->num_rows; $i++)
                            {
                              echo '<option value="' . $row[$i][0] . '">' . $row[$i][1] . '</option>';
                            }
                      ?>
                    </select>
                  </div><br>
                  <label>Werkzaamheid</label>
                  <div class="input-group">
                    <select id="work" name="_work_comp" class="form-control">
                      <?php
                        $db = new DataBase();
                        $list = $db->getData("workCompName", "workcomp");

                        $row = $list->fetch_all();
                        
                        for($i=0; $i<$list->num_rows; $i++)
                        {
                          echo '<option value="' . $row[$i][0] . '">' . $row[$i][0] . '</option>';
                        }
                      ?>
                    </select>
                  </div><br>
               <label>Datum werkzaamheden</label>
                  <div class="input-group">
                    <input
                      type="date"
                      class="form-control mydatepicker"
                      placeholder="mm/dd/yyyy"
                      min="<?= date('Y-m-d'); ?>"
                      name="_task_Date"
                      required
                    />
                  </div>
                </div><br>
                <div class="form-group row">
                 <label
                   for="cono1">Aanvullende informatie / omschrijving</label>
                      <div class="col-sm-9">
                        <textarea class="form-control"
                          name="_task_Description"></textarea>
                      </div>
                    </div>

                  </div>
                  <div class="border-top">
                    <div class="card-body">
                      <button type="submit" class="btn btn-primary" name="_submit_Request">
                        Verzend
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
              <!-- card -->

              <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Huidige aanvragen <span id="editing" style="display: none; color:darkblue;">bewerken</span></h4>
                  <button onclick="hideForm();" class="btn">
                  <h7 id="edit_btn" class="card-title">Bewerk</h7>
                  </button>
                <div class="col-lg-6">
                <div class="table-responsive">   <br>
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>Datum</th>
                          <th>Personeel</th>
                          <th>Gewas</th>
                          <th>Werkzaamheid</th>
                          <th>Omschrijving</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 

                        $test= $_user->getTableID();
                          $_result = $_user->requestDataWhere("*", "task", "userID", $_user->getTableID());

                          $_list_dep = $_user->requestData("*", "department");
                          while($_res2 = mysqli_fetch_array($_list_dep)){
                            $_departments[$_res2['departmentID']] = $_res2['departmentName'];
                          }

                          while ($_res = mysqli_fetch_array($_result)) 
                          {
                            // Haal de tijd van de Unix Epoch (1 Jan 1970) tot nu op in dagen
														$_now = date('U') / 86400;

                            $_date = $_res["date"];
                            $_force = $_res["reqStaff"];
                            $_desrciption = $_res["descr"];
                            $_crop = $_departments[$_res['departmentID']];
                            $_work = $_res["workCompName"];

                            $_date_time = strtotime($_date);
														// Vervorm de Unix Epoch (1 Jan 1970) tot de boeking datum om in dagen
														$_date_time = date('U', $_date_time) / 86400;

                            if (($_date_time - $_now) > 0) {
                              echo
                              "<tr>
                              <form action='../planning/request-employees.php' method='post'>  
                                <td class='editTd' contenteditable='false'>". $_date. "</td>        <input type='hidden' class='updateTxb' id='_date' name='_date' value=''>
                                <td class='editTd' contenteditable='false'>". $_force. "</td>       <input type='hidden' class='updateTxb' id='_force' name='_force' value=''>
                                <td class='editTd' contenteditable='false'>
                                <select id='crop' name='_crop' style='display: none;' class='form-control input-group _task_dropdown'>";

                                $list = $_user->requestDataWhere('departmentID, departmentName', 'department', 'customerID', $_user->getTableID());
                                $row = $list->fetch_all();
                                
                                for($i=0; $i<$list->num_rows; $i++)
                                {
                                  echo '<option value="' . $row[$i][0] . '">' . $row[$i][1] . '</option>';
                                } 

                                echo 
                                "</select><span class='_crop_name' style='display: inline;'>". $_crop. "</span>
                                </td>        <input type='hidden' class='updateTxb' id='_crop' name='_crop' value=''>
                                <td class='editTd' contenteditable='false'>". $_work. "</td>        <input type='hidden' class='updateTxb' id='_work' name='_work' value=''>
                                <td class='editTd' contenteditable='false'>". $_desrciption. "</td> <input type='hidden' class='updateTxb' id='_desrciption' name='_desrciption' value=''>
                                <td>
                                    <button type='submit' class='btn btn-danger btn_confirm' name='_confirm_change' value='". $_res["taskID"]. "' id='confirm_btn' onclick='submitUpdate();' style='display: none;' ><i class='fas fa-check'></i></button>
                                    <button type='submit' class='btn btn-danger btn_delete' name='_delete_Task' value='". $_res["taskID"]. "' id='delete_btn' onClick=\"javascript: return confirm('Bevestig verwijdering');\"><i class='fas fa-trash'></i></button>
                                  </form>
                                </td>
                              </tr>";
                            }
                          }
                        ?>
                      </tbody>
                      <tfoot>
                        <tr>
                        <th>Datum</th>
                          <th>Personeel</th>
                          <th>Gewas</th>
                          <th>Werkzaamheid</th>
                          <th>Omschrijving</th>
                          <th></th>
                        </tr>
                      </tfoot>
                    </table> 
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
