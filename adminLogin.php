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
  $result = mysqli_query($conn, "SELECT * FROM userregistration WHERE UserName = '" . $email. "' and Password = '" . $password. "' and Status = 'unblock' ");

  if ($row = mysqli_fetch_array($result)) {
     $_SESSION['usr_id'] = $row['UserId'];
     $_SESSION['usr_name'] = $row['UserName'];
    header("Location: index.php");
  } else {
    $errormsg = "Incorrect Email or Password!!!";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <script src="assets/jquery-3.3.1.slim.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>



</head>
<body>             

     <!-- MENU SECTION END-->
<div class="content-wrapper">
     <div class="container">
    <div class="row pad-botm">
        <div class="col-md-12">
            <h4 class="header-line">Customer Login Form</h4>
        </div>

</div>

     <div class="row">
         <div class="col-md-3 col-sm-3 col-xs-3">
         </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
           <div class="panel panel-info">
                        <div class="panel-heading">
                           Customer LOGIN FORM
                        </div>
            <div class="panel-body">

            <form action = "" method = "post" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Customer User Name</label>
                    <input class="form-control" type="text" name="email" required />
                    <!-- <p class="help-block">Help text here.</p> -->
                </div>

                <div class="form-group">
                    <label>Customer password</label>
                    <input class="form-control" type="password" name="password" id="myInput" required />
                    <!-- <p class="help-block">Help text here.</p> -->
                </div>

                <div class="form-group">
                     <input type="checkbox" onclick="myFunction()">Show Password
                    <!-- <p class="help-block">Help text here.</p> -->
                </div>

<!-- show password -->
<script type="text/javascript">
function myFunction() {
var x = document.getElementById("myInput");
if (x.type === "password") {
x.type = "text";
} else {
x.type = "password";
}
}
</script>
                           
                  
                    <input type="submit" value="Login" class="btn btn-info" name="login">

                    </form>
                    <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>

                </div>
                        </div>
            </div>
        </div>
    </div>
</div>


       
</body>
</html>
