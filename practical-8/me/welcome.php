<!-- create a welcome page which redirects to admin login and student login -->

<html>
    <head>
        <title>Welcome</title>
    </head>
    <body>
        <style>
            table, th, td{
                border: 0px solid black;
                border-collapse: collapse;
            }
            th, td{
                padding: 10px;
            }
        </style>
        <h1 align='center'>Welcome</h1>
        <table align="center">
            <tr>
                <td colspan='2' align='center'>
                    <button>
                        <a href="./admin/prac8_admin_login.php"> Go To Admin Login </a>
                    </button>
                </td>
            </tr>
            <tr>
                <td>
                    <button>
                        <a href="./student/prac8_login.php"> Go To Student Login </a>
                    </button>
                </td>
                <td>
                    <button>
                        <a href="./student/prac8_registration.php"> Go To Student Registration </a>
                    </button>
                </td>
            </tr>
        </table>
    </body>
</html>