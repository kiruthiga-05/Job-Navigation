<?php
session_start();
if(isset($_SESSION['usr_id'])!="") {
  header("Location: index.php");
}

include_once 'db_connect.php';

if(isset($_POST['submit'])){
        
$cus_name= $_POST['cus_name'];
$cus_address= $_POST['cus_address'];
$phone_no= $_POST['phone_no'];
$mail_id= $_POST['mail_id'];
$password= $_POST['password'];
$State=$_POST['State'];
$City=$_POST['City'];
$Location=$_POST['Location'];
$PostalCode=$_POST['PostalCode'];
$Status  = 'unblock';

$sql = "INSERT INTO userregistration(UserName,MailId,PhoneNumber,State,Location,City,PostalCode,Password,Status)
VALUES ('$cus_name','$mail_id','$phone_no','$State','$Location','$City','$PostalCode','$password','$Status')";

if (mysqli_query($conn, $sql)) {
    ?>
<script type="text/javascript">
alert('Data Are Inserted Successfully');
window.location.href='index.php';
</script>

<?php
} else {
  // "Error: " . $sql . "" . mysqli_error($conn);
}
$conn->close();
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
  margin-top:50px;
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
                    <label class="control-label">Customer Name:</label>
                      <input required type="text" class="form-control" name="cus_name" pattern="[a-zA-Z]+" title="Alphabets Only" >
                  </div>

                  <div class="form-group">
                    <label class="control-label">Phone no:</label>
                      <input required type="number" class="form-control"  name="phone_no">
                  </div>


                  <div class="form-group">
                    <label class="control-label">E-mail id:</label>
                      <input required type="text" class="form-control" name="mail_id">
                  </div>

                    <div class="form-group">
                    <label class="control-label">Location:</label>
                      <input required type="text" class="form-control" name="Location">
                  </div>

                      <div class="form-group">
                    <label class="control-label">City:</label>
                      <input required type="text" class="form-control" name="City" pattern="[a-zA-Z]+" title="Alphabets Only">
                  </div>
                    <div class="form-group">
                    <label class="control-label">State:</label>
                      <input required type="text" class="form-control" name="State" pattern="[a-zA-Z]+" title="Alphabets Only">
                  </div>

                  <div class="form-group">
                    <label class="control-label">PostalCode:</label>
                      <input required type="text" class="form-control" name="PostalCode">
                  </div>

                  <div class="form-group">
                    <label class="control-label">Password:</label>
                      <input required type="text" class="form-control" name="password">
                  </div>

    
                <input type="submit" value="submit" class="btn btn-info" name="submit">

                    </form>
                    <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>

                </div>
              </div>
            </div>
        </div>
    </div>


</body>
</html>	