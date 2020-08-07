<? require('header.php') ?>
<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'WebsiteBanking');
$user = $_SESSION['user'];

$query = "SELECT balance FROM users_balance WHERE id=" .$user['id'];

$result = $db->query($query);

$balance = $result->fetch_array()["balance"];
echo "Currently Balance: ";
echo ($balance);

?>

<form method="post" action="get_money.php">

		<div class="input-group">
			<label>How much money you want to add?</label>
			<input type="text" name="money_amount" >
		</div>

		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Submit</button>
		</div>
		<p>
			You want to go back? <a href="index.php">Go back to Home Page</a>
		</p>
	</form>

    <?php



    if(isset($_POST["money_amount"])) { 
        $newValue = $balance - $_POST["money_amount"];
        if($newValue<0) {
            ?> <div class="alert alert-danger"> <p class="text-danger">You do not have enough amount of money in your bank account, please add money</p></div>
            <?php
        }

        else {
            $query= "UPDATE users_balance SET balance=" .$newValue ." WHERE id=" .$user['id'];
            $update = $db->query($query);
            if($update) {
                echo "Withdraw successful<br>";
            }
    
            else {
                echo "Withdraw not successful<br>";
                
                echo mysqli_error($db)."<br>" .$query;
            }
        }
       

    }

    

    ?>

<? include('footer.php') ?>
