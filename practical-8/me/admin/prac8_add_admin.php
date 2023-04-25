<!-- add admin in database -->

<html>
    <head>
        <title>Add Admin</title>
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
        <h1>Add Admin</h1>
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
                    <td align="center"><input type="submit" name="submit" value="Add Admin"></td>
                    <td>
                        <button>
                            <a href="./prac8_admin.php"> Go To Admin Page </a>
                        </button>                        
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>

<?php
    include_once("./prac8_connection.php");
    if(isset($_POST['submit'])){
        $admin_name = $_POST['admin_name'];
        $admin_password = $_POST['admin_password'];
        $sql = "INSERT INTO $table_name VALUES('$admin_name', '$admin_password')";
        $result = mysqli_query($con, $sql);
        if($result){
            echo "Admin Added Successfully";
        }
        else{
            echo "Error: ".mysqli_error($con);
        }
    }
?>