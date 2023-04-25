<html>
    <head>
        <title>Admin Panel</title>
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
        <h1 align="center">Admin Panel</h1>
        <table align="center">
            <tr>
                <td><a href="prac8_admin.php">Refresh</a></td>
                <td><a href="prac8_add_admin.php">Add Admin</a></td>
                <td><a href="prac8_update.php">Update Student</a></td>
                <td><a href="prac8_delete.php">Delete Student</a></td>
                <td><a href="prac8_logout_admin.php">Logout</a></td>
            </tr>
        </table>
    </body>
</html>


<?php

include_once("./prac8_connection.php");
session_start();

if(isset($_SESSION['admin'])){
    $table_name = "student";
    $sql = "SELECT * FROM $table_name";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        echo "<table border='1' align='center'>";
        echo "<tr>";
        echo "<th>Enrollment</th>";
        echo "<th>Name</th>";
        echo "<th>Branch</th>";
        echo "<th>Photo</th>";
        echo "<th colspan='2'>Action</th>";
        echo "</tr>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['enrollment']."</td>";
            echo "<td>".$row['s_name']."</td>";
            echo "<td>".$row['branch']."</td>";
            echo "<td><img src='../uploads/" . $row['photo'] . "' width='150px' height='150px' align/></td>";
            echo "<td><a href='prac8_update.php?enrollment=".$row['enrollment']."'>Update</a></td>";
            echo "<td><a href='prac8_delete.php?enrollment=".$row['enrollment']."'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else{
        echo "No Record Found";
    }
}
else{
    header("Location:prac8_admin_login.php");
}

?>