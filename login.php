<?php 
session_start(); //start session
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
?>
<body>
<link href="style.css" rel="stylesheet" type="text/css">
<form method="POST" autocomplete="off">
  <h2 >Please Login</h2>
  <div>
  <label>Username:</label>
  <input type="text" name="username" placeholder="Username" required>
  </div> 
  <p><label>Password:</label>
  <input type="password" name="password" id="inputPassword" placeholder="Password" required>
	<p></p><button type="submit">Login</button></p>
</form>
<?php
if (isset($_POST['username']) and isset($_POST['password'])){
$id = $_POST['username'];
$pw = $_POST['password'];
  
$query = "select * from customertbl where username='$id' and password='$pw'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

if($id==$row['username'] && $pw==$row['password']){ //if username and password are correct
   $_SESSION['id']=$row['username'];
   echo "<script type='text/javascript'>
   window.location.replace('http://hanyinhong.000webhostapp.com/index.php')</script>"; 

}else{ //if username and password are wrong, going back to login page

   echo "<script>window.alert('Invalid Login Credentials');</script>"; // if username and password are different
   echo "<script>location.href='login.php';</script>";

}if($_SESSION['id']==null) { //if user hasn't logged in
}
}
?>

<form action="registerform.php" method="POST">
If you do not have an account,<br>please click the button below
	<p><button type="submit">Register</button></p>
</form>
</body>
