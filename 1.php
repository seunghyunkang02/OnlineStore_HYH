<?php
session_start();
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
$sql = "SELECT * FROM producttbl WHERE productID = 1";
$res = mysqli_query($conn, $sql);

//while loop to display products and add to cart button within the while loop
while($r = mysqli_fetch_assoc($res)){ ?>
	 <form method="post">
	 <a href="<?php echo $r['productID'] ?>.php"><img class=displayed src="<?php echo $r['productimage']; ?>" width="200" height="195"></a>
     <h4><?php echo $r['productName'] ?></h4>
     <h4><font color="green">$ <?php echo $r['price']; ?></h4></font>
     <?php echo '<button name="addtocart" value='.$r['productName'].' type="submit">Add to Cart</button>' ?>
     <br>
     <br>
<?php } 
	if(isset($_POST["addtocart"])) {
		$selectedproduct = $_POST["addtocart"];
		echo "Selected Porduct =".$selectedproduct;
	}
?>	