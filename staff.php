<?php include('addproduct.php') ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Staff Member Area</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<form action = "addproduct.php" method="POST" enctype="multipart/form-data" autocomplete="off">
		<h1>Add New Products</h1>
		<p>Please complete this form and add new products onto the website</p>
		
		<label for="productName"><b>Product Name</b></label>
		<input type="text" placeholder="Enter Name" name="productName" required>
		
		<label for="price"><b>Price</b></label>
		<input type="number" placeholder="Enter Price" name="price" required>
		
		<p><label for="quantity"><b>Quantity</b></label>
		<input type="number" placeholder="Enter Quantity" name="quantity" required>
		
		<label for="description"><b>Description</b></label>
		<input type="text" placeholder="Enter Description" name="description" required>
		
		<p>When you completed every sections, please click the submit button below</p>
		<p><button type="submit" name="addproduct">Submit</button></p>

		<p>Going back to Hanyinhong webpage? <a href="index.php">Click Here</a></p>
	</form>
<body>
</body>
</html>
