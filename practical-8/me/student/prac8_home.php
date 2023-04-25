<html>

<head>
    <title>Student Home</title>
</head>
<style>
    body {
        background-color: #f1f1f1;
    }

    h1 {
        text-align: center;
        color: #000000;
    }

    a {
        /* text-decoration: none; make createive btn*/
        text-align: center;

        color: #000000;
    }
.main_container{
    background-color: black;
}
    .sub1_container {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        background-color: #ffffff;
        width: 30%;
        margin: 0 auto;
        padding: 20px;
        border-radius: 10px;
    }

    .img_container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .logout{
        text-align: center;
        background-color: #CBE4DE;
        width: 10%;
        padding: 10px;
    }
    img {
        /* width: 100px;
            height: 100px; */
        border-radius: 50%;
        margin-left: 50px;
    }
</style>

<body>
    <h1>Welcome to Student Home</h1>

    <?php
    include_once("./prac8_connection.php");
    session_start();
    
    echo "<div class='main_container' >";
    
    echo "<div class='sub1_container' >";
    echo "<div class='sub2_container' >";
    if (isset($_SESSION['enrollment'])) {
        $table_name = "student";
        $enrollment = $_SESSION['enrollment'];
        $sql = "SELECT * FROM $table_name WHERE enrollment = '$enrollment'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "Enrollment: " . $row['enrollment'] . "<br>";
                echo "Name: " . $row['s_name'] . "<br>";
                echo "Branch: " . $row['branch'] . "<br>";
                echo "Photo: " . $row['photo'] . "<br>";
                echo "<img src='../uploads/" . $row['photo'] . "' width='150px' height='150px' align/><br>";
            }
        }
    } else {
        header("Location:prac8_login.php");
    }
    echo "</div>";
    echo "    <div class='logout'> <a href='prac8_logout.php'>Logout</a></div>";
    echo "</div>";

    ?>
    <br />
</body>

</html>