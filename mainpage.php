<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PlayStation Trophy Tracker</title>
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
				<h3>Welcome User: <?php echo $_SESSION["username"] ?></h3>
				<form action="homepage.php">
					<input type="submit" value="Return To Homepage">
				</form>
			</div>
			
			<div class="item2">
			
				<form action="changingcss.php">
					<p>Click Here If You Want To Change Between Lightmode and Darkmode</p>
					<input type="submit" value="Change CSS">
				</form>
				
				<form method="get" name="form" action="searchdata.php">
					<p>Search For Data -- Select Field <select id="search_field_one" name="search_field_one">
					<option value="gameid">Game ID</option>
					<option value="gamename">Game Name</option>
					<option value="developer">Developer</option>
					<option value="datestarted">Date Started</option>
					<option value="progperc">Progress Percentage</option>
					<option value="datefinished">Date Finished</option>
					<option value="platinum">Platinum</option>
					</select>
					Enter Criteria <input type="text" name="criteria_one" placeholder="E.G.: Bayonetta">
					</p>
					<p>
					(Select For Extra Criteria -->)<input type="radio" id="optional" name="optional" value="true">
					Search For Data -- Select Field <select id="search_field_two" name="search_field_two">
					<option value="gameid">Game ID</option>
					<option value="gamename">Game Name</option>
					<option value="developer">Developer</option>
					<option value="datestarted">Date Started</option>
					<option value="progperc">Progress Percentage</option>
					<option value="datefinished">Date Finished</option>
					<option value="platinum">Platinum</option>
					</select>
					Enter Criteria <input type="text" name="criteria_two" placeholder="E.G.: 74%">
					</p>
					<p>
					<input type="submit" value="Search">
					</p>
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
						
						$res = mysqli_query($mysqli, "SELECT gameid, gamename, developer, datestarted, progperc, datefinished, platinum FROM trophytracker");
						
						if(!$res) {
							print("MySQL error: " . mysqli_error($mysqli));
							exit;
						}
						
						$length = mysqli_num_rows($res);
						
						while($row = mysqli_fetch_assoc($res)) {
							echo "<tr><td>" . $row['gameid'] . "</td><td>" . $row['gamename'] . "</td><td>" . $row['developer'] . "</td><td>" . 
							$row['datestarted'] . "</td><td>" . $row['progperc'] . "</td><td>" . $row['datefinished'] . "</td><td>" . $row['platinum'] . "</td></tr>";
						}
					?>
					
					<tr>
					<form method="get" name="form" action="insertdata.php">
						<td><input type="text" name="inp_gameid" placeholder="PS00"></td>
						<td><input type="text" name="inp_gamename" placeholder="Game Name"></td>
						<td><input type="text" name="inp_developer" placeholder="Game Developer"></td>
						<td><input type="text" name="inp_datestarted" placeholder="YYYY-MM-DD"></td>
						<td><input type="text" name="inp_progperc" placeholder="50%"></td>
						<td><input type="text" name="inp_datefinished" placeholder="YYYY-MM-DD"></td>
						<td><input type="text" name="inp_plat" placeholder="0 or 1"></td>
						<td><input type="submit" value="Insert"></td>
					</form>
					</tr>
				</table>
				
				
				<form method="get" name="form" action="updatedata.php">
					<p>Update Record -- Enter Game ID: <input type="text" name="update_id" placeholder="PS00"> Select Field: <select id="update_field" name="update_field">
					<option value="gamename">Game Name</option>
					<option value="developer">Developer</option>
					<option value="datestarted">Date Started</option>
					<option value="progperc">Progress Percentage</option>
					<option value="datefinished">Date Finished</option>
					<option value="platinum">Platinum</option>
					</select>
					With Data: <input type="text" name="update_data" placeholder="Enter Data Here"> <input type="submit" value="Update"></p>
				</form>
				
				<form method="get" name="form" action="deletedata.php">
					<p>Delete Record -- Enter Game ID: <input type="text" name="delete_field" placeholder="PS00"> <input type="submit" value="Delete"></p>
				</form>
			</div>
		</div>
	</body>
</html>