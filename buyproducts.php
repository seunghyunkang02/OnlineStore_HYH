<?php
session_start();
$servername = 'localhost';
$username = 'id10006022_alice';
$password = 'password12345';
$dbname = 'id10006022_hanyinhong';
//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$userid=$_SESSION['id'];
$sql = "SELECT*FROM customertbl WHERE username='$userid'";
$res = mysqli_query($conn,$sql);
$productname = $_SESSION['buynow'];
$sqlpro = "SELECT*FROM producttbl WHERE productName ='$productname'";
$respro = mysqli_query($conn,$sqlpro);


if(isset($_SESSION['buynow'])){	
	if (mysqli_num_rows($respro)>0){
		//Initialising the $p is to directly retrieve specific product. Through $p, $pid is used to insert product ID to the ordertbl and $price is used for the main algiorithm.
		$p = mysqli_fetch_assoc($respro);
		$pid = $p['productID'];
		$price = $p['price'];
		//$_SESSION[‘quantity’] is used to present user-input for quantity and $date_clicked is used to search for the number of previous purchases made by a specific user for the past 3 months.
		$quantity=$_SESSION['quantity'];
		$date_clicked = date('Y-m-d H:i:s');
		$totalprice = $quantity * $price;
	}
	
	if (mysqli_num_rows($res)>0){
		$row = mysqli_fetch_assoc($res);
		$cid = $row['customerID'];
		$insertorder = "INSERT INTO ordertbl (customerID, productID,quantity,price,ordertime) VALUES
		('$cid', '$pid','$quantity','$totalprice','$date_clicked')"; 
		$sqlord = "SELECT*FROM ordertbl WHERE customerID = '$cid'";
		$resord = mysqli_query($conn,$sqlord);
		
		$previous_purchases = 0;
		if(mysqli_num_rows($resord)>0){
			while ($r=mysqli_fetch_assoc($resord)) {
			$ordertime = $r['ordertime'];
			$date_diff="DATE_DIFF(month,$ordertime,NOW())";
			
			if ($date_diff<=3){
				$previous_purchases += 1;
			}
			}
			if ($previous_purchases<=5){
				$percentage = $previous_purchases * 10;
				$discount = $percentage;
				$discount = $discount/100;
				$totaldiscount = $totalprice * $discount;
				$finalprice = $totalprice - $totaldiscount;
			} else{
				$percentage = 50;
				$discount = $percentage;
				$discount = $discount/100;
				$totaldiscount = $totalprice * $discount;
				$finalprice = $totalprice - $totaldiscount;
			}
			}
	if(mysqli_query($conn, $insertorder)){
	}else{
		echo "error with customer ID";
		 }

if(isset($_SESSION['id'])) {
echo "Welcome " . $_SESSION['id'];
}
echo "<br>";

  echo "Buying : " . $_SESSION['buynow'];
  echo "<br> Quantity: " . $_SESSION['quantity'];
  echo "<br><img class=displayed src=".$p['productimage']." width='200' height='195'>";
  echo "<br> The original price of ".$p['productName']." is $".$p['price'];
  echo "<br> Therefore, your original purchase should be $".$totalprice;
  echo "<br> Based on the number of your previous purchase for the past 3 months, you have your discount of ".$percentage." %. Therefore your total purchase will be $".$finalprice ;
  echo "<br> We will deliever it to your registered address which is: ".$row['address'];
  echo "<br> We have sent the delievery details to ".$row['email'];

  $initialqty = $p['quantity'];
  $finalqty = $initialqty - $quantity;
  $qtysql = "UPDATE producttbl SET quantity = '$finalqty' WHERE productID = '$pid'";
	if ($conn->query($qtysql) === TRUE) {
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	}
}
 ?>

<br>If you wish to shop more, click <a href="http://hanyinhong.000webhostapp.com/index.php?page=products">here</a>