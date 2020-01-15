<?php
//start php tag
//include connect.php page for database connection
include "connect.php";
$ipaddress = $_SERVER["REMOTE_ADDR"];
$currentDateTime = date("Y-m-d H:i:s");
$strtocdate = strtotime($currentDateTime);
$data = $_GET['course'];
$course = substr("$data", 0, 7);
$strtosdate = substr("$data", 7);


//if submit is not blanked i.e. it is clicked.
if(isset($_REQUEST['submit'])!=''){

   if($_REQUEST['id_number']=='' || $_REQUEST['name']=='' || $_REQUEST['CCode']==''){
    Echo "please fill the empty field.";
    }
else
{
$sql="insert into students(date, time, id_numbers, name, ip_address, CCode) values(CURDATE(), '$currentDateTime', '".$_REQUEST['id_number']."', '".$_REQUEST['name']."', '$ipaddress', '".$_REQUEST['CCode']."')";
$res=mysqli_query($link , $sql);
if($res)
{
	echo "<script>window.open('index.html' , '_self')</script>";
 //Echo "Record successfully recorded";
}
else
{
Echo "There is some problem in inserting record";
}

}


}

?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Attendance Form</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/media-queries.css">
        <link rel="stylesheet" href="css/plugin.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/animations.css">
        <link rel="stylesheet" href="assets/css/color.css">
        <link rel="stylesheet" href="assets/css/custom-style.css">
        <link rel="stylesheet" href="assets/flexslider.css">
        <link rel="stylesheet" href="assets/css/jpreloader.css">
        <link rel="stylesheet" href="assets/css/mb.YTPlayer.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.css">
        <link rel="stylesheet" href="assets/css/media-queries.css">

        <link href="css/animate.css" rel="stylesheet" type="text/css">
    </head>

    <body>
    <br>

    <div id="wrapper">
        <div class="page-overlay">
        </div>


     <!-- header begin -->
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- logo begin -->
                        <h1 id="logo">
                            <a href="index.html">
                                <img class="logo-1" src="images/logo.png" alt="">

                            </a>
                        </h1>
                        <!-- logo close -->
                </div>
            </div>
        </header>
        <!-- header close -->

<?php
    if (isset($_GET['course']) && !empty($_GET['course']) && $strtocdate < $strtosdate) {
      ?>

      <div class="msf-container">
  	        <div class="container">
  	        	<div class="row">
  	                <div class="col-sm-12 msf-title">
  	                    <h1>Attendance Form</h1>
  	                    <p>Please complete the form below to show you attended the lecture</p>
  	                </div>
  	            </div>
                  <br>
                  <br>

  	            <div class="row">
  	                <div class="col-sm-12 msf-form">

  	                    <form role="form" action="" method="post" class="form-inline">



  				                <div class="form-group">
  				                    <label for="height">ID number:</label><br>
  				                    <input type="text" name="id_number" class="height form-control" id="id_number" maxlength="8" pattern="{8,}" required title="ID must be 8 characters" required>
  				                </div>
  				               <br>
  				                <div class="form-group">
  				                    <label for="height">Full Name</label><br>
  				                    <input  type="text" required autocomplete="on" name="name" class=" form-control " id="name" required>
                                      </div>
                                      <br>
                                       <div class="form-group">
  				                    <label for="height">Course Code</label><br>
  				                    <select name="CCode" class="form-control" readonly required>
                                <option><?php echo $course; ?></option>
                              </select>

  				                </div>



  	            			    <br>
  	            				<button name="submit" value="submit" type="submit" class="btn btn-next">Record Attendance <i class="fa fa-angle-right"></i></button>





  	                    </form>

  	                </div>
  	            </div>
              </div>
  			</div>

      <?php
    }
    else {
      echo "<div class='alert-danger'><center><h1>No more attendance is being taken.</h1></center></div>";
    }
 ?>






        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>


            <script src="assets/js/placeholder.js"></script>


    </body>

</html>
