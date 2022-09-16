
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="text.css">
</head>
<body>
	<?php
$servername= 'localhost';
$username = 'id10006022_alice';
$password = 'password12345';
$dbname = 'id10006022_hanyinhong';
//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 

$sql = "SELECT * FROM producttbl ORDER BY ProductID DESC LIMIT 0, 2";
$res = mysqli_query($conn, $sql);
$r = mysqli_fetch_assoc($res);
?>
<br>
<br>
<?php 
echo "New Item!";
?>
<br>
<img class=displayed src="<?php echo $r['productimage']; ?>" width="200" height="195">
<?php
?>
<br>
<?php
echo $r['productName'];
?>
</body>
</html>