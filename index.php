<?php 
	include('header.php');
	include('functions.php');
	include('side_menu.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	
	
</head>
<body>
	<div class="header">
		<h2>Home Page</h2>

	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong class="display-4"><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br><br>
						<a class="btn btn-primary" href="index.php?logout='1'" style="color: red;">logout</a>
						<br><br>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>
	<style>
			h2{
				text-align: center;
				background-color:cornflowerblue;
			}

			body {
				background-image: url("user.jpg");
				background-color: #cccccc;
				background-repeat: repeat-y;
				background-size: cover;
}
			</style>

	<? require('footer.php'); ?>
