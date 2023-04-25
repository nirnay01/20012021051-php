<!-- create admin login in php -->


<html>
    <head>
        <title>Admin Login</title>
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
        <h1>Admin Login</h1>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Admin Name</td>
                    <td><input type="text" name="admin_name" required></td>
                </tr>
                <tr>
                    <td>Admin Password</td>
                    <td><input type="password" name="admin_password" required></td>
                </tr>
                <tr>
                    <td align="center"><input type="submit" name="submit" value="Login"></td>
                    <td>
                        <button>
                            <a href="../student/prac8_login.php"> Go To Student Login </a>
                        </button>                        
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>

<?php
    include_once("./prac8_connection.php");
    session_start();
    if(isset($_POST['submit'])){
        $admin_name = $_POST['admin_name'];
        $admin_password = $_POST['admin_password'];
        $sql = "SELECT * FROM $table_name WHERE admin_name='$admin_name' AND admin_password='$admin_password'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0){
            $_SESSION['admin'] = $admin_name;
            header("Location:prac8_admin.php");
        }
        else{
            echo "Invalid Credentials";
        }
    }
?>