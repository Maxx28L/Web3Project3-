<?php
include('config.php');
?>
<html>
<head>
<link href="reset.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
<meta name="robots" content="noindex">
<title>Search</title>
</head>
<body>
<table style="width: 80%; margin:20 auto;">
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
if(isset($_GET['search'])){
    $string = $_GET['s'];           
    $sql = "SELECT * FROM music WHERE Artist LIKE '%{$string}%'";
    $query = mysqli_query($conn, $sql);
	 echo "<h2>You Searched for: </h2>";
     echo "\"$string\"";
    if(mysqli_num_rows($query) < 1){
        echo "<p>"."No results was found for your search"."</p>";
    }else{
        while($row  = mysqli_fetch_assoc($query)){ 
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
    }
}
?>
</table>
</body>
</html>