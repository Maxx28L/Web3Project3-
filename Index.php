<!DOCTYPE html>
<?php
session_start();
require("config.php");

if(isset($_GET['page'])){
	$pages=array("product","cart");
	if(in_array($_GET['page'],$pages)){
		$page=$_GET['page'];
	}else{
		$page="product";
	}
}else{
	$page="product";
}
?>

<html>
<head>
<link href="reset.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
<meta name="robots" content="noindex">
<title>Shopping Cart</title>
</head>
<body>
<div ID="container">
      <div ID="main">
        <?php require($page . ".php"); ?>
      </div>
      <div ID="sidebar">
        <h1>Cart</h1>
        <table>
        	<tr>
            	<th>Product/Album</th>
                <th>Quantity</th>
            </tr>
        <?php
				if(isset($_SESSION['cart'])){
					$sql = "SELECT * FROM music WHERE ID IN(";
					foreach($_SESSION['cart'] as $ID => $value){
						$sql .=$ID. ",";
					}
					$sql=substr($sql,0,-1).") ORDER BY Album";
					$query = mysqli_query($conn, $sql);
					if(!empty($query)){
						while($row = mysqli_fetch_array($query)){
			?>
            <tr>
        		<td><?php echo $row['Album']; ?></td><td><?php echo $_SESSION['cart'][$row['ID']]['Quantity']; ?></td>
			</tr>
        	<?php
					}
					}else{
			?>
            
					<tr><td colspan="3"><?php echo "<i>Your cart is empty."; ?></td></tr>
            <?php
				}
			?>
            
        
        <tr><td colspan="3"><a href="index.php?page=cart">Go To Cart</a></td></tr>
        <?php
				}else{
		?>
				<tr><td><?php echo "Your Cart is Empty"; ?></td></tr>
        <?php
				}
		?>
        </table>
  </div>
 
</div>
</body>
</html>