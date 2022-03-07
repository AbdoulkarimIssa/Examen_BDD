<?php

$timeout = 300;

// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', $timeout);

ini_set('session.cookie_lifetime', $timeout);

// Initialize the session
session_start();

// Update the timeout of session cookie
$sessionName = session_name();

if(isset($_COOKIE[$sessionName])) {

	setcookie($sessionName, $_COOKIE[ $sessionName ], time() + $timeout, '/' );
}

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
    header("location: Admin.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname",$dbusername, $dbpassword);
	} 
	catch (PDOException $pe)
	{
		die("<br>Erreur de conenxion sur $dbname chez $host :" . $pe->getMessage());
	}

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, password FROM staff WHERE username = :username";
        
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute())
			{
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1)
				{
                    if($row = $stmt->fetch())
					{
                        $username = $row["username"];
                        $hashed_password = $row["password"];

						$hashed_password2 = hash('sha1',($password));
												
                        if($hashed_password == $hashed_password2)
						{
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: Admin.php");
                        } else
						{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } 
				else
				{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } 
			else
			{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Close connection
    unset($pdo);
}
?>
 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <!-- Form -->
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h1 style="text-align:center">LOGIN</h1>
				<?php 
				if(!empty($login_err)){
    				echo '<div class="alert alert-danger">' . $login_err . '</div>';
				}        	
				?>
                <!-- Input fields -->
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
					<span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
					<input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
					<span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
				<div class="form-group">
    					<input type="submit" class="btn btn-primary" value="Login">
				</div>
            </form>
        </div>
    </div>
</div>


