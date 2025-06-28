<?php
session_start();
include "db_connect.php";

if(isset($_POST['comment'])){
$name=$_POST['Name'];
$mail=$_POST['Email'];
$message=$_POST['message'];
$status = "unblock";

$sql="INSERT INTO commend(`name`, `mail`, `message`, `status`) 
values ('$name','$mail','$message','$status')";

$insert=mysqli_query($conn, $sql);
if($insert){
?>
<script>alert('Comment Successfully..');</script>
<?php
}
else
{
// echo "Error: " . $sql . "" . mysqli_error($conn);
}
}
	


if(isset($_GET['id']) & !empty($_GET['id'])){
$id = $_GET['id'];  
$show=mysqli_query($conn,"select * from employee where id = '$id' ");
$row=mysqli_fetch_array($show);
}else{
echo "Could not get name";
}

if(isset($_POST['order']))
{
$empId=$_POST['id'];
$from=$_POST['from'];
$to=$_POST['to'];

$days=$_POST['days'];
$amount=$_POST['amount'];
$name=$_POST['name'];
$cardNo=$_POST['cardNo'];
$expiration=$_POST['expiration'];
$csv=$_POST['csv'];

$cusid = $_SESSION['usr_id'];
$status = 'pending';
$empStatus = 'pending';
$orderdate = date("Y-m-d");

$sql="INSERT INTO ordertable(`customerId`, `employee_id`, `status`, `request_date`, `emp_status`, `from_date`, `to_data`, `days`, `amount`, `name`, `cardNo`, `expiration`, `csv` ) 
values('$cusid','$empId','$status','$orderdate','$empStatus','$from','$to','$days','$amount','$name','$cardNo','$expiration','$csv')";

$insert=mysqli_query($conn, $sql);

if($insert){
?>
<script>alert('Your Request is taken..');</script>
<script>window.open('request.php','_self')</script>;
<?php
}
else
{
echo "Error: " . $sql . "" . mysqli_error($conn);
}

}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Seeking | Service </title>
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
       <div class="box_1">
       	<h3><?php echo $row['name']; ?> ( <?php echo $row['job_type']; ?> )</h3>
        <div class="col-md-5">
