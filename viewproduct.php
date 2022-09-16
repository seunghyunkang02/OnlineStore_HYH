<?php 
session_start();
$servername = 'localhost';
$username = 'id10006022_alice';
$password = 'password12345';
$dbname = 'id10006022_hanyinhong';
//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$productname = $_POST['view'];
$sql = "SELECT*FROM producttbl WHERE productName = '$productname'";
$res = mysqli_query($conn,$sql);
$p = mysqli_fetch_assoc($res);

if(isset($_SESSION['id'])) {
echo "Welcome " . $_SESSION['id'];
}

  echo "<br> Your chosen product is " .$p['productName'];
  echo "<br><img class=displayed src=".$p['productimage']." width='200' height='195'>";
  echo "<br> The original price of ".$p['productName']." is $".$p['price']." per item";
  echo "<br> We currently have ".$p['quantity']." number of ".$p['productName'];


echo '<br>If you wish to look around more, click <a href="http://hanyinhong.000webhostapp.com/index.php?page=products">here</a>';
?>
	
