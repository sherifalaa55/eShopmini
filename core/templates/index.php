<!DOCTYPE html>
<html ng-app="eshop">
<head>
	<title>Mini eShop</title>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php asset('bootstrap/main.css') ?>">
</head>
<body>
	<div class="container">
		<!-- <div class="col-md-4 col-md-push-4" id="form_container">
			<form class="form-signin">
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox"> Check me out
					</label>
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div> -->
		<div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Login to Your Account</h1><br>
				  <form>
					<input type="text" name="user" placeholder="Username">
					<input type="password" name="pass" placeholder="Password">
					<input type="submit" name="login" class="login loginmodal-submit" value="Login">
					<!-- <input type="submit" name="register" class="login loginmodal-submit" value="Sign Up"> -->
				  <div class="checkbox">
				  	<label>
				  		<input type="checkbox" name="remember"> Remember Me </input>
				  	</label>
				  </div>
				  </form>
					
				</div>
			</div>
		  </div>
	</div>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
</html>