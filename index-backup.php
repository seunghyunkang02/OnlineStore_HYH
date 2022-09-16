<!DOCTYPE html>
<html>
<head>
	<title>hanyinhong</title>
	<link rel="shortcut icon" href="">  <!-- FAVICON ADD -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<?php 
$servername = "localhost";
$username = "root";
$password = "password123";

// Create connection
$conn = mysqli_connect($servername, $username, $password, 'alice');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$pages = array('cart', 'home', 'product', 'products', 'placeorder');
$page = isset($_GET['page']) && in_array($_GET['page'], $pages) ? $_GET['page'] : 'home';


$sql = "SELECT * FROM producttbl ORDER by productID ASC";
$res = mysqli_query($conn, $sql);

while($r = mysqli_fetch_assoc($res)){
?>

</body>
</html>