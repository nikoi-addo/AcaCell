<?php
//start php tag
//include connect.php page for database connection
include "connect.php";

//if submit is not blanked i.e. it is clicked.
if(isset($_REQUEST['submit'])!=''){

   if($_REQUEST['name']=='' || $_REQUEST['email']=='' || $_REQUEST['password']=='' || $_REQUEST['c1']==''){
    Echo "please fill the empty field.";
    }
else
{
$sql="insert into lecturer(name,email,password,course1,course2,course3) values('".$_REQUEST['name']."', '".$_REQUEST['email']."', '".$_REQUEST['password']."', '".$_REQUEST['c1']."','".$_REQUEST['c2']."','".$_REQUEST['c3']."')";
$res=mysqli_query($link , $sql);
if($res)
{
	echo "<script>window.open('signin.php' , '_self')</script>";
 //Echo "Record successfully inserted";
}
else
{
Echo "There is some problem in inserting record";
}

}
}

?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    
<!-- Mirrored from themifycloud.com/demos/templates/joli/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2018 15:38:43 GMT -->
<head>        
        <!-- META SECTION -->
        <title>Lecturer Sign Up</title>            
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
                    <div class="login-title"><strong>Welcome</strong>, Please Sign Up</div>
                    <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="name" class="form-control" placeholder="Full Name" required/>
                        </div>
                    </div>
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
                        <div class="col-md-12">
                            <input type="text"  name="c1" class="form-control" placeholder="Course Code eg: CSIT 101" required/>
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="c2" class="form-control" placeholder="Course Code eg: CSIT 101"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="c3" class="form-control" placeholder="Course Code eg: CSIT 101"/>
                        </div>
                    </div>
                    <div class="form-group">
                        
                        <div class="col-md-6">
                            <button name="submit" value="submit" type="submit" class="btn btn-info btn-block">Sign Up</button>
                        </div>
                    </div>
                    </form>
                </div>
               
            </div>
            
        </div>
        
    </body>

<!-- Mirrored from themifycloud.com/demos/templates/joli/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2018 15:38:43 GMT -->
</html>
