<?php   

include_once("./prac8_connection.php");
session_start();

if(isset($_SESSION['admin'])){
    $enrollment = $_GET['enrollment'];
    $table_name = "student";
    $sql = "DELETE FROM $table_name WHERE enrollment='$enrollment'";
    $result = mysqli_query($con, $sql);
    if($result){
        header("Location:prac8_admin.php");
    }
    else{
        echo "Error : ".mysqli_error($con);
    }
}
else{
    header("Location:prac8_admin_login.php");
}

?>