<html>
    <head>
        <title>Student Logout</title>
    </head>
    <body>
        <h1>Logout</h1>
        <?php
            include_once("prac8_connection.php");
            session_start();
            session_destroy();
            header("Location:../welcome.php");
            mysqli_close($con);
        ?>
    </body>
</html>

