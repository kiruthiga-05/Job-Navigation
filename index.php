<?php
session_start();
include_once 'db_connect.php';
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Seeking | Home </title>
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

<div class="banner">
	<div class="container">
		<div id="search_wrapper">
		 <div id="search_form" class="clearfix">
		 <h1>Start your Seeking search</h1>
		    <p>
				
			<form action = "seekingAll.php" method = "post" role="form">
			 <input type="text" class="text" placeholder="Enter Keyword(s)" name="Keyword" >
			 <!-- <input type="text" class="text" placeholder="location" name="location" > -->
			 <label class="btn2 btn-2 btn2-1b"><input type="submit"  name="search" value="Find Seeking"></label>
			</form>

			</p>
            <h2 class="title">top Catageory &amp; searches</h2>
         </div>
		 <div id="city_1" class="clearfix">
			 <ul class="orange">
			<?php 
			$sql = mysqli_query($conn, "SELECT * FROM job_type");
			while ($row = $sql->fetch_assoc()){
			echo "
			<li>
			<a href=''>" . $row['job_type'] . "</a>
			</li>
			";
			}
			?>
			 </ul>
	     </div>
       </div>
   </div> 
</div>	

</body>
</html>	