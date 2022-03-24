<?php

session_start();

?>

<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../assets/images/favicon.png"
    />
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet" />
    <link href="../dist/css/custom.css" rel="stylesheet" />
  </head>

  <body class='noscroll'>
    <div class="main-wrapper noscroll">
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
      <!-- Preloader - style you can find in spinners.css -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Login box.scss -->
      <!-- ============================================================== -->
      <div
        class="
          auth-wrapper
          d-flex
          no-block
          justify-content-center
          align-items-center
          bg-dark
        "
      >
        <div class="auth-box bg-dark">
          <div id="loginform">
            <div class="text-center pt-3 pb-3">
              <span class="db"
                ><img src="../assets/images/basf-logo.png" alt="logo"
              /></span>
            </div>
            <div><br>
              <div class="text-center">
                <span class="text-white"
                  >Voer uw gegevens in.</span
                >
              </div>
            </div>
            <!-- Form -->
            <form class="form-horizontal mt-3" id="employeeloginform" action="login/employeelogin.php" method='post'>
              <div class="row pb-4">
                <div class="col-12">
                  <?php
                    if(isset($_SESSION['_employeelogin_Wronginfo'])){?>
                      <div id="employeelogin_wronginfo" class="errorstyle errorbox">
                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Onjuiste combinatie!
                      </div>
                  <?php 
                    unset($_SESSION['_employeelogin_Wronginfo']);
                    }
                  ?>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span
                        class="input-group-text bg-success text-white h-100"
                        id="basic-addon1"
                        ><i class="mdi mdi-account fs-4"></i
                      ></span>
                    </div>
                    <input
                      id='login_employee_email'
                      name='Login_Employee_Email'
                      type="text"
                      class="form-control form-control-lg"
                      placeholder="Email"
                      aria-label="login_employee_email"
                      aria-describedby="basic-addon1"
                      required=""
                    />
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span
                        class="input-group-text bg-warning text-white h-100"
                        id="basic-addon2"
                        ><i class="mdi mdi-lock fs-4"></i
                      ></span>
                    </div>
                    <input
                      id='login_employeepassword'
                      name='Login_Employeepassword'
                      type="password"
                      class="form-control form-control-lg"
                      placeholder="Wachtwoord"
                      aria-label="login_employeepassword"
                      aria-describedby="basic-addon1"
                      required=""
                    />
                  </div>
                </div>
              </div>
              <div class="row border-top border-secondary">
                <div class="col-12">
                  <div class="form-group">
                    <div class="pt-3">
                    <a
                        class="btn btn-info text-white"
                      >
                        Wachtwoord vergeten
                  </a>
                      <button
                        class="btn btn-success float-end text-white"
                        type="submit"
                        name="_Employee_Loginform_Submit"
                      >
                        Login
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
           <br><br><br><br>
          </div>
        </div>
      </div>
    
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
      $(".preloader").fadeOut();
      // ==============================================================
      // Login and Recover Password
      // ==============================================================
      $("#to-recover").on("click", function () {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
      });
      $("#to-login").click(function () {
        $("#recoverform").hide();
        $("#loginform").fadeIn();
      });
    </script>
  </body>
</html>
