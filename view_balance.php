<?
require('header.php')
?>

<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'WebsiteBanking');
$user = $_SESSION['user'];

$query = "SELECT balance FROM users_balance WHERE id=" .$user['id'];

$result = $db->query($query);
$row = mysqli_fetch_assoc($result);
echo "Your balance is: " .$row["balance"];


?>

		<p>
			You want to go back? <a href="index.php">Go back to Home Page</a>
		</p>

<? require('footer.php') ?>

