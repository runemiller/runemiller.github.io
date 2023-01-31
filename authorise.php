<?php

	session_start();

	if ($_POST["insusername"] == $_SESSION["username"] && $_POST["inspassword"] == $_SESSION["password"]) {
		header("Location: mainpage.php");
	}
	else {
		header("Location: homepage.php");
	}

?>