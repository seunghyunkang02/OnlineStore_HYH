<?php
$servername = 'localhost';
$username = 'id10006022_alice';
$password = 'password12345';
$dbname = 'id10006022_hanyinhong';
//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 

//selecting product table from phpdatabase and ordering by product id: 1,2,3, etc
$sql = "SELECT * FROM producttbl ORDER by productID ASC";
$res = mysqli_query($conn, $sql);

//while loop to display products and add to cart button within the while loop
while($r = mysqli_fetch_assoc($res)){ ?>
	 <form method="post">
	 <img class=displayed src="<?php echo $r['productimage']; ?>" width="200" height="195"></a>
     <h4><?php echo $r['productName'] ?></h4>
     <h4><font color="green"><?php echo $r['price']; ?></h4></font>
		 <?php	
		 echo "<select name = 'quantity' id='quantity'>";
	 	 $x=1;
			do{
		 echo "<option value=$x>$x</option>";
		 $x++;
			}while ($x <= $r['quantity']);
		 echo "</select>";
		 if ($x = 0){
			 echo "<h4><font color='red'>SOLD OUT</h4></font>";
		 }
		
		 echo '<form action="buyproducts.php" method="POST">
		 	<button name="buynow" value="'.$r['productName'].'" type="submit">Buy</button></form>';
		 echo '<form action="viewproduct.php" method="POST">
		 	<button name="view" value="'.$r['productName'].'" type="submit">View Product</button></form>';
		 echo "</form>";
};
	if(isset($_POST["buynow"])) {
		$_SESSION['quantity'] = $_POST['quantity'];
		$_SESSION['buynow'] = $_POST['buynow'];
		echo "<script type='text/javascript'>
   window.location.replace('http://hanyinhong.000webhostapp.com/buyproducts.php')
   </script>" ;
	}	

	if(isset($_POST["view"])) {
		$_SESSION['view'] = $_POST['view'];	
		echo "<script type='text/javascript'>
   window.location.replace('http://hanyinhong.000webhostapp.com/viewproduct.php')
   </script>";
		}		
?>