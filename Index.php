<html>
<head>
 <?php
	include("config.php");
 ?>
</head>
<body>
  <div id="wrap">
	<h1>Music Store</h1>
	
		<?php
			$query = "Select * FROM music ORDER BY Album";
			$result = $conn->query($query);
			
			if ($result->num_rows > 0) {
				 // output data of each row
				 
				echo '<table id="musicTable">'; 
				echo "<tr><th>Album</th><th>Artist</th><th>Description</th><th>Genre</th><th>Format</th><th>Quantity</th><th>Price</th></tr>"; 
				 
				 while($row = $result->fetch_assoc()) {
					  echo "<tr><td>"; 
					  echo $row['Album'];
					  echo "</td><td>";   
					  echo $row['Artist'];
					  echo "</td><td>";    
					  echo $row['Description'];
					  echo "</td><td>";  
					  echo $row['Genre'];
					  echo "</td><td>"; 
					  echo $row['Format'];
					  echo "</td><td>";  
					  echo $row['Quantity'];
					  echo "</td><td>";  					  
					  echo $row['Price'];
					  echo "</td></tr>"; 
					  
				 }
			} else {
				 echo "0 results";
			}
					echo "</table>";  
		?>
  </div>
</body>
</html>