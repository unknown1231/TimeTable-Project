<?php
// Include config file
require_once 'config.php';

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, password FROM users WHERE username = ?";

        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();

                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){
                    // Bind result variables
                    $stmt->bind_result($username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['username'] = $username;
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
	#container {
position: fixed;
    width: 340px;
    height: 270px;
    top: 50%;
    left: 50%;
    margin-top: -170px;
    margin-left: -170px;
    border-radius: 5px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
	}
       p{
		font-family: Helvetica Neue;
		font-size:20px;
		color:white;
		display:inline-block;
	}
	input[type=text], input[type=password] {
	color: #777;
    padding-left: 10px;
    margin: 10px;
    margin-top: 12px;
    margin-left: 18px;
    width: 290px;
    height: 35px;
    border: 1px solid #c7d0d2;
    border-radius: 2px;
    box-shadow: inset 0 1.5px 3px rgba(190, 190, 190, .4), 0 0 0 5px #f5f7f8;
}
	input[type=submit], input[type=reset] {
	float: right;
    margin-right: 20px;
    margin-top: 20px;
    width: 80px;
    height: 30px;
    font-size: 14px;
    font-weight: bold;
    color: blue;
    background-color: #acd6ef; /*IE fallback*/
    background-image: -webkit-gradient(linear, left top, left bottom, from(#acd6ef), to(#6ec2e8));
    background-image: -moz-linear-gradient(top left 90deg, #acd6ef 0%, #6ec2e8 100%);
    background-image: linear-gradient(top left 90deg, #acd6ef 0%, #6ec2e8 100%);
    border-radius: 30px;
    border: 1px solid #66add6;
    box-shadow: 0 1px 2px rgba(0, 0, 0, .3), inset 0 1px 0 rgba(255, 255, 255, .5);
    cursor: pointer;
	}
	label {
    color: white;
    display: inline-block;
    margin-left: 18px;
    padding-top: 10px;
    font-size: 18px;
}input {
    font-family: "Helvetica Neue", Helvetica, sans-serif;
    font-size: 12px;
    outline: none;
}
/*
	h2{
font-family: Helvetica Neue;
font-size:55px;
color:white;
text-align:center;
}*/
.ghost-button {
display: inline-block;
  width: 170px;
  padding: 1px;
  margin-left: 16px;
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
body{
background-image: url("dark_space.png");
background-attachment: fixed;
  background-size: cover;
}
    </style>
</head>
<body>
    <div id="container">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username:</label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password:</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
            <p style = "LINE-HEIGHT:50px;">&nbsp;&nbsp;&nbsp;Don't have an account? <a class="ghost-button" href="register.php">Sign Up</a></p>
        </form>
    </div>
</body>
</html>
