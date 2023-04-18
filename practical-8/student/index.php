<?php
session_start();
if (isset($_SESSION["enrollment"])) {
// Redirect to welcome page if already logged in
header("Location:practical_8_welcome.php");
exit();
}
// Process form submission
if (isset($_POST["submit"])) {
$enrollment = $_POST["enrollment"];
$password = $_POST["password"];
// Validate the input data
if (empty($enrollment) || empty($password)) {
$errorMsg = "Please fill out all fields.";
} else {
	// Check if the enrollment and password are correct
	$conn = new mysqli("localhost", "root", "", "pract8");
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM nirnay WHERE enrollment='$enrollment' AND password='$password'";
	$result = $conn->query($sql);
	if ($result->num_rows == 1) {
	// Login successful
	$_SESSION["enrollment"] = $enrollment;
	header("Location: practical_8_welcome.php");
	exit();
	} else {
	$errorMsg = "Invalid enrollment or password.";
	}
	$conn->close();
	}
	}
	?>
	<!DOCTYPE html>
	<html>
	<head>
	<title>Login</title>
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
	border: 3px solid #000;
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

	button{
	display: inline-block;
	}

	a{
	text-decoration: none;
	color: #000;
	}

	a:hover{
	color: #111;
	}
	</style>
	<body>
	<h1>Login</h1>
	<?php if (isset($errorMsg)): ?>
<p style="color: red;"><?php echo $errorMsg; ?></p>
<?php endif; ?>
<form method="post">
<label for="enrollment">Enrollment:</label>
<input type="text" id="enrollment" name="enrollment" required><br>
<label for="password">Password:</label>
<input type="password" id="password" name="password" required><br>
<input type="submit" name="submit" value="Login">
</form>
<br>
<button>
<a href="practical_8_registration.php">Create New Account</a>
</button>
</body>
</html>