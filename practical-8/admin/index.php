<!--
2. Create Admin module to perform update, delete, display records
with order by and search operation with Student table.
[Note: Same as grid view design] -->
<?php
// include_once("config.php");
if(isset($_POST['update']))
{
    $conn = new mysqli("localhost", "root", "", "pract8");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
$id = $_POST['id'];
$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email' WHERE id=$id");
header("Location: index.php");
}
?>
<?php
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM nirnay WHERE id=$id");
while($res = mysqli_fetch_array($result))
{
$name = $res['name'];
$age = $res['age'];
$email = $res['email'];
}
?>
<html>
<head>
<title>Edit Data</title>
</head>
<body>
<a href="index.php">Home</a>
<br/><br/>
<form name="form1" method="post" action="edit.php">
<table border="0">
<tr>
<td>Name</td>
<td><input type="text" name="name" value="<?php echo $name;?>"></td>

</tr>
<tr>
<td>Age</td>
<td><input type="text" name="age" value="<?php echo $age;?>"></td>
</tr>
<tr>
<td>Email</td>
<td><input type="text" name="email" value="<?php echo $email;?>"></td>
</tr>
<tr>
<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
<td><input type="submit" name="update" value="Update"></td>
</tr>
</table>
</form>
</body>
</html>
