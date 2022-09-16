<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Create Table</title>
</head>

<body>
<?php
$servername = "localhost";
$username = "id10006022_alice";
$password = "password12345";
$dbname = "id10006022_hanyinhong";
$tbl = "customertbl";
$tbl2 = "producttbl";
$tbl3 = "ordertbl";
	
//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
	
//create customer table
$sql = "CREATE TABLE $tbl (
	customerID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username varchar(128),
	password varchar(128),
	customerName varchar (128),
	address varchar(256),
	email varchar(256)
)";

mysqli_query($conn,$sql);
//add data
$sql = "INSERT INTO $tbl
	VALUES
	(1,'edithkung', '123', 'Edith Kung', '123street, hong kong', 'edithhk@gmail.com'),
	(2, 'marcochung', '123', 'Marco Chung', '456 street, hong kong', 'marcohk@gmail.com'),
	(3, 'akibsiddique', '123', 'Akib Siddique', '789 street, hong kong', 'akibhk@gmail.com'),
	(4, 'alicekang', '123', 'Alice Kang', '000 street, hong kong', 'alicehk@gmail.com')";

mysqli_query($conn,$sql);

	
//create product table
$sql2 = "CREATE TABLE $tbl2 (
    productID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productName varchar(100),
    price int(25),
    quantity int(25),
	description varchar(200),
	productimage varchar(100)
)
";	
	
mysqli_query($conn,$sql2);
	
//add data
$sql2 = "INSERT INTO $tbl2 
	VALUES 
	(1,'Kimchi','16','100','a spicy pickled or fermented mixture containing cabbage, onions, and sometimes fish, variously seasoned, as with garlic, horseradish, red peppers, and ginger.','kimchi.png'),
	(2,'Kimchi Fried Rice','15','100','Kimchi fried rice is made primarily with kimchi and rice, along with other available ingredients, such as diced vegetables or meats like spam.','kimchifried.png'),
	(3,'Korean Dumpling(Steamed)','25','100','Authentic Korean Dumplings, comes in a pack of 360g Steamed Dumplings','mandusteam.png'),
	(4,'Korean Dumpling(Water/Boiled)','25','100','Authentic Korean Dumplings, comes in a pack of 350g of Boiled Dumplings','boiledmandu.png'),
	(5,'Korean Spicy Rice Cake','14','100','Spicy stir-fried rice cakes, is a highly popular Korean street food and a delicious comfort food you can easily make at home.','ricecake.png'),
	(6,'Honey Butter Almond','8','100','Honey butter almond snack shipped directly from Korea.','honeybutter.png'),
	(7,'Dry Sweet Potato','9','100','Dry sweet potato chips, all new sweet and savoury snack shipped directly from Korea.','drysweetpotato.png')
";
mysqli_query($conn,$sql2);
	
//create order table
$sql3 = "CREATE TABLE $tbl3 (
    orderID int NOT NULL AUTO_INCREMENT,
    customerID INT(6) UNSIGNED,
    productID INT(6) UNSIGNED,
	quantity INT(6) UNSIGNED,
	price INT(6) UNSIGNED,
	ordertime DATETIME,
	PRIMARY KEY (orderID),
    FOREIGN KEY (customerID) REFERENCES customertbl(customerID),
	FOREIGN KEY (productID) REFERENCES producttbl(productID)
)";	
mysqli_query($conn,$sql3);
echo mysqli_error($conn);
// close the connection to the database.
mysqli_close($conn);
?>
</body>
</html>