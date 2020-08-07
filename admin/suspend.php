<?php
$db = mysqli_connect('localhost', 'root', '', 'WebsiteBanking');
	$query = "SELECT id, username FROM users WHERE user_type='user'";
	$result = mysqli_query($db, $query);
    ?>
    <form method="post" action="suspend.php">
    <label for="id_number">Choose the account you want to suspend:</label>
	<select name="id_number" id="">

		<?php
		while ($row = mysqli_fetch_array($result)) :
		?>

			<option value="<?= $row['id'] ?>"><?= $row['username'] ?></option>

		<?php

		endwhile;

		?>
  </select>
  
    <? echo "<br>" ?>
    	<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Submit</button>
		</div>

		<? echo "<br>" ?>

<!-- TESTING -->

    <?php

          if(isset($_POST["id_number"])) {
            $query_type = "UPDATE users SET user_type='suspend' WHERE id=" . $_POST['id_number'];
            $update_type = $db->query($query_type);
            
            if ($update_type) {
				echo "Suspend successful<br>";
			} else {
                echo "Suspend not successful<br>";
            }
          }
            
   ?>

    <p>
		You want to go back? <a href="home.php">Go back to Home Page</a>
    </p>
    </form>