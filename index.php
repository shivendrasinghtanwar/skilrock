<?php 
$json = '';
$mes = '';
if(isset($_GET['login']))
{

	// echo "<script>window.location='profile.php'</script>";
	$url = 'http://localhost/skilrock/api/post/read_single_user_pass.php?username='.urlencode($_GET['username']).'&password='.urlencode($_GET['password']);

	$json = file_get_contents($url);
	$arr = json_decode($json,true);
	if($arr['name']!=null)
	{
		session_start();
		$_SESSION['ADMINID']=$arr['ID'];
		echo "<script>window.location='profile.php'</script>";
	}
	else
	{
		$
		$mes = "Invalid username or password!!";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
<div class="container-fluid logpanel_header">
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
					<h3>Log In Panel</h3>
				</div>
				<!-- Form -->
				<div class="row" method="post">
					<form method="get">
						<div class="input-group" style="margin: 10px;">
                    		<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    		<input name="username" type="text" class="form-control" placeholder="Username" autofocus="" required="">
                		</div>
                		<div class="input-group" style="margin: 10px;">
                    		<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                    		<input name="password" type="password" class="form-control" placeholder="Password" required="">
						</div>
				</div>
				<div class="row">
					<div class="col-xs-4"></div>
					<div class="col-xs-4">
						<input type="submit" name="login" value="Login" class="btn btn-primary" style="margin-left: 5px;margin-bottom: 10px;">
					</div>
					<div class="col-xs-4"></div>
				</div>
					</form>
				<!-- Form Close -->
				<div class="row">
					<div class="col-xs-6 logpanel_text">
						<a href="signup.php"> Sign Up </a>
					</div>
					<div class="col-xs-6 logpanel_text" style="border-right: none;">
						<a href="forgotpassword.php"> Forgot Password </a>
					</div>
				</div>
				<div class="row">
					<?php echo $mes;  ?>
				</div>
			</div>
			<div class="col-md-4 col-xs-1"></div>
		</div>
	</div>
</div>
<!-- Body Section Admin Login Page Close-->
<!-- Script Files -->
<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
</body>
</html>



