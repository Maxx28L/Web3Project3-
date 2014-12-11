<!DOCTYPE html>
<html>
<head>
 <?php
	session_start();
	include_once("config.php");
 ?>
</head>
<body>
  <div id="wrap">
	<h1>Music Store</h1>
	
		<?php
			$query = "SELECT ID, Artist, Album, Format, Description, Genre, Price, Quantity FROM musicstore_local ORDER BY Artist";
		?>

  </div>
</body>
</html>