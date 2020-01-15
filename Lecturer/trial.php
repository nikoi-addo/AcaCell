<?php
// include "../connect.php";

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


	$course = test_input($_GET['course']);
	$a = test_input($_GET['timer']);
	$datel = date("Y-m-d H:i:s");
	$addtn = "+" . $a . " minutes";

  //Convert the variable date using strtotime and 30 minutes then format it again on the desired date format
  $add_min = date("Y-m-d H:i:s", strtotime($datel . $addtn));
	$addmin = strtotime($add_min);


	$sdata = "../attendance.php?course=" . $course . "" . $addmin;
	$sdata = test_input($sdata);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
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
				<!-- START X-NAVIGATION VERTICAL -->

				<nav class="navbar navbar-inverse">
  				<div class="container-fluid">
    				<div class="navbar-header">
							<a class="navbar-brand">Attendance for <?php echo $_GET['course']; ?></a>
    				</div>


							<!-- SIGN OUT -->
							<ul class="nav navbar-nav navbar-right">
									<a class="navbar-brand" href="table-export.php"><span class="fa fa-home"></span></a>
    				</ul>
						<!-- END SIGN OUT -->

  			</div>
			</nav>

			<div><center><b>
				The attendance is availabe for only <?php echo $_GET['timer']; ?> minutes.<a href="<?php echo $sdata; ?>">Here</a></b></center>
			</div>
			<center><div>
				<iframe width=1000px height=1000px src="../phpqrcode/index.php?data=<?php echo $sdata; ?>" style="border: none" align="center"></iframe>
			</div></center>


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
	        <!-- <script type="text/javascript" src="js/settings.js"></script>

	        <script type="text/javascript" src="js/plugins.js"></script>
	        <script type="text/javascript" src="js/actions.js"></script> -->
	        <!-- END TEMPLATE -->
	    <!-- END SCRIPTS -->
	</body>
</html>
