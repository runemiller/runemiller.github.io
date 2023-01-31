<!DOCTYPE html>
<html>
	<head>
		<title>Deleting Data</title>
	</head>
	
	<body>
		<h1>Deleting Data... Please Wait For Webpage To Load</h1>

		<?php
			$mysqli = mysqli_connect("localhost", "2112834", "85rj5j", "db2112834");
			
			$id = $_GET['delete_field'];
			$delete = "DELETE FROM `trophytracker` WHERE `trophytracker`.`gameid` = '" . $id . "'";
			mysqli_query($mysqli, $delete);
			header("Refresh:0; mainpage.php");
		?>
	</body>
</html>