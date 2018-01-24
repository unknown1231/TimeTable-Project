<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style>
	h1{
		font-family: Helvetica Neue;
		font-size:55px;
		color:black;
		text-align:center;
	}
	h2{
		font-family: Helvetica Neue;
		color:black;
		text-align:center;
	}
	p{
		font-family: Helvetica Neue;
		text-align:center;
	}
body{
    background-color: #e05915;
  }
  
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Welcome <b><?php echo $_SESSION['username']; ?></b></h1>
		<h2> Page under construction <h2>
    </div>
    <p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
</body>
</html>