<?php
		session_start();

        include("connect.php");
        $email = $_SESSION['email'];

        if (isset($_GET['sdate'])) {
          $sdate = $_GET['sdate'];
        }
        else{
          $sdate = date("Y-m-d h:i");
        }

        $view_users_query="Select * from students WHERE Date = '$sdate'";//select query for viewing users.
        $run = mysqli_query($link, $view_users_query);//here run the sql query.

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themifycloud.com/demos/templates/joli/maps.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2018 15:43:59 GMT -->
<head>
        <!-- META SECTION -->
        <title>AcaCell Lecturer View</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">

          <!-- START PAGE SIDEBAR -->
          <div class="page-sidebar">
              <!-- START X-NAVIGATION -->
              <ul class="x-navigation">
                  <li class="xn-logo">
                      <a href="table-export.php"><b>AcaCell</b></a>
                      <a href="#" class="x-navigation-control"></a>
                  </li>
                  <li class="xn-profile">
                      <a href="#" class="profile-mini">
                          <img src="assets/images/users/avatar.jpg" alt="Lecturer"/>
                      </a>
                      <div class="profile">
                          <div class="profile-image">
                              <img src="assets/images/users/avatar.jpg" alt="John Doe"/>
                          </div>
                              <?php
                              $ssql = "SELECT * FROM lecturer WHERE email = '$email'";
                              $ssresult = mysqli_query($link, $ssql);
                              $rowly= mysqli_fetch_assoc($ssresult);
                              ?>
                          <div class="profile-data">
                              <div class="profile-data-name"><?php echo $rowly['name']; ?></div>
                              <div class="profile-data-title"><?php echo $rowly['email']; ?></div>
                          </div>

                      </div>
                  </li>
                  <li class="xn-title"><b>COURSE CODES</b></li>
                                      <?php
                          $ssql = "SELECT * FROM lecturer WHERE email = '$email'";
                          $ssresult = mysqli_query($link, $ssql);
                          $rowly= mysqli_fetch_assoc($ssresult);
                      ?>

                  <li>
                      <a href="course1.php"><span class="fa fa-desktop"></span> <span class="xn-text"><?php echo $rowly['course1'] ?></span></a>
                  </li>

                  <?php if (!empty($rowly['course2'])) {?>
                      <li><a href="course2.php"><span class="fa fa-desktop"></span> <?php echo $rowly['course2'] ?></a></li>
                  <?php } ?>

                  <?php if (!empty($rowly['course3'])) {?>
                      <li><a href="course3.php"><span class="fa fa-desktop"></span> <?php echo $rowly['course3'] ?></a></li>
                  <?php } ?>
                          <li class="xn-title"></li>
                          <li><a href="maps.php"><span class="fa fa-map-marker"></span> MAP</a></li>
                      </ul>



              <!-- END X-NAVIGATION -->
          </div>
          <!-- END PAGE SIDEBAR -->

            <!-- PAGE CONTENT -->
            <div class="page-content">

                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                   
                   
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                    </li>
                    <!-- END SIGN OUT -->
                                   </ul>
                <!-- END X-NAVIGATION VERTICAL -->

              

                <!-- PAGE TITLE -->
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Map</h2>
                </div>
                <!-- END PAGE TITLE -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                  
                   
                       
                        <div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Google Map Search</h3>
                                    <div class="pull-right" style="width: 200px;">
                                        <input type="text" id="target" class="form-control"/>
                                    </div>
                                </div>
                                <div class="panel-body panel-body-map">
                                    <div id="google_search_map" style="width: 100%; height: 400px;"></div>
                                </div>
                            </div>

                        </div>
                   

                   
                   

                </div>
                <!-- PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="logOut.php" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

       

    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&amp;libraries=places"></script>

        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-europe-mill-en.js'></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-us-aea-en.js'></script>

        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <!-- END THIS PAGE PLUGINS-->

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>

        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/actions.js"></script>
        <script type="text/javascript" src="js/demo_maps.js"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->

    </body>

<!-- Mirrored from themifycloud.com/demos/templates/joli/maps.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2018 15:44:35 GMT -->
</html>
