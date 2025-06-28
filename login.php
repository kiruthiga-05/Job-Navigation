<?php
session_start();
if(isset($_SESSION['usr_id'])!="") {
  header("Location: index.php");
}

include_once 'db_connect.php';

//check if form is submitted
if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $query = "SELECT * FROM userregistration WHERE MailId = '" . $email. "' and Password = '" . $password. "' and Status = 'unblock' ";
  $result = mysqli_query($conn,$query);

  if ($row = mysqli_fetch_array($result)) {
     $_SESSION['usr_id'] = $row['UserId'];
     $_SESSION['usr_name'] = $row['UserName'];
    header("Location: index.php");
  } else {
    $errormsg = "Incorrect Email or Password!!!";
  }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Seeking | Login </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Seeking Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<!----font-Awesome----->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!----font-Awesome----->
<style>
.formLogin{
  margin-top:100px;
}
</style>

</head>
<body>
<?php include 'header.php'; ?>



<div class="banner">
	<div class="container">

  <div class="row formLogin">
         <div class="col-md-3 col-sm-3 col-xs-3">
         </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
           <div class="panel panel-info">
                <div class="panel-heading">
                   LogIn to your Account
                </div>
            <div class="panel-body">

            <form action = "" method = "post" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label>User Mail ID</label>
                    <input class="form-control" type="text" name="email" required />
                    <!-- <p class="help-block">Help text here.</p> -->
                </div>

                <div class="form-group">
                    <label>password</label>
                    <input class="form-control" type="password" name="password" id="myInput" required />
                    <!-- <p class="help-block">Help text here.</p> -->
                </div>

                <div class="form-group">
                     <input type="checkbox" onclick="myFunction()">Show Password
                    <!-- <p class="help-block">Help text here.</p> -->
                </div>

    
                <input type="submit" value="Login" class="btn btn-info" name="login">

                    </form>
                    <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>

                </div>
              </div>
            </div>
        </div>
    </div>



		<!-- <div id="search_wrapper">
    <div class="col-md-6 single_right">
	 	   <div class="login-form-section">
                <div class="login-content">
              <div class="section-title">
              <h3>LogIn to your Account</h3>
						</div>
						<form action="" method = "post" role="form" >
              <div class="textbox-wrap">
                  <div class="input-group">
                      <span class="input-group-addon "><i class="fa fa-user"></i></span>
                      <input type="email" required="required" class="form-control" name="email"  placeholder="Username">
                  </div>
              </div>
              <div class="textbox-wrap">
                  <div class="input-group">
                      <span class="input-group-addon "><i class="fa fa-key"></i></span>
                      <input type="password" required="required" class="form-control" name="password" placeholder="Password">
                  </div>
              </div>
						<div class="login-btn">
						<input type="submit" value="Login" name="login">
            </div>
          
					</form>
          </div> -->

  </div> 
</div>	

</body>
</html>	