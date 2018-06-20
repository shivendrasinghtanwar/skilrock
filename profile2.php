<?php 
session_start();
$url = 'http://localhost/skilrock/api/post/read_single.php?ID='.urlencode($_SESSION['ADMINID']);

$json = file_get_contents($url);
$arr = json_decode($json,true);
?>
<html>
<head>
	<title>Profile</title>
	<link rel="shortcut icon" type="image/icon" href="images/icon.png">
	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Main Style CSS-->
	<link rel="stylesheet" href="css/style.css">
	<!-- Responsive CSS-->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="css/font-awesome.css">
</head>
<body style="background: teal;">
<!-- Admin Header -->
<div class="container-fluid signuppanel_header">
	<div class="container">
		<div class="row"></div>
	</div>
</div>
<!-- Admin Header Close -->
<!-- Body Section Admin Login Page -->
<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-xs-1">
				<a href="" style="float: right;"><i class="fa fa-pencil fa-4x"></i></a>
			</div>
			<div class="col-md-6 col-xs-10 panel panel-default logpanel">
				<div class="row">
					<img src="images/icon.png" class="img-responsive logpanel_image ">
				</div>
				<div class="row text-center">
					<h3>Profile</h3>
				</div>
				
				<div class="row">
					<div class="col-xs-0"></div>
					<div class="col-xs-5"><h4>Name : </h4></div>
					<div class="col-xs-7"><h4><?php echo $arr['name'] ?></h4></div>
					<div class="col-xs-0"></div>
				</div>
				<div class="row">
					<div class="col-xs-0"></div>
					<div class="col-xs-5"><h4>Email : </h4></div>
					<div class="col-xs-7"><h4><?php echo $arr['email']?></h4></div>
					<div class="col-xs-0"></div>
				</div>
				<div class="row">
					<div class="col-xs-0"></div>
					<div class="col-xs-5"><h4>Mobile No. : </h4></div>
					<div class="col-xs-7"><h4><?php	echo $arr['mobile_no']  ?><?php echo $arr['image'] ?></h4></div>
					<div class="col-xs-0"></div>
				</div>
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-xs-0"></div>
					<div class="col-xs-5"><h4>Image : </h4></div>
					<div class="col-xs-7"><img src="images/profilepics/<?php echo $arr['image'];?>" class="img-responsive profile_image"></div>
					<div class="col-xs-0"></div>
				</div>
			</div>
			<div class="col-md-3 col-xs-1">
				<a href="logout.php"><i class="fa fa-sign-out fa-4x"></i></a>
			</div>
		</div>
	</div>
</div>
<!-- Body Section Admin Login Page Close-->
<!-- Script Files -->
<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
</body>
</html>



