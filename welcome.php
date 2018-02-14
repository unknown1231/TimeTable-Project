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
		color:white;
		text-align:center;
	}
	h2{
		font-family: Helvetica Neue;
		color:white;
		text-align:center;
	}
	p{
		font-family: Helvetica Neue;
		text-align:center;
	}
  body{
background-image: url("Dark-Background-63.jpg");
background-attachment: fixed;
  background-size: cover;
}
.ghost-button {
display: inline-block;
  width: 200px;
  padding: 8px;
  color: #fff;
  border: 2px solid #fff;
  text-align: center;
  outline: none;
  text-decoration: none;
  -webkit-transition: background-color 0.2s ease-out, border-color 0.2s ease-out;
  transition: background-color 0.2s ease-out,
              border-color 0.2s ease-out;
}
.ghost-button:hover,
.ghost-button:active {
  background-color: #fff; /* fallback */
  background-color: rgba(255, 255, 255, 0.4);
  border-color: #fff; /* fallback */
  border-color: rgba(255, 255, 255, 0.4);
  -webkit-transition: background-color 0.3s ease-in, border-color 0.3s ease-in;
  transition: background-color 0.3s ease-in,
              border-color 0.3s ease-in;
}
    </style>
</head>
<body>
<h1>Welcome <b><?php echo $_SESSION['username']; ?></b></h1>
		<h2> Page under construction <h2>
    <div id="container">
        
    </div>
	<p><a href=create.html class="ghost-button">Create Timetable</a></p>
	<p><a href=update.html class="ghost-button">Update Timetable</a></p>
	<p><a href="logout.php" class="ghost-button">Sign Out of Your Account</a></p>
</body>
</html>