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
background-image: url("dark_space.png");
background-attachment: fixed;
  background-size: cover;
}
.ghost-button {
display: inline-block;
  width: 200px;
  padding: 15px;
  margin: 2%;
  opacity: 0.6;
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
  opacity: 1;
  background-color: #fff; /* fallback */
  background-color: rgba(255, 255, 255, 0.4);
  border-color: #fff; /* fallback */
  border-color: rgba(255, 255, 255, 0.4);
  -webkit-transition: background-color 0.3s ease-in, border-color 0.3s ease-in;
  transition: background-color 0.3s ease-in,
              border-color 0.3s ease-in;
}

#caps{
  text-transform: uppercase;
}
    </style>
</head>
<body>
<h1><u>WELCOME <b id="caps"><?php echo $_SESSION['username']; ?></b></u></h1>
		<!--<h2> Page under construction <h2>-->
    <div id="container">

    </div>
	<p><a href=press_create.html class="ghost-button">Create Timetable</a></p>
	<p><a href=press_update.html class="ghost-button">Update Timetable</a></p>
	<p><a href="logout.php" class="ghost-button">Sign Out of Your Account</a></p>
</body>
</html>
