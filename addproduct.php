<?php
session_start();
$servername = 'localhost';
$username = 'id10006022_alice';
$password = 'password12345';
$dbname = 'id10006022_hanyinhong';
//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//initialising variables
$name = "";
$price = "";
$quantity = "";
$description = "";
$error = array();

if(isset($_POST['addproduct'])){
	//let variables be the input values from the form
	$name = mysqli_real_escape_string($conn, $_POST['productName']);
	$price = mysqli_real_escape_string($conn, $_POST['price']);
	$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
 	
	//check if there is any empty sections
	if(empty($name) || empty($price) || empty($quantity) || empty($description)){
		array_push($error);
		echo "<script type='text/javascript'>window.alert('Please fill in all the required sections.');</script>";
		echo "<script> location.href='staff.php';</script>";}
	
	//check if the name input has the right format
	elseif(!preg_match("/^[a-zA-Z ]*$/",$name)){
		array_push($error);
		echo "<script type='text/javascript'>window.alert('Only letters and space allowed for name');</script>";
		echo "<script> location.href='staff.php';</script>";}
	
	elseif(preg_match("/^[a-zA-Z ]*$/",$price) || preg_match("/^[a-zA-Z ]*$/", $quantity)){
		array_push($error);
		echo "<script type='text/javascript'>window.alert('Only numbers allowed for price and quantity');</script>";
		echo "<script> location.href='staff.php';</script>";
	}	
	
	if(count($error) == 0){
		$add = "INSERT INTO producttbl(productName, price, quantity, description) VALUES ('$name','$price','$quantity','$description')";
		
		if (mysqli_query($conn, $add)){
			echo "<script type='text/javascript'>window.alert('The new product has been successfully added!');</script>";
			echo "<script> location.href='index.php';</script>";
				}
			}
		}
?>