<!DOCTYPE html>
	<html>
	<head>
	<title>Student Registration</title>
	</head>
	<style>
		/* give a nice css for this  */

		body {
			background-color: #f1f1f1;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 14px;
			line-height: 1.6em;
			margin: 0 auto;
			padding: 0;
			width: 80%;
		}

		h1 {
			background-color: #333;
			color: #fff;
			font-size: 24px;
			margin: 0;
			padding: 10px;
		}

		form {
			background-color: #fff;
			border: 1px solid #ccc;
			padding: 10px;
		}

		label {
			display: block;
			margin: 5px 0;
		}

		input[type="text"],
		input[type="password"] {
			border: 1px solid #ccc;
			padding: 5px;
			width: 300px;
		}

		input[type="submit"] {
			background-color: #333;
			border: 0;
			color: #fff;
			cursor: pointer;
			padding: 5px 10px;
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
	<h1>Student Registration</h1>
	<form method="post" enctype="multipart/form-data">
	<label for="enrollment">Enrollment:</label>
	<input type="text" id="enrollment" name="enrollment" required><br>
	<label for="name">Name:</label>
	<input type="text" id="name" name="name" required><br>
	<label for="branch">Branch:</label>
<input type="text" id="branch" name="branch" required><br>
<label for="password">Password:</label>
<input type="password" id="password" name="password" required><br>
<label for="photo">Photo:</label>
<input type="file" id="photo" name="photo" required><br>
<input type="submit" name="submit" value="Register" class="btnb">
</form>
</div>
</body>
</html>
<?php
// Process form submission
if (isset($_POST["submit"])) {
$enrollment = $_POST["enrollment"];
$name = $_POST["name"];
$branch = $_POST["branch"];
$password = $_POST["password"];
$photo = $_FILES["photo"]["name"];
// Validate the input data
if (empty($enrollment) || empty($name) || empty($branch) || empty($password) || empty($photo)) {
$errorMsg = "Please fill out all fields.";
} else {
// Check if the enrollment already exists
$conn = new mysqli("localhost", "root", "", "pract8");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM nirnay WHERE enrollment='$enrollment'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$errorMsg = "Enrollment already exists.";
} else {
// Upload photo to server
$target_dir = "uploads/";
$target_file = $target_dir . basename($photo);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$check = getimagesize($_FILES["photo"]["tmp_name"]);
if ($check !== false) {
$uploadOk = 1;
} else {
$errorMsg = "File is not an image.";
$uploadOk = 0;
}
if ($uploadOk == 0) {
$errorMsg = "Sorry, your file was not uploaded.";
} else {
if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
// Insert student data into database
$sql = "INSERT INTO nirnay (enrollment, name, branch, password, photo) VALUES ('$enrollment', '$name', '$branch', '$password', '$photo')";
if ($conn->query($sql) === true) {
	// Redirect to login page
	echo "hello";
	header("Location:index.php");
	exit();
	} else {
	$errorMsg = "Error: " . $sql . "<br>" . $conn->error;
	}
	} else {
	$errorMsg = "Sorry, there was an error uploading your file.";
	}
	}
	}
	$conn->close();
	}
	}
	?>
	