<!-- How do you create a connection between PHP and MySQL explain its step by step procedure?  -->

<?php
$servername = "localhost";
$username="root";
$password="";

// Create connection
@$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " .mysqli_connect_error());
}
echo "Connected successfully";
// close the connection
mysqli_close($conn);
?>

