<?php
$servername = "localhost";
$user_name = "root";
$pass_word = "";
$dbname = "responses";

// Create connection
$conn = new mysqli($servername, $user_name, $pass_word, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO MyAdmin (username, password) VALUES(?, ?)";

if($stmt = $conn->prepare($sql)){
	//bind variables to the prepared statement as parameters
	$stmt->bind_param("ss", $username, $password);
	
	//set paremeters
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	
	//attempt to execute prepared statement
	if($stmt->execute()){
		echo"Records inserted successfully.";
	}else{
		echo"Error:could not insert. " . $conn->error;
	}
} else{
	echo"Error: could not prepare query: $sql. " . $conn->error;
}

//close statement
$stmt->close();

//close connection
$conn->close();
?>
	