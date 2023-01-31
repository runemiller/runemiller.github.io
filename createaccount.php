<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
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
		<div class="grid-container">
			<div class="item1">
				<form method="post" action="<?= $_SERVER["PHP_SELF"]; ?>">
					<?php
						$username = "";
						$password = "";
						
						if (isset($_POST["add_details"])) {
							$_SESSION["username"] = $_POST["username"];
							$_SESSION["password"] = $_POST["password"];
							echo "<p>Details Added, Thanks For Registering</p>";
						}
						
						if (isset($_SESSION["username"])) {
							$username = $_SESSION["username"];
							$password = $_SESSION["password"];
						}
					?>
					<p>Enter Username: <input type="text" name="username" value="<?= $username; ?>"></p>
					<p>Enter Password: <input type="text" name="password" value="<?= $password; ?>"></p>
					<p><input type="submit" name="add_details" value="Add Details"></p>
				</form>
				
				<form action="homepage.php">
					<p>Return To Homepage</p>
					<input type="submit" value="Return">
				</form>
			</div>
		</div>
	</body>
</html>