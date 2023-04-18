<?php
session_start();
if (!isset($_SESSION["enrollment"])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
    }
    // Process form submission
    if (isset($_POST["submit"])) {
    $enrollment = $_SESSION["enrollment"];
    $oldPassword = $_POST["oldPassword"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];
    // Validate the input data
    if (empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
    $errorMsg = "Please fill out all fields.";
    } elseif ($newPassword != $confirmPassword) {
    $errorMsg = "New password and confirm password do not match.";
    } else {
    // Check if the old password is correct
    $conn = new mysqli("localhost", "root", "", "pract8");
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM nirnay WHERE enrollment='$enrollment' AND password='$oldPassword'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        // Update the password
$sql = "UPDATE nirnay SET password='$newPassword' WHERE enrollment='$enrollment'";
if ($conn->query($sql) === TRUE) {
$successMsg = "Password changed successfully.";
} else {
$errorMsg = "Error: " . $sql . "<br>" . $conn->error;
}
} else {
$errorMsg = "Incorrect old password.";
}
$conn->close();
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Change Password</title>
</head>
<style>
/* give a nice css */
body {
/* background color is light grey */
background-color: #f1f1f1;
/* alignment is center */
margin: auto;
/* width is 50% */
width: 50%;
/* border is 3px solid black */
}

h1{
text-align: center;
}

form{
text-align: center;
}

button{
text-align: center;
}
div{
		/* align center */
		margin: auto;
		/* width is 50% */
		width: 50%;

		text-align: center;
		color: #000;
		/* give a  border */
		border: 3px solid #000;
		/* give a padding */	
		padding: 10px;
	}
    .btnb{
        background-color: #87DEE7;
        color: #000;
        border: 2px solid #000;
        padding: 10px;
        border-radius: 5px;
    }
    .btnr{
        /* give red color */
        background-color: #FF0000;
        color: #000;
        border: 2px solid #000;
        padding: 10px;
        border-radius: 5px;
    }
</style>
<body>
    <div>
<h1>Change Password</h1>
<?php if (isset($errorMsg)): ?>
<p style="color: red;"><?php echo $errorMsg; ?></p>
<?php endif; ?>
<?php if (isset($successMsg)): ?>
<p style="color: green;"><?php echo $successMsg; ?></p>
<?php endif; ?>
<form method="post">
<label for="oldPassword">Old Password:</label>
<input type="password" id="oldPassword" name="oldPassword" required><br>
<label for="newPassword">New Password:</label>
<input type="password" id="newPassword" name="newPassword" required><br>
<label for="confirmPassword">Confirm Password:</label>
<input type="password" id="confirmPassword" name="confirmPassword" required><br>
<input type="submit" name="submit" value="Change Password" class="btnb">
</form>
<br>
<button class="btnb">
<a href="practical_8_welcome.php">Back to Welcome Page</a>
</button>
<br>
<button class="btnr">
<a href="practical_8_logout.php">Logout</a>
</button>
</div>
</body>
</html>