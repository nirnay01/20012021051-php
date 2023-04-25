<!--
2. Create Admin module to perform update, delete, display records
with order by and search operation with Student table.
[Note: Same as grid view design] -->
<!-- Path: practical-8\admin\index.html -->
<?php
// Start the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}

// Include config file
// require_once "config.php";

// Define variables and initialize with empty values
$enrollment = $password = "";
$enrollment_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if enrollment is empty
    if(empty(trim($_POST["enrollment"]))){
        $enrollment_err = "Please enter enrollment.";
    } else{
        $enrollment = trim($_POST["enrollment"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($enrollment_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT enrollment, password FROM admin WHERE enrollment = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_enrollment);

            // Set parameters
            $param_enrollment = $enrollment;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if enrollment exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $enrollment, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["enrollment"] = $enrollment;

                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if enrollment doesn't exist
                    $enrollment_err = "No account found with that enrollment.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}

?>
<html>
<head>
<title>Login</title>
</head>
<style>
/* give a nice css */
body {
/* background color is light grey */
background-color: #f1f1f1;
}

h1{
text-align: center;
}

form{
text-align: center;
}

label{
display: inline-block;
width: 100px;
text-align: right;
}

input{
display: inline-block;
}

</style>
<body>
<h1>Login</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<label>Enrollment:</label>
<input type="text" name="enrollment" value="<?php echo $enrollment; ?>">
<span><?php echo $enrollment_err; ?></span>
<br><br>
<label>Password:</label>
<input type="password" name="password" value="<?php echo $password; ?>">
<span><?php echo $password_err; ?></span>
<br><br>
<input type="submit" value="Login">
</form>
</body>
</html>

// Path: practical-8\admin\welcome.php
<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Welcome</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<style type="text/css">
body{ font: 14px sans-serif; text-align: center; }
</style>
</head>
<body>
<div class="page-header">
<h1>Hi, <b><?php echo htmlspecialchars($_SESSION["enrollment"]); ?></b>. Welcome to our site.</h1>
</div>
<p>
<a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
<a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
</p>
</body>
</html>
