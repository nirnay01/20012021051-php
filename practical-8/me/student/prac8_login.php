<html>
    <head>
        <title>Student Login</title>
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
    
        <h1>Student Login</h1>
        <form method="POST">
            <table>
                <tr>
                    <td>Enrollment No.</td>
                    <td><input type="text" name="enrollment" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td align='center'><input type="submit" name="submit" value="Submit"></td>
                    <td>
                        <button>
                            <a href="../admin/prac8_admin_login.php"> Go To Admin Login </a>
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
        $table_name = "student";
        $enrollment = $_POST['enrollment'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM $table_name WHERE enrollment = '$enrollment' AND s_password = '$password'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0){
            session_start();
            $_SESSION['enrollment'] = $enrollment;
            header("Location:prac8_home.php");
        }
        else{
            echo "Invalid Enrollment or Password";
        }
    }
?>