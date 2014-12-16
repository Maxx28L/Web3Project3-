<h1>Products</h1>
<?php
if(isset($message)){
	echo "<h2>$message</h2>";	
}
?>
<table>
	<tr>
    	<th>Album</th>
        <th>Artist</th>
		<th>Description</th>
		<th>Genre</th>
		<th>Format</th>
        <th>Price</th>
        <th>Buy</th>
	</tr>
    <?php
	$query = mysqli_query($conn,"SELECT * FROM music ORDER BY Album");
	while($row=mysqli_fetch_assoc($query)){
	?>
    <tr>
    	<td><?php echo $row['Album']; ?></td>
        <td><?php echo $row['Artist']; ?></td>
        <td><?php echo $row['Description']; ?></td>
		<td><?php echo $row['Genre']; ?></td>
		<td><?php echo $row['Format']; ?></td>
		<td><?php echo "$" .$row['Price']; ?></td>
        <td><a href="index.php?page=product&action=add&ID=<?php echo $row['ID']; ?>">Add to Cart</a></td>
    </tr>
    <?php
	}
	?>
</table>