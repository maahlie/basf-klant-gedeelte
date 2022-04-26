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
    <div class="main-wrapper">
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
                  >Voer uw klantnummer en wachtwoord in.</span
                >
              </div>
            </div>
            <!-- Form -->
            <form class="form-horizontal mt-3" id="customerloginform" action="login/customerlogin.php" method='post'>
              <div class="row pb-4">
                <div class="col-12">
                  <?php
                    if(isset($_SESSION['_customerlogin_Wronginfo'])){?>
                      <div id="customerlogin_wronginfo" class="errorstyle errorbox">
                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Onjuiste combinatie!
                      </div>
                  <?php 
                    unset($_SESSION['_customerlogin_Wronginfo']);
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
                      id='login_customernumber'
                      name='Login_Customernumber'
                      type="text"
                      class="form-control form-control-lg"
                      placeholder="Klantnummer"
                      aria-label="login_customernumber"
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
                      id='login_customerpassword'
                      name='Login_Customerpassword'
                      type="password"
                      class="form-control form-control-lg"
                      placeholder="Wachtwoord"
                      aria-label="login_customerpassword"
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
                        name="_Customer_Loginform_Submit"
                      >
                        Login
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="text-center">
              <span class="text-white"
                ><a class="no-a-style" href='employeeindex.php'><u>Inloggen als werknemer</u></a></span
              >
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
