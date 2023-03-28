<?php
session_start();
$name = $_SESSION["name"];
$rollno = $_SESSION["rollno"];
$date = $_SESSION["date"];
$branch = $_SESSION["branch"];
$year = $_SESSION["year"];
$email = $_SESSION["email"];
$phoone = $_SESSION["phone"];
$address = $_SESSION["address"];
?>

<html>
    <head>
        <title> Student Details </title>
    </head>
    <body>
        <table style="color:white; background-color:993333">
            <tr>
                <td colspan="2" align="center">
                    Ganpat University
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" rowspan="2">
                    Student Registration Form
                </td>
            </tr>
            <tr>
            </tr>
            <tr>
                <td > 
                    Name 
                </ td>
                <td> 
                    <?php echo $name; ?> 
                </td>
            </tr>
            <tr>
                <td> 
                    Roll No. 
                </td>
                <td> 
                    <?php echo $rollno; ?> 
                </td>
            </tr>
                <td> Date </td>
                <td> 
                    <?php echo $date; ?> 
                </td>
            </tr>
            <tr>
                <td> 
                    Branch 
                </td>
                <td> 
                    <?php echo $branch; ?> 
                </td>
            </tr>
            <tr>
                <td> 
                    Year 
                </td>
                <td> 
                    <?php echo $year; ?> 
                </td>
            </tr>
            <tr>
                <td> 
                    Email 
                </td>
                <td> 
                    <?php echo $email; ?> 
                </td>
            </tr>
            <tr>
                <td> Phone </td>
                <td> <?php echo $phoone; ?> </td>
            </tr>
            <tr>
                <td> 
                    Address 
                </td>
                <td> 
                    <?php echo $address; ?> 
                </td>
            </tr>
        </table>
    </body>
</html>
