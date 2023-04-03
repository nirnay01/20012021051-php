<?php
$servername = "localhost";
$username="root";
$password="";
$database="mydb";
$conn = mysqli_connect($servername, $username, $password,$database);
// @mysqli_connect($servername,$database,$password,$database);
if($conn){
    echo "<script>alert('connected successfully')</script>";
}else{
    echo "<script>alert('not connected')</script>";
}
?>