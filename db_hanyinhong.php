<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$servername = "localhost";
$username = "id10006022_hanyinhong";
$password = "korea";
$dbname = "id10006022_db_hanyinhong";
$tables = array("tbl_Customers","tbl_Products","tbl_Orders");
$fields = array("CustomerID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, CustName VARCHAR (25), Address VARCHAR (200), Contacts INT(8)", 
	"ProductID INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, Product_Name VARCHAR (25), Original_Price INT(6), Description VARCHAR (100), Original_Quantity INT(15)", 
	"OrderID INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, CustomerID INT(6) FOREIGN KEY REFERENCES tbl_Customers(CustomerID), ProductID INT(6) FOREIGN KEY REFERENCES tbl_Products(ProductID)")

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "<h2>Connected successfully</h2>";

// Create table
for ($n = 0; $n<3; $n++){
        $sql = "CREATE TABLE $tables[$n] ($fields[$n])";
        echo "Executing $sql<br>";
 
        if (mysqli_query($conn, $sql)) {
            echo "Table $tables created successfully<br>";
        } else {
            echo "Error creating table: " . mysqli_error($conn) . "<br>";
        }
    }

