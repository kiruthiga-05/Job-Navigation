<?php
   session_start();
    include "db_connect.php";
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Seeking | Location </title>
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
 
<?php
 include 'header.php'; 
 ?>

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
	
	 <div class="col-md-12 single_right">
	      <div class="but_list">
	       <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">

<ul id="myTab" class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active">
        <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
            Pending</a></li>
    <li role="presentation">
        <a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Accepted</a>
    </li>
    <li role="presentation">
        <a href="#reject" role="tab" id="reject-tab" data-toggle="tab" aria-controls="reject">Reject</a>
    </li>
</ul>
            
		<div id="myTabContent" class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
            
<?php
$cusid = $_SESSION['usr_id'];                            

$sql = "select * from employee where id in ( select employee_id from ordertable where customerId = '$cusid' AND status = 'pending' )";
$result = $conn->query($sql); 

$sqlOrder = "select * from ordertable where customerId = '$cusid' ";
$resultOrder = mysqli_query($conn, $sqlOrder);
$rowOrder = mysqli_fetch_array($resultOrder);

if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {

?>
<div class="tab_grid">
    <div class="col-sm-3 loc_1">
        <a href="single.php?id=<?php echo $row['id']; ?>">

<?php 
echo '<img alt="no img is found" class="img-responsive" src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/>'
?>
        </a>
    </div>

    <div class="col-sm-9">
        <div class="location_box1">
            <h6><a href="single.php?id=<?php echo $row['id']; ?>">
            <?php echo $row['job_type']; ?> </a>
            <span class="m_1"><?php echo $row['name']; ?></span></h6>
            <p><span class="m_2">Location : </span>
                <?php echo $row['address']; ?>
            </p>

            <ul class="links_bottom">
            <li><a href="single.php?id=<?php echo $row['id']; ?>">
            <i class="fa fa-envelope-o icon_1"> </i><span class="icon_text">
                <?php echo $rowOrder['from_date']; ?> To  <?php echo $rowOrder['to_data']; ?>
            </span></a></li>

            <li><a href="single.php?id=<?php echo $row['id']; ?>">
            <i class="fa fa-eye icon_1"> </i><span class="icon_text">View full Description</span></a></li>
           
            </ul>
        </div>
    </div>
    <div class="clearfix"> </div>
    </div>
<?php
}
}
?>
</div>
          



<!-- accepeted -->
<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
<?php
$cusid = $_SESSION['usr_id'];                            

$sql = "select * from ordertable where customerId = '$cusid' AND status = 'approved' ";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {

$sqlOrder = "select * from employee where id =".$row['employee_id'];
$resultOrder = mysqli_query($conn, $sqlOrder);
$rowOrder = mysqli_fetch_array($resultOrder);

?>
<div class="tab_grid">
    <div class="col-sm-3 loc_1">
        <a href="single.php?id=<?php echo $rowOrder['id']; ?>">

<?php 
echo '<img alt="no img is found" class="img-responsive" src="data:image/jpeg;base64,'.base64_encode($rowOrder['image']).'"/>'
?>
        </a>
    </div>

    <div class="col-sm-9">
        <div class="location_box1">
            <h6><a href="single.php?id=<?php echo $rowOrder['id']; ?>">
            <?php echo $rowOrder['job_type']; ?> </a>
            <span class="m_1"><?php echo $rowOrder['name']; ?></span></h6>
            <p><span class="m_2">Location : </span>
                <?php echo $rowOrder['address']; ?>
            </p>

            <ul class="links_bottom">
            <li><a href="single.php?id=<?php echo $rowOrder['id']; ?>">
            <i class="fa fa-envelope-o icon_1"> </i><span class="icon_text">
                <?php echo $row['from_date']; ?> To  <?php echo $row['to_data']; ?>
            </span></a></li>

            <li><a href="single.php?id=<?php echo $rowOrder['id']; ?>">
            <i class="fa fa-eye icon_1"> </i><span class="icon_text">View full Description</span></a></li>
           
            </ul>
        </div>
    </div>
    <div class="clearfix"> </div>
    </div>
<?php
}
}
?>
</div>




<!-- reject -->
<div role="tabpanel" class="tab-pane fade" id="reject" aria-labelledby="reject-tab">
<?php
$cusid = $_SESSION['usr_id'];                            

$sql = "select * from employee where id in ( select employee_id from ordertable where customerId = '$cusid' AND status = 'reject' )";
$result = $conn->query($sql);

$sqlOrder = "select * from ordertable where customerId = '$cusid' ";
$resultOrder = mysqli_query($conn, $sqlOrder);
$rowOrder = mysqli_fetch_array($resultOrder);

if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {

?>
<div class="tab_grid">
    <div class="col-sm-3 loc_1">
        <a href="single.php?id=<?php echo $row['id']; ?>">

<?php 
echo '<img alt="no img is found" class="img-responsive" src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/>'
?>
        </a>
    </div>

    <div class="col-sm-9">
        <div class="location_box1">
            <h6><a href="single.php?id=<?php echo $row['id']; ?>">
            <?php echo $row['job_type']; ?> </a>
            <span class="m_1"><?php echo $row['name']; ?></span></h6>
            <p><span class="m_2">Location : </span>
                <?php echo $row['address']; ?>
            </p>

            <ul class="links_bottom">
            <li><a href="single.php?id=<?php echo $row['id']; ?>">
            <i class="fa fa-envelope-o icon_1"> </i><span class="icon_text">
                <?php echo $rowOrder['from_date']; ?> To  <?php echo $rowOrder['to_data']; ?>
            </span></a></li>

            <li><a href="single.php?id=<?php echo $row['id']; ?>">
            <i class="fa fa-eye icon_1"> </i><span class="icon_text">View full Description</span></a></li>
           
            </ul>
        </div>
    </div>
    <div class="clearfix"> </div>
    </div>
<?php
}
}
?>
</div>


     </div>
    </div>
   </div>
  <div class="clearfix"> </div>
 </div>
</div>


</body>
</html>	