<!DOCTYPE html>
<html>
<?php
	if(isset($_POST['submit'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['Quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['Quantity']=$val;
			}
		}
		}
	}
?>
<?php
	if(isset($_POST['shipping3'])){
		$shipping=18;
	}
		else if(isset($_POST['shipping2'])){
			$shipping=10;
		}
		else{
			$shipping=0;
		}
	
?>
<head>
<meta name="robots" content="noindex">
</head>
<body>
<h1>View Cart || <a href="index.php?page=product">Music</a></h1>
<form method="post" action="index.php?page=cart">
<table>
	<tr>
    	<th>Album</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Subtotal</th>
	</tr>
    <?php
    $sql = "SELECT * FROM music WHERE ID IN(";
			foreach($_SESSION['cart'] as $ID => $value){
			$sql .=$ID. ",";
			}
			$sql=substr($sql,0,-1) . ") ORDER BY Album";
			$query = mysqli_query($conn, $sql);
			$totalprice=0;
			if(!empty($query)){
			while($row = mysqli_fetch_array($query)){
				$subtotal= $_SESSION['cart'][$row['ID']]['Quantity']*$row['Price'];
				$totalprice += $subtotal + $shipping;
	?>
	<tr>
		<td><?php echo $row['Album']; ?></td>
        <td><input type="text" name="Quantity[<?php echo $row['ID']; ?>]" size="6" value="<?php echo $_SESSION['cart'][$row['ID']]['Quantity']; ?>"> </td>
        <td><?php echo "$" .$row['Price']; ?></td>
        <td><?php echo "$" .$_SESSION['cart'][$row['ID']]['Quantity']*$row['Price']. ".00"; ?></td>       
	</tr>
            
    <?php
			}
			}else{
	?>
			<tr><td colspan="4"><?php echo "<i>Add product to your cart."; ?></td></tr>
    <?php
			}
	?>
		
    <tr>
		<td><h2>Choose a shipping method: </h2></td>
		<td><input type="radio" name="shipping1" value="Free">5-10 standard business days</input></td>
		<td><input type="radio" name="shipping2" value="2Day">2-Day shipping</input></td>
		<td><input type="radio" name="shipping3" value="overnight">Overnight shipping</input></td>
	</tr>
	<tr>
    	<td>Total Price: <h1><?php echo "$" ."$totalprice". ".00"; ?></h1><td>
    </tr>
</table>
<br/><button type="submit" name="submit">Update Cart</button>
</form>
<br/><p>To remove an item, set quantity to 0.</p>
<body>
</html>