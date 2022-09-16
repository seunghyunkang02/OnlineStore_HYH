<?php
session_start();
$servername = 'localhost';
$username = 'id10006022_alice';
$password = 'password12345';
$dbname = 'id10006022_hanyinhong';
//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "SELECT*FROM producttbl";
$res = mysqli_query($conn,$sql);

if (isset($_SESSION['viewproduct'])){
	echo "1";
	$p = mysqli_fetch_assoc($res);
	echo "<br> <img class=displayed src=".$p['productimage']." width='200' height='195'>";
	echo "<br> The original price of ".$p['productName']." is $".$p['price'].'per item';
	echo "<br> Currently there are ".$p['quantity']." number of ".$p['productName'] ;
}
?>