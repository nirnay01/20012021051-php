<!-- Create Login module for Student with registration page, login page, welcome page, change password page and logout page.
[Note: Student’s registration fields Enrollment, Name, Branch, Password, Photo] -->

<?php
    $server_name = "localhost";
    $username = "root";
    $password = "";
    $db_name = "pract8";
    $table_name = "student";
    $con = mysqli_connect($server_name, $username, $password, $db_name);
?>