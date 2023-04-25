<html>
    <head>
        <title>Update</title>
    </head>
    <body>
        <style>
            table, th, td{
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td{
                padding: 10px;
            }
        </style>
        <h1>Update</h1>
        <form action="" method="POST">
        <table>
                <tr>
                    <td>Enrollment No.</td>
                    <td><input type="text" name="enrollment" required></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <td>Branch</td>
                    <td><input type="text" name="branch" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td>Photo</td>
                    <td><input type="file" name="photo" required></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    </body>
</html>

<?php

include_once("./prac8_connection.php");
if(isset($_POST['submit'])){
    $table_name = "student";
    $enrollment = $_POST['enrollment'];
    $name = $_POST['name'];
    $branch = $_POST['branch'];
    $password = $_POST['password'];
    $photo = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];
    $target_path = "../uploads/";
    $target_path = $target_path . basename($photo);

    if(move_uploaded_file($photo_tmp, $target_path)){
        $sql = "INSERT INTO $table_name (enrollment, s_name, branch, s_password, photo) VALUES ('$enrollment', '$name', '$branch', '$password', '$photo')";
        if(mysqli_query($con, $sql)){
            echo "New record created successfully";
            // header("Location:prac8_login.php");
        }
        else
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
    else{
        echo "Error in uploading file";
    }
}

?>