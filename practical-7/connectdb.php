<?php
$servername = "localhost";
$username="root";
$password="";
$database="mydb";
$conn = mysqli_connect($servername, $username, $password,$database);
// @mysqli_connect($servername,$database,$password,$database);
if($conn){
    echo "connected successfully";
}else{
    echo "not connected";
}
?>