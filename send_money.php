<? require('header.php') ?>

<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'WebsiteBanking');
$user = $_SESSION['user'];

$query = "SELECT balance FROM users_balance WHERE id=" . $user['id'];

$result = $db->query($query);
$user_balance = $result->fetch_array()['balance'];
echo "Currently Balance: ";
echo ($user_balance);


?>

<form method="post" action="send_money.php">

	<div class="input-group">
		<label>How much money you want to send?</label>
		<input type="text" name="money_amount">
	</div>
	<?php
	$db = mysqli_connect('localhost', 'root', '', 'WebsiteBanking');
	$query = "SELECT id, username FROM users WHERE user_type='user' AND id !=" . $user['id'];
	$result = mysqli_query($db, $query);
	?>
	<label for="id_number">Choose the receiver:</label>
	<select name="id_number" id="">

		<?php
		while ($row = mysqli_fetch_array($result)) :
		?>

			<option value="<?= $row['id'] ?>"><?= $row['username'] ?></option>

		<?php

		endwhile;

		?>
	</select>

	<!--  Transfering money to the id user. Adding money to their current balance	-->
	<?php
	//$query = "INSERT INTO users (balance)  WHERE id='6'";

	if (isset($_POST["money_amount"])) {

		if ($user_balance < $_POST['money_amount']) {
	?> <div class="alert alert-danger">
				<p class="text-danger">You do not have enough amount of money in your bank account, please add money</p>
			</div>
	<?php
		} else {


			//merr balancen e tjetrit
			$balance_query = "SELECT balance FROM users_balance WHERE id=" . $_POST['id_number'];
			$balance_result = $db->query($balance_query);
			$balance = $balance_result->fetch_array()['balance'];
			//i shtohet tjetrit balanca
			$newValue = $balance + $_POST["money_amount"];
			// update balancen tjetrit
			$query = "UPDATE users_balance SET balance=" . $newValue . " WHERE id=" . $_POST['id_number'];
			$update = $db->query($query);
			// ulet balanca e userit
			
			$new_balance = $user_balance - $_POST['money_amount'];
			$new_user_balance = 'UPDATE users_balance SET balance =' .$new_balance ." WHERE id=" .$user['id'];
			$update_balance=$db->query($new_user_balance);

			//echo "{$user_balance} - {$_POST['money_amount']}";
			echo "<br>";
			if ($update && $update_balance) {
				echo "Transfer successful<br>";
			} else {
				echo "Transfer not successful<br>";

				//echo mysqli_error($db) . "<br>" . $query; "<br>";
				//echo $new_user_balance;
			}
		}
	}

	?>
	<div class="input-group">
		<button type="submit" class="btn" name="login_btn">Submit</button>
	</div>
	<p>
		You want to go back? <a href="index.php">Go back to Home Page</a>
	</p>
</form>


<? include('footer.php') ?>