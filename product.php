<?php
if(isset($_GET['action']) && $_GET['action']=="add"){
	$ID=intval($_GET['ID']);
	if(isset($_SESSION['cart'][$ID])){
		$_SESSION['cart'][$ID]['Quantity']++;
	}else{
		$sql_p="SELECT * FROM music WHERE ID={$ID}";
		$query_p=mysqli_query($conn, $sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['ID']]=array("Quantity" => 1, "Price" => $row_p['Price']);
		}else{
			$message="Product ID is invalid";
		}
	}
}
?>
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