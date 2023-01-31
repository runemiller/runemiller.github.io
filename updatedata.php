<!DOCTYPE html>
<html>
	<head>
		<title>Updating Data</title>
	</head>
	
	<body>
		<h1>Updating Data... Please Wait For Webpage To Load</h1>

		<?php
			$mysqli = mysqli_connect("localhost", "2112834", "85rj5j", "db2112834");
			
			$id = $_GET['update_id'];
			$field = $_GET['update_field'];
			$data = $_GET['update_data'];
			$update = "UPDATE `trophytracker` SET `" . $field . "` = '" . $data . "' WHERE `trophytracker`.`gameid` = '" . $id . "'";
			mysqli_query($mysqli, $update);
			header("Refresh:0; mainpage.php");
		?>
	</body>
</html>