<html>
    <head>
    <title> Student Details </title>
</head>
    <body>
    <form  method = "post">
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
                <td >Name </td>
                <td> 
                    <input  type = "text"  name = "name"  size = "30"  maxlength = "30"  required> 
                </td>
            </tr>
            <tr>
                <td> Roll No. </td>
                <td> 
                    <input  type = "text"  name = "rollno"  size = "10"  maxlength = "10"  required> 
                </td>
            </tr>
            <tr>
                <td> Date </td>
                <td> 
                    <input  type = "date"  name = "date"  size = "10"  maxlength = "10"  required> 
                </td>
            </tr>
            <tr>
                <td> Branch </td>
                <td> 
                    <input  type = "text"  name = "branch"  size = "30"  maxlength = "30"  required> 
                </td>
            </tr>
            <tr>
                <td> Year </td>
                <td> 
                    <input  type = "text"  name = "year"  size = "10"  maxlength = "10"  required> 
                </td>
            </tr>
            <tr>
                <td> Email </td>
                <td> 
                    <input  type = "email"  name = "email"  size = "30"  maxlength = "30"  required> 
                </td>
            </tr>
            <tr>
                <td> Phone </td>
                <td> 
                    <input  type = "text"  name = "phone"  size = "10"  maxlength = "10"  required> 
                </td>
            </tr>
            <tr>
                <td> Address </td>
                <td> 
                    <input  type = "text"  name = "address"  size = "30"  maxlength = "30"  required> 
                </td>
            </tr>
            <tr>
                <td> 
                    <input  type = "submit"  name="s"value = "Submit" style="color:blue; background-color:fdb900"> 
                </td>
                <td> 
                    <input  type = "reset"  value = "Reset"style="color:blue; background-color:fdb900"> 
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
if($_POST['s'])
{
    session_start();
    // Set session variables
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["rollno"] = $_POST["rollno"];
    $_SESSION["date"] = $_POST["date"];
    $_SESSION["branch"] = $_POST["branch"];
    $_SESSION["year"] = $_POST["year"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["phone"] = $_POST["phone"];
    $_SESSION["address"] = $_POST["address"];
    header("Location: prac5_2_2.php");
}
?>
