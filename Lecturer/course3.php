<?php
		session_start();

        include("connect.php");
        $email = $_SESSION['email'];

        if (isset($_GET['sdate'])) {
          $sdate = $_GET['sdate'];
        }
        else{
          $sdate = date('Y-m-d');
        }

        $ssql = "SELECT * FROM lecturer WHERE email = '$email'";
        $ssresult = mysqli_query($link, $ssql);
        $rowly= mysqli_fetch_assoc($ssresult);
        $codec1 = $rowly['course1'];
        $codec2 = $rowly['course2'];
        $codec3 = $rowly['course3'];

        $view_users_query="Select * from students WHERE Date = '$sdate' AND CCode = '$codec3'";//select query for viewing users.
        $run = mysqli_query($link, $view_users_query);//here run the sql query.

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themifycloud.com/demos/templates/joli/table-export.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2018 15:40:18 GMT -->
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
                            <img src="assets/images/users/avatar.jpg" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="assets/images/users/avatar.jpg" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo $rowly['name']; ?></div>
                                <div class="profile-data-title"><?php echo $rowly['email']; ?></div>
                            </div>

                        </div>
                    </li>
                    <li class="xn-title"><b>COURSE CODES</b></li>


                    <li>
                        <a href="course1.php"><span class="fa fa-desktop"></span> <span class="xn-text"><?php echo $rowly['course1'] ?></span></a>
                    </li>

                    <?php if (!empty($rowly['course2'])) {?>
                        <li><a href="course2.php"><span class="fa fa-desktop"></span> <?php echo $rowly['course2'] ?></a></li>
                    <?php } ?>

                    <?php if (!empty($rowly['course3'])) {?>
                        <li class="active"><a href="course3.php"><span class="fa fa-desktop"></span> <?php echo $rowly['course3'] ?></a></li>
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
                    <!-- TOGGLE NAVIGATION -->


                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                    </li>
                    <!-- END SIGN OUT -->


                </ul>
                <!-- END X-NAVIGATION VERTICAL -->



                <!-- PAGE TITLE -->
                <div class="page-title">
                    <h2><span class="fa fa-users"></span> Attendance Records for <i><b><?php echo $sdate ; ?></b></i></h2>
                </div>
                <!-- END PAGE TITLE -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">



                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">


                                    <div>
                                    <div class="btn-group pull-left">
                                        <!-- Form code begins -->
                                        <form class="form-inline" method="get" action="course3.php" >
                                          <div class="form-group"> <!-- Date input -->
                                            <label class="control-label" for="date">Date :</label>
                                            <input class="form-control" name="sdate"  value="<?php echo $sdate; ?>"  type="date"/>
                                            <input class="sbtn btn-primary" type="submit" name="submit">
                                          </div>

                                        </form>
                                         <!-- Form code ends -->
                                    </div>
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">


                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'xml',escape:'false'});"><img src='img/icons/xml.png' width="24"/> XML</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'sql'});"><img src='img/icons/sql.png' width="24"/> SQL</a></li>
                                            <li class="divider"></li>

                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'txt',escape:'false'});"><img src='img/icons/txt.png' width="24"/> TXT</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='img/icons/xls.png' width="24"/> XLS</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'doc',escape:'false'});"><img src='img/icons/word.png' width="24"/> Word</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'powerpoint',escape:'false'});"><img src='img/icons/ppt.png' width="24"/> PowerPoint</a></li>
                                            <li class="divider"></li>

                                        </ul>
                                    </div>
                                </div>

                                </div>
                                <div class="panel-body">
                                    <table id="customers2" class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>Time</th>
                                                <th>ID Number</th>
                                                <th>Name</th>
                                                <th>Course Code</th>
                                                <th>IP Address</th>
                                                <th>Location</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(mysqli_num_rows($run) >0){
                                            	while($row=mysqli_fetch_array($run))
                                            	{ ?>
                                            		<tr>
                                                        <td><?php echo $row['time']; ?></td>
                                                        <td><?php echo $row['id_numbers']; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['CCode']; ?></td>
                                                        <td><?php echo $row['ip_address']; ?></td>
                                                        <td><?php echo $row['location']; ?></td>
                                                    </tr>
                                            <?php
                                            	}
                                            }
                                            else {
                                              echo "<div class='alert alert-danger'>There are no recorded class Attendance for " . $sdate ."<div>";
                                            }




                                             ?>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <!-- END DATATABLE EXPORT -->



                        </div>
                    </div>

                </div>
                <!-- END PAGE CONTENT WRAPPER -->
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
                        <p>Press No if you want to continue work. Press Yes to logout .</p>
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

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->

    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

        <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/plugins/tableexport/tableExport.js"></script>
	<script type="text/javascript" src="js/plugins/tableexport/jquery.base64.js"></script>
	<script type="text/javascript" src="js/plugins/tableexport/html2canvas.js"></script>
	<script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/sprintf.js"></script>
	<script type="text/javascript" src="js/plugins/tableexport/jspdf/jspdf.js"></script>
	<script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/base64.js"></script>
        <!-- END THIS PAGE PLUGINS-->

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>

        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/actions.js"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->
    </body>

<!-- Mirrored from themifycloud.com/demos/templates/joli/table-export.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2018 15:41:43 GMT -->
</html>
