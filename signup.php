<!-- <?php
// $con=mysqli_connect("localhost","root","","skilrock");

// if(isset($_POST['name']))
// {
// 	$pname = $_FILES['image']['name'];
//     $tpath = $_FILES['image']['tmp_name'];
//     $path = "images/profilepics/".$pname;
//     move_uploaded_file($tpath, $path);
// 	$ins = "insert into users set name = '".$_POST['name']."',email = '".$_POST['email']."',mobile_no = '".$_POST['mobile']."',username = '".$_POST['username']."',password = '".$_POST['password']."',image = '".$pname."' ";
// 	mysqli_query($con,$ins) or die();	
// }
?> -->
<html>
<head>
	<title>Sign Up</title>
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
			<div class="col-md-4 col-xs-1"></div>
			<div class="col-md-4 col-xs-10 panel panel-default logpanel">
				<div class="row">
					<img src="images/icon.png" class="img-responsive logpanel_image ">
				</div>
				<div class="row text-center">
					<h3>Sign Up Panel</h3>
				</div>
				<!-- Form -->
				<div class="row">
					<form method="post" >
						<div class="input-group" style="margin: 10px;">
                    		<span class="input-group-addon">Name</span>
                    		<input id="name" name="name" type="text" class="form-control" autofocus="" required="">
                		</div>
                		<div class="input-group" style="margin: 10px;">
                    		<span class="input-group-addon">Email</span>
                    		<input id="email" name="email" type="text" class="form-control" required="">
                		</div>
                		<div class="input-group" style="margin: 10px;">
                    		<span class="input-group-addon">Mobile No.</span>
                    		<input id="mobile" name="mobile" type="text" class="form-control" required="">
                		</div>
                		<div class="input-group" style="margin: 10px;">
                    		<span class="input-group-addon">Username</span>
                    		<input id="username" name="username" type="text" class="form-control" required="">
                		</div>
                		<div class="input-group" style="margin: 10px;">
                    		<span class="input-group-addon">Password</span>
                    		<input id="password" name="password" type="password" class="form-control" required="">
                		</div>
                		<!-- <div class="input-group" style="margin: 10px;">
                    		<span class="input-group-addon">Image</span>
                    		<input id="image" name="image" type="file" class="form-control" required="">
                		</div> -->
				</div>
				<div class="row">
					<div class="col-xs-4"></div>
					<div class="col-xs-4">
						<button type="submit" id="signup" class="btn btn-primary" style="margin-left: 10px;margin-bottom: 10px;"> Sign Up </button>
					</div>
					<div class="col-xs-4"></div>
				</div>
					</form>
				<!-- Form Close -->
			</div>
			<div class="col-md-4 col-xs-1"></div>
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
	var $mobile_no = $('#mobile');
	var $username = $('#username');
	var $password = $('#password');
	// var $image = $('#image');

	$('#signup').on('click',function(){

		var order = {
			name: $name.val(),
			email: $email.val(),
			mobile_no: $mobile_no.val(),
			username: $username.val(),
			password: $password.val()
		};

		var jobj = JSON.stringify(order);

		$.ajax({
			type: 'POST',
			url: '/skilrock/api/post/create.php',
			data: jobj,
			contentType: "application/json",
			dataType: "json",
			success: function(){
				alert("Data inserted in Database!");
			},
			error: function(){
				alert("data no go!!");	
			}
		});
	});
});
</script>
</body>
</html>



