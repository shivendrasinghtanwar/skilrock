<?php
session_start();
if(!isset($_SESSION['ADMINID']))
    {
        echo "<script>window.location='index.php'</script>";    
    }
$url = 'http://localhost/skilrock/api/post/read_single.php?ID='.urlencode($_SESSION['ADMINID']);
$json = file_get_contents($url);
$arr = json_decode($json,true);
?>
<html>
<head>
	<title>Edit Profile</title>
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
				<a href="profile.php" style="float: right;"><i class="fa fa-arrow-left fa-4x"></i></a>
			</div>
			<div class="col-md-6 col-xs-10 panel panel-default logpanel">
				<div class="row">
					<img src="images/icon.png" class="img-responsive logpanel_image ">
				</div>
				<div class="row text-center">
					<h3>Edit Profile Details</h3>
				</div>
				
				<div class="row">
					<div class="col-xs-0"></div>
					<div class="col-xs-5"><h4>Name : </h4></div>
					<div class="col-xs-7">
						<input id="name" name="name" type="text" class="form-control" required="" value="<?php echo $arr['name']; ?>">
					</div>
					<div class="col-xs-0"></div>
				</div>
				<div class="row">
					<div class="col-xs-0"></div>
					<div class="col-xs-5"><h4>Email : </h4></div>
					<div class="col-xs-7">
					<input id="email" name="email" type="text" class="form-control" required="" value="<?php echo $arr['email']; ?>"></div>
					<div class="col-xs-0"></div>
				</div>
				<div class="row">
					<div class="col-xs-0"></div>
					<div class="col-xs-5"><h4>Mobile No. : </h4></div>
					<div class="col-xs-7">
					<input id="mobile_no" name="mobile_no" type="text" class="form-control" required="" value="<?php echo $arr['mobile_no']; ?>">
					</div>
					<div class="col-xs-0"></div>
				</div>
				<!-- <div class="row" style="margin-bottom: 10px;">
					<div class="col-xs-0"></div>
					<div class="col-xs-5"><h4>Image : </h4></div>
					<div class="col-xs-7"><img src="images/profilepics/" class="img-responsive profile_image"></div>
					<div class="col-xs-0"></div>
				</div> -->
				<div class="row" style="margin-top: 10px;">
					<div class="col-xs-4"></div>
					<div class="col-xs-4">
						<button type="submit" id="save" class="btn btn-primary" style="margin-left: 10px;margin-bottom: 10px;"> Save </button>
					</div>
					<div class="col-xs-4"></div>
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
<script type="text/javascript">
	$(function(){
	var $name = $('#name');
	var $email = $('#email');
	var $mobile_no = $('#mobile_no');
	var $ID = <?php echo $_SESSION['ADMINID'] ?>
	// var $username = $('#username');
	// var $password = $('#password');
	// var $image = $('#image');

	$('#save').on('click',function(){

		var order = {
			name: $name.val(),
			email: $email.val(),
			mobile_no: $mobile_no.val(),
			ID: $ID
			// username: $username.val(),
			// password: $password.val()
		};

		var jobj = JSON.stringify(order);

		$.ajax({
			type: 'PUT',
			url: '/skilrock/api/post/update_details.php',
			data: jobj,
			contentType: "application/json",
			dataType: "json",
			success: function(){
				window.location="profile.php";
			},
			error: function(){
				alert("data not updated due to some error!");	
			}
		});
	});
});
</script>
</body>
</html>



