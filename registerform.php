<?php include('register.php')?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<form action = "register.php" method="POST" autocomplete="off">
		<h1>Register</h1>
		<p>Please complete this form and submit to create an account</p>
		
		<label for="username"><b>Username</b></label>
		<input type="text" placeholder="Enter Username" name="username" required>
		
		<label for="password"><b>Password</b></label>
		<input type="password" placeholder="Enter Password" name="password" required>
		
		<label for="repeatpw"><b>Repeat Password</b></label>
		<input type="password" placeholder="Repeat Password" name="repeatpw" required>
		
		<p><label for="customerName"><b>Name</b></label>
		<input type="text" placeholder="Enter Your Name" name="customerName" required>
		
		<label for="address"><b>Address</b></label>
		<input type="text" placeholder="Enter Your Address" name="address" required>
		
		<label for="email"><b>Email</b></label>
		<input type="email" placeholder="Enter Email" name="email" required></p>
		
		When you completed every sections, please click the submit button below
		<p><button type="submit" name="register">Submit</button></p>

		<p>Already have an account? <a href="login.php">Sign in</a></p>
	</form>
<body>
</body>
</html>
