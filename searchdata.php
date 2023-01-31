<!DOCTYPE html>
<html>
	<head>
		<title>Viewing Data</title>
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
				<h2>PlayStation Trophy Tracker</h2>
			</div>
			
			<div class="item2">
				<form action="mainpage.php">
					<input type="submit" value="Go Back">
				</form>
				<table style="width:100%">
					<tr>
						<th>Game ID</th>
						<th>Game Name</th>
						<th>Developer</th>
						<th>Date Started</th>
						<th>Progress Percentage</th>
						<th>Date Finished</th>
						<th>Platinum</th>
					</tr>
					
					<?php
						$mysqli = mysqli_connect("localhost", "2112834", "85rj5j", "db2112834");
						if (mysqli_connect_errno()) {
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}
						
						$field1 = $_GET['search_field_one'];
						$data1 = $_GET['criteria_one'];
						$field2 = $_GET['search_field_two'];
						$data2 = $_GET['criteria_two'];
						$optional = $_GET['optional'];
						
						if ($optional == "true") {
							$res1 = mysqli_query($mysqli, "SELECT * FROM `trophytracker` WHERE `" . $field1 . "` = '" . $data1 . "'");
							$res2 = mysqli_query($mysqli, "SELECT * FROM `trophytracker` WHERE `" . $field2 . "` = '" . $data2 . "'");
							while($row = mysqli_fetch_assoc($res1)) {
								echo "<tr><td>" . $row['gameid'] . "</td><td>" . $row['gamename'] . "</td><td>" . $row['developer'] . "</td><td>" . 
								$row['datestarted'] . "</td><td>" . $row['progperc'] . "</td><td>" . $row['datefinished'] . "</td><td>" . $row['platinum'] . "</td></tr>";
							}
							while($row = mysqli_fetch_assoc($res2)) {
								echo "<tr><td>" . $row['gameid'] . "</td><td>" . $row['gamename'] . "</td><td>" . $row['developer'] . "</td><td>" . 
								$row['datestarted'] . "</td><td>" . $row['progperc'] . "</td><td>" . $row['datefinished'] . "</td><td>" . $row['platinum'] . "</td></tr>";
							}
						}
						else {
							$res1 = mysqli_query($mysqli, "SELECT * FROM `trophytracker` WHERE `" . $field1 . "` = '" . $data1 . "'");
							while($row = mysqli_fetch_assoc($res1)) {
								echo "<tr><td>" . $row['gameid'] . "</td><td>" . $row['gamename'] . "</td><td>" . $row['developer'] . "</td><td>" . 
								$row['datestarted'] . "</td><td>" . $row['progperc'] . "</td><td>" . $row['datefinished'] . "</td><td>" . $row['platinum'] . "</td></tr>";
							}
						}
					?>
				</table>
			</div>
		</div>
	</body>
</html>