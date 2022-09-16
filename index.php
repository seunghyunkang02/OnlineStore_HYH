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
session_start();
if(isset($_SESSION['id'])) {
echo "Welcome " . $_SESSION['id'];
}
echo "<br><a href='logout.php'>Logout</a>";

?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href=>
		<meta charset="utf-8">
		<title>hanyinhong</title>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
        <header>
		<?php //selecting product table from phpdatabase and ordering by product id: 1,2,3, etc
		$sql = "SELECT * FROM customertbl ORDER by customerID ASC";
		$res = mysqli_query($conn, $sql); ?>
		
                <h1>HANYINHONG</h1>
                <nav>
                    <a href="index.php">Home</a>
                    <a href="index.php?page=products">Products</a>
				</nav>

        </header>
        <main>
		</main>
		<p>If you are a staff member, please click <a href="staff.php">here</a></p>
    </body>
</html>