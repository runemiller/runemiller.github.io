<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Homepage</title>
		<?php
			if (isset($_COOKIE["chosenstyle"])) {
				$style = $_COOKIE["chosenstyle"];
			}
			else {
				$style = "lightmode";
			}
		?>
		<link rel="stylesheet" href="<?= $style; ?>.css">
	</head>
	
	<body>
		<?php
			
			$insusername = "";
			$inspassword = "";
			
		?>
		<div class="grid-container">
			<div class="item1">
				<h2>PlayStation Trophy Tracker</h2>
			</div>
			
			<div class="item2">
				<form method="post" action="authorise.php">
					<h3>Log In:</h3>
					<p>Username: <input type="text" name="insusername" value="<?= $insusername; ?>"></p>
					<p>Password: <input type="text" name="inspassword" value="<?= $inspassword; ?>"></p>
					<input type="submit" value="Log In">
				</form>
				
				<br>
				
				<form action="createaccount.php">
					<p>Or Register Here:</p>
					<input type="submit" value="Register">
				</form>
			</div>
		</div>
	</body>
</html>