<?php 
require('header.php');

include('functions.php') ?>

	<title>Website Banking</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="login_style.css">


	<div class="container">
	 <div class="row">
	  <div class="col-6 mx-auto">
	   <div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php echo display_error(); ?>

		<div class="form-group">
			<label>Username</label>
			<input class="form-control" type="text" name="username" >
		</div>
		<div class="form-group">
			<label>Password</label>
			<input class="form-control" type="password" name="password">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-secondary" name="login_btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>
	   </div>
	  </div>
	</div>

	<? require('footer.php'); ?>
