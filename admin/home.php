<?php
	include('../functions.php');
	include('../header.php') ?>

	<?php 
	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}

?>

	<div class="header">
		<h2>Admin - Home Page</h2>
		<style>
			h2{
				text-align: center;
				background-color:yellowgreen;
			}

			body {
				background-image: url("admin.png");
				background-color: #cccccc;
				background-position: center;
				background-repeat: no-repeat;
				background-size: cover;
			   }


		</style>
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

	<?php
	$db = mysqli_connect('localhost', 'root', '', 'WebsiteBanking');
	$query = "SELECT id, username FROM users WHERE id !=1";
	$result = mysqli_query($db, $query);
	?>

			<body>
		
		<?php
		$db = mysqli_connect('localhost', 'root', '', 'WebsiteBanking');
		$query = "SELECT id, username FROM users WHERE user_type='user'";
		$result = mysqli_query($db, $query);
		echo "Users list: <br>";
		while ($row = mysqli_fetch_array($result)) :
		?>

			<option value="<?= $row['id'] ?>"><?= $row['username'] ?></option>

		<?php

		endwhile;
		echo "<br>";
		?>
		<a class="btn btn-primary" href="suspend.php?logout='1'" style="color: red;">Suspend a User</a>
		<br><br>
		<a class="btn btn-primary" href="reactivate.php?logout='1'" style="color: yellow;">Reactivate a User</a>
		<br><br><br>
		
		<!-- logged in user information -->
		<div class="profile_info">
			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<a href="home.php?logout='1'" style="color: red;">logout</a>
						<br><br>
					</small>

				<?php endif ?>
			</div>
		</div>

	</div>
				</body>
<? include('../footer.php') ?>