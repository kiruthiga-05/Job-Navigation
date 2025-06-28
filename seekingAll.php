<?php
session_start();
include_once 'db_connect.php';




?>

<!DOCTYPE HTML>
<html>
<head>
<title>Seeking | Follow_Single </title>
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
</head>
<body>

<?php include 'header.php'; ?>

<div class="banner_1">
	<div class="container">
		<div id="search_wrapper1">
		   		   <!-- <div id="search_form" class="clearfix">
		    <h1>Start your job search</h1>
		    <p>
			 <input type="text" class="text" placeholder=" " value="Enter Keyword(s)" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Keyword(s)';}">
			 <input type="text" class="text" placeholder=" " value="Location" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Location';}">
			 <label class="btn2 btn-2 btn2-1b"><input type="submit" value="Find Jobs"></label>
			</p>
           </div> -->
		</div>
   </div> 
</div>	

<div class="container">
    <div class="single">  
        <div class="col-sm-12 follow_left">
			<h3>Services</h3>
			
<?php


if(isset($_POST['search'])){

$Keyword=$_POST['Keyword'];
$location=$_POST['location'];

$sql = "SELECT * FROM employee where status = 'unblock' 
	AND name LIKE '$Keyword'
	OR phone_no LIKE '$Keyword'
	OR job_type LIKE '$Keyword'
	OR job_desc LIKE '$Keyword'
	OR address LIKE '$Keyword'
	OR district LIKE '$Keyword'
	OR state LIKE '$Keyword'
	OR land_mark LIKE '$Keyword'
	OR postcode LIKE '$Keyword'
	";

}else{
	$sql = "SELECT * FROM employee where status = 'unblock' ";
}
// echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>

<div class="jobs_follow jobs-single-item">
	<div class="thumb"><img src="images/a1.jpg" class="img-responsive" alt=""/></div>
	<div class="thumb_right">
	<div class="date">Experenece<span><?php echo $row['job_experience']; ?></span></div>
	<h6 class="title"><a href="#"><?php echo $row['name']; ?></a></h6>
	<span class="meta"><?php echo $row['district']; ?>, <?php echo $row['state']; ?></span>
	<ul class="top-btns">
		<li>
			<a href="#" class="btn_1 fa fa-star-o icon_2"></a>
		</li>
	</ul>
	<h4><?php echo $row['job_type']; ?></h4>
	<p><?php echo $row['job_desc']; ?>	</p>
	<hr>

	<?php if (isset($_SESSION['usr_id'])) { ?>
		<a href="single.php?id=<?php echo $row['id']; ?>" class="btn btn-default pull-left" >Know More...</a>
	<?php } else { ?>
		<a href="#" class="btn btn-default pull-left" data-toggle="modal" data-target="#applyModal">Know More...</a>
	<?php } ?>

	<!-- Modal -->
	<div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel">Apply for this Seeking</h4>
				</div>
				<div class="modal-body">
					Before you apply you have to login as a candidate	user		
					<p><a href="login.php">Log in</a></p>
				</div>
			</div>
		</div>
	</div>

	<ul class="social-icons pull-right">
		<li><span>Per day Salary : </span></li>
		<li>RS <?php echo $row['day_salary']; ?></li>
	</ul>
	<div class="clearfix"> </div>
</div>
<div class="clearfix"> </div>
</div>

<?php
}
}
?>


		
	</div>
</div>

</body>
</html>	