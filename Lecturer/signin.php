<?php
	//Start the Session
	// include "connect.php";
	session_start();
	$conn = mysqli_connect("localhost","root","1200secs","acacell members");
	// require('connect.php');

	if (isset($_POST['email']) and isset($_POST['password'])){

	$email = $_POST['email'];

	$password = $_POST['password'];

	$query = "SELECT * FROM `lecturer` WHERE email='$email' and password='$password'";

	$result = mysqli_query($conn, $query) or die(mysql_error());

	$count = mysqli_num_rows($result);

	if ($count == 1){

	$_SESSION['email'] = $email;
	echo "<script>window.open('table-export.php' , '_self')</script>";

	} else {
	echo "Invalid email or password.";

		}

	}

?>


<!DOCTYPE html>
<html lang="en" class="body-full-height">

<!-- Mirrored from themifycloud.com/demos/templates/joli/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2018 15:38:43 GMT -->
<head>
        <!-- META SECTION -->
        <title>Lecturer Sign In</title>
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

        <div class="login-container">

            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Welcome</strong>, Please Sign In</div>
                    <form action="" class="form-horizontal" method="post">

                     <div class="form-group">
                        <div class="col-md-12">
                            <input type="email" name="email" class="form-control" placeholder="Email" required/>
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password" class="form-control" placeholder="Password" required/>
                        </div>
                    </div>



                    <div class="form-group">

                        <div class="col-md-6">
                            <button name="submit" value="submit" type="submit" class="btn btn-info btn-block">Login</button>
                        </div>

                    </div>
                    </form>
                </div>

            </div>

        </div>

    </body>

<!-- Mirrored from themifycloud.com/demos/templates/joli/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2018 15:38:43 GMT -->
</html>