<?php 
echo '<img alt="no img is found" class="img-responsive" src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/>'
?>
        </div>
        <div class="col-md-7 service_box1">

		<h4>Per day salary ( Rs <?php echo $row['day_salary']; ?> )</h4>
			<?php echo $row['job_desc']; ?>
        </div>
        <div class="clearfix"> </div>
       </div>
       <div class="box_2">
       	<h3>Employee Details</h3>
       	<div class="col-md-4 icon-service">
       		<div class="icon">
				<i class="fa fa-calendar"></i>
			</div>
			<div class="icon-box-body">
				<h4>Content Number</h4>
				<p>+91 <?php echo $row['phone_no']; ?></p>
			</div>
		</div>
       	<div class="col-md-4 icon-service">
       		<div class="icon">
				<i class="fa fa-lightbulb-o"></i>
			</div>
			<div class="icon-box-body">
				<h4>Mail Id</h4>
				<p><?php echo $row['mail_id']; ?></p>
			</div>
		</div>
		
       	<div class="col-md-4 icon-service">
       		<div class="icon">
				<i class="fa fa-briefcase"></i>
			</div>
			<div class="icon-box-body">
				<h4>Job Experience</h4>
				<p><?php echo $row['job_experience']; ?></p>
			</div>
		</div>
	
		<div class="col-md-12 icon-service">
       		<div class="icon">
				<i class="fa fa-flash"></i>
			</div>
			<div class="icon-box-body">
				<h4>Address</h4>
				<p><?php echo $row['address']; ?></p>
				<p><?php echo $row['land_mark']; ?></p>
				<p><?php echo $row['district']; ?></p>
				<p><?php echo $row['state']; ?> - <?php echo $row['postcode']; ?> </p>
			</div>
		</div>

	<a href="#" class="btn btn-default pull-left" data-toggle="modal" data-target="#applyModal">Request</a>


	<!-- Modal -->
	<div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel">Request for this Seeking</h4>					
				</div>
				<div class="modal-body">
				<form  action = "" method = "post" role="form"> 
					<input type="text" name="id" value="<?php echo $row['id']; ?>" hidden>

					<div class="form-group">
						<label>From Date</label>
						<input class="form-control" type="date" name="from"  id="TextBox1" required />
					</div>
					<div class="form-group">
						<label>To Date</label>
						<input class="form-control" type="date" name="to" id="TextBox2"  onchange="date_diff_indays()" required />
					</div>

				<div id="requestView">

					<div class="form-group">
						<label>Days</label>
						<input class="form-control" type="text" id="TextBox3" name="days" required />
						<input class="form-control"  type="hidden" id="salary" value= "<?php echo $row['day_salary']; ?>"  />
					</div>

					<div class="form-group">
						<label>Amount</label>
						<input class="form-control" type="text"  id="TextBox4" name="amount" required />
					</div>
					<div class="form-group">
						<label>Name</label>
						<input class="form-control" type="text" name="name" required />
					</div>
					<div class="form-group">
						<label>Card Number</label>
						<input class="form-control" type="text" name="cardNo" required />
					</div>
					<div class="form-group">
						<label>Expiration (mm/yy) </label>
						<input class="form-control" type="text" name="expiration" required />
					</div>
					<div class="form-group">
						<label>Security Code</label>
						<input class="form-control" type="text" name="csv" required />
					</div>

					<div class="form-submit1 ">
						<input type="submit" id="submit" name="order" value="Request"><br>
					</div>

				</div>

				
					</form>
				</div>
			</div>
		</div>
	</div>

<script>

var x = document.getElementById("requestView");
x.style.display = "none";


function date_diff_indays () {

var from = document.getElementById("TextBox1").value;
var to = document.getElementById("TextBox2").value;
var perday = document.getElementById("salary").value;
console.log(perday);

let dt1 = new Date(from);
let dt2 = new Date(to);
var result =  Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24));
console.log(result);

if(result>0){
	x.style.display = "block";
}else{
	alert("Please pick Correct Data");
	x.style.display = "none";
}


document.getElementById("TextBox3").value = result;
var amount = perday*result;
document.getElementById("TextBox4").value = amount;


}

</script>

<div class="clearfix"> </div>
</div>

       <div class="box_3">
			 <h3>Clients say</h3>
			 
			 <div class="comments">

			<?php        
			$sql = "SELECT * FROM `commend` where  status = 'unblock'  ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
			?>

			<div class="media media_1">
			  <div class="media-left"><a > </a></div>
			  <div class="media-body">
				<h4 class="media-heading"><a class="author" ><?php echo $row["name"]; ?></a>
				<div class="clearfix"> </div></h4>
			    <?php echo $row["message"]; ?>
			  </div>
			  <div class="clearfix"> </div>
			</div>

			<?php
			}
			}
			?>

		  </div>



		  <form action = "" method = "post" role="form">
			<div class="to">
				
			<div class="form-group">
				<input class="form-control text" type="text" placeholder="Name" name="Name" required />
			</div>

			<div class="form-group">
				<input class="form-control text" type="text" placeholder="Email" name="Email" required  style="margin-left:3%" />
			</div>

			</div>
			<div class="text">

			<div class="form-group">
				<textarea class="form-control" placeholder='Message' rows="3" name="message" required ></textarea>
			</div>

            </div>
            <div class="form-submit1">
	           <input name="comment" type="submit" id="submit" value="Submit"><br>
	        </div>
			<div class="clearfix"></div>
		  </form>
		  
		  
		 <div class="clearfix"> </div>
       </div>
	</div>
</div>

</body>
</html>	