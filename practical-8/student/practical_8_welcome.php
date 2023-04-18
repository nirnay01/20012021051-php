<?php
session_start();
if (!isset($_SESSION["enrollment"])) {
// Redirect to login page if not logged in
header("Location: practical_8_login.php");
exit();
}
$enrollment = $_SESSION["enrollment"];
// Get the user data from the database
$conn = new mysqli("localhost", "root", "", "pract8");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM nirnay WHERE enrollment='$enrollment'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
$row = $result->fetch_assoc();
$name = $row["name"];
$branch = $row["branch"];
$photo = $row["photo"];
} else {
die("Error: student not found.");
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome</title>
</head>
<style>
/* give a nice user friendly css */ 

body {
background-color: #f1f1f1;
/* alignment is center */
margin: auto;
/* width is 50% */
width: 50%;

}

img{
width: 200px;
height: 200px;
border-radius: 50%;
}

a{
text-decoration: none;
color: #000;
}

a:hover{
color: #111;
}

h1{
text-align: center;
}

p{
text-align: center;
}

button{
text-align: center;
}
div{
		/* align center */
		margin: auto;
		/* width is 50% */
		/* width: 50%; */

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
    <div><h1>Welcome, <?php echo $name; ?>!</h1>
<p>Your enrollment is <?php echo $enrollment; ?> and your branch is <?php echo $branch; ?>.</p>
<img src="uploads/<?php echo $photo; ?>" alt="Profile Photo">
<br>
<button class="btnb">
<a href="practical_8_changepd.php">Change Password</a>
</button>
<br>
<button class="btnr">
<a href="practical_8_logout.php">Logout</a>
</button>
</div>
</body>
</html>