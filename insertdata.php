<!DOCTYPE html>
<html>
	<head>
		<title>Inserting Data</title>
	</head>
	
	<body>
		<h1>Inserting Data... Please Wait For Webpage To Load</h1>
		
		<?php
			$mysqli = mysqli_connect("localhost", "2112834", "85rj5j", "db2112834");
			
			$id = $_GET['inp_gameid'];
			$name = $_GET['inp_gamename'];
			$dev = $_GET['inp_developer'];
			$start = $_GET['inp_datestarted'];
			$prog = $_GET['inp_progperc'];
			$fin = $_GET['inp_datefinished'];
			$plat = $_GET['inp_plat'];
			$insert = "INSERT INTO `trophytracker` (`gameid`, `gamename`, `developer`, `datestarted`, `progperc`, `datefinished`, `platinum`) VALUES ('$id', '$name', '$dev', '$start', '$prog', '$fin', '$plat')";
			mysqli_query($mysqli, $insert);
			header("Refresh:0; mainpage.php");
		?>
	</body>
</html>