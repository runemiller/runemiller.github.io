<?php
	$currentstyle = "lightmode";
	
	if (isset($_COOKIE["chosenstyle"])) {
		$currentstyle = $_COOKIE["chosenstyle"];
	}
	
	if (isset($_POST["changestyle"])) {
		$currentstyle = $_POST["changestyle"];
	}
	
	setcookie("chosenstyle", $currentstyle);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Changing CSS Styling</title>
		<link rel="stylesheet" href="<?= $currentstyle; ?>.css">
	</head>
	<body>
		<h2>Change CSS Styling Here</h2>
		<form method="post" action="<?= $_SERVER["PHP_SELF"];?>">
			<input type="submit" name="changestyle" value="lightmode"><BR>
			<input type="submit" name="changestyle" value="darkmode"><BR>
		</form>
		
		<form action="mainpage.php">
			<p>Click Here To Return To Webpage</p>
			<input type="submit" value="Return">
		</form>
		
		<h2>Here Is What Your Webpage Will Look Like</h2>
		<div class="grid-container">
			<div class="item1">
				<h2>Example Header</h2>
			</div>
			<div class="item2">
				<p>Example Table</p>
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
					<tr>
						<th>Example Data</th>
						<th>Example Data</th>
						<th>Example Data</th>
						<th>Example Data</th>
						<th>Example Data</th>
						<th>Example Data</th>
						<th>Example Data</th>
					</tr>
				</table>
				
				<p>Example Textbox</p>
				<input type="text" name="example">
				
				<p>Example Button</p>
				<input type="submit" value="example">
			</div>
		</div>
	</body>
</html>