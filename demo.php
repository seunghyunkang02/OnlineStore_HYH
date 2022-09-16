<?php
session_start();
$servername = 'localhost';
$username = 'id10006022_alice';
$password = 'password12345';
$dbname = 'id10006022_hanyinhong';
//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


$userid=$_SESSION['id'];
$sql = "SELECT * FROM customertbl WHERE username='$userid'";
$res = mysqli_query($conn,$sql);
$sqlpro = "SELECT*FROM producttbl";
$respro = mysqli_query($conn,$sqlpro);
$p = mysqli_fetch_assoc($respro);
$pid = $p['productID'];

if (mysqli_num_rows($res)>0){
$row = mysqli_fetch_assoc($res);
$cid = $row['customerID'];
$insertorder = "INSERT INTO ordertbl (customerID, productID) VALUES
 ('$cid', '$pid')"; 
}else{
	echo "error with customer ID";
}


if (mysqli_query($conn, $insertorder)) {
    echo "New record created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


if(isset($_SESSION['id'])) {
echo "Welcome " . $_SESSION['id'];
}
?>
<br>
<?php
if(isset($_SESSION['buynow'])) {
  echo "Buying : " . $_SESSION['buynow'];
}
 ?>
 <br><img class=displayed src="<?php echo $p['productimage']; ?>" width="200" height="195">