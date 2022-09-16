<?php
session_start();
$servername = 'localhost';
$username = 'id10006022_alice';
$password = 'password12345';
$dbname = 'id10006022_hanyinhong';
//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//initialising variables
$id = "";
$pw = "";
$repeatpw = "";
$name = "";
$address = "";
$email = "";
$error = array();

if(isset($_POST['register'])){
	//let variables be the input values from the form
	$id = mysqli_real_escape_string($conn, $_POST['username']);
	$pw = mysqli_real_escape_string($conn, $_POST['password']);
	$repeatpw = mysqli_real_escape_string($conn, $_POST['repeatpw']);
	$name = mysqli_real_escape_string($conn, $_POST['customerName']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	
	//check if there is any empty sections
	if(empty($id) || empty($pw) || empty($repeatpw) || empty($name) || empty($address) || empty($email)){
		array_push($error);
		echo "<script type='text/javascript'>window.alert('Please fill in all the required sections.');</script>";
		echo "<script> location.href='registerform.php';</script>";}
	
	//check if the initial password input matches with the re-entered password
	elseif($pw != $repeatpw){
		array_push($error);
		echo "<script type='text/javascript'>window.alert('The password you re-enter does not match with what you initially input. Please check again.');</script>";
		echo "<script> location.href='registerform.php';</script>";}
	
	//check if the name input has the right format
	elseif(!preg_match("/^[a-zA-Z ]*$/",$name)){
		array_push($error);
		echo "<script type='text/javascript'>window.alert('Only letters and space allowed for name');</script>";
		echo "<script> location.href='registerform.php';</script>";}
	
	//check if the email is a valid email address
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		array_push($error);
		echo "<script type='text/javascript'>window.alert('Invalid Email Address.');</script>";
		echo "<script> location.href='registerform.php';</script>";}
	
	//check if the email already exists in customertbl
	$emailcheck = mysqli_query($conn, "SELECT email FROM customertbl WHERE email = '$email'")or exit(mysqli_error($conn));
	$res = mysqli_num_rows($emailcheck);
	if($res > 0){
		array_push($error);
		echo "<script type='text/javascript'>window.alert('Email is already taken.');</script>";
		echo "<script> location.href='registerform.php';</script>";
	}
	//check if the username already exists in customertbl
	$idcheck = mysqli_query($conn, "SELECT username FROM customertbl WHERE username = '$id'")or exit(mysqli_error($conn));
	if(mysqli_num_rows($idcheck)){
		array_push($error);
		echo "<script type='text/javascript'>window.alert('Username is already taken.');</script>";
		echo "<script> location.href='registerform.php';</script>";}
	if(count($error) == 0){
		$insert = "INSERT INTO customertbl(username, password, customerName, address, email) VALUES ('$id','$pw','$name','$address','$email')";
		
		if (mysqli_query($conn, $insert)){
			echo "<script type='text/javascript'>window.alert('Thank you for joining our Hanyinhong website. The website will direct you to the login page.');</script>";
			echo "<script> location.href='login.php';</script>";
		}
	}
}


?>
