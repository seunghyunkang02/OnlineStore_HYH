<?php
if (!isset($_SESSION)) {
    session_start();
}
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
$sql = "SELECT * FROM customertbl ORDER by customerID ASC";
$res = mysqli_query($conn, $sql);

//selecting product table from phpdatabase and ordering by product id: 1,2,3, etc
$sql2 = "SELECT * FROM producttbl ORDER by productID ASC";
$res2 = mysqli_query($conn, $sql2); ?>

<div style = "position: absolute; padding-left: 1100px; top:0px">
		<?php
			if(isset($_SESSION["customer"])){
				echo "Welcome to Hanyinhong, ".$_SESSION["customer"];
			} elseif(isset($_POST["customer"])){
				$selectedCustomer = $_POST["customer"];
				$_SESSION["customer"] = $_POST["customer"];
				echo "Welcome to Hanyinhong, ".$selectedCustomer;
			} else{?>
				Customer List:
				<form method = "post"> <select name="customer">
				<option value="Select">Select</option>
				<?php while($user = mysqli_fetch_assoc($res)){ ?>
				<option value =<?php echo $user['username']; ?>> <?php echo $user ['customerName']; }?> </option> </select>
				<?php echo '<button value="'.$user['username'].'" type="submit">Submit</button>' ;?>
				</form><?php
			}
		?> </div>
<?php
	
//while loop to display products and add to cart button within the while loop
while($r = mysqli_fetch_assoc($res2)){ ?>
	 <form method="post">
	 <img class=displayed src="<?php echo $r['productimage']; ?>" width="200" height="195"></a>
     <h4><?php echo $r['productName']; ?></h4>
     <h4><font color="green"> <?php echo $r['price']; ?></h4></font>
     <?php echo '<button name="addtocart" value="'.$r['productName'].'" type="submit">Add to Cart</button>'; ?>
     <br>
     <br>
	</form>

	<form action='viewproduct.php' method "get">	
	<?php echo '<button name="viewproduct" value='.$r['productID'].' type="submit">View Product</button>'; ?>
	</form>

<?php };
	if(isset($_POST["addtocart"])) {
		$selectedproduct = $_POST["addtocart"];
		echo "Selected Product =".$selectedproduct;
	};	

	if(isset($_POST["viewproduct"])) {
		$productview = $_POST["viewproduct"];			  
		}		
?>
