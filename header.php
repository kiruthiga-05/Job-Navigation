<?php
/*session_start();*/
include_once 'db_connect.php';
?>

<nav class="navbar navbar-default" role="navigation">
	<div class="container">
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	        </button>
	        <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt=""/></a>
	    </div>
	    <!--/.navbar-header-->
	    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
	        <ul class="nav navbar-nav">

				<li><a href="seekingAll.php">ALL SERVICES</a></li>
			

				<?php if (isset($_SESSION['usr_id'])) { ?>
					<li><a href="request.php">Request</a></li>
					<li><a href="#">Signed in as <?php echo $_SESSION['usr_name']; ?></a></li>
					<li><a href="logout.php">Log Out</a></li>
				<?php } else { ?>
					<li><a href="login.php">Login</a></li>
					<li><a href="customer reg.php">Sign Up</a></li>
				<?php } ?>
				
	        </ul>
	    </div>
	    <div class="clearfix"> </div>
	  </div>
	    <!--/.navbar-collapse-->
	</nav>


