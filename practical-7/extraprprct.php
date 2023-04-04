<!DOCTYPE html>
<html>
<head>
    <title>Create Table</title>
</head>
<body>
    <h1>Create Table</h1>
    <form method="POST">
        <label for="tableName">Table Name:</label>
        <input type="text" name="tableName"><br><br>
        <label for="numFields">Number of Fields:</label>
        <input type="text" name="numFields"><br><br>
        <?php
            if(isset($_POST['submit'])) {
                $tableName = $_POST['tableName'];
                $numFields = $_POST['numFields'];
                echo "<table>";
                for($i=1; $i<=$numFields; $i++) {
                    echo "<tr>";
                    echo "<td><label for='field$i'>Field $i:</label></td>";
                    echo "<td><input type='text' name='field$i'></td>";
                    echo "<td><label for='type$i'>Type:</label></td>";
                    echo "<td><select name='type$i'>";
                    echo "<option value='int'>INT</option>";
                    echo "<option value='varchar'>VARCHAR</option>";
                    echo "<option value='text'>TEXT</option>";
                    echo "</select></td>";
                    echo "</tr>";
                }
                echo "</table><br><br>";
                echo "<input type='submit' name='createTable' value='Create Table'>";
            }
        ?>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>

<?php
if(isset($_POST['createTable'])) {
    $tableName = $_POST['tableName'];
    $numFields = $_POST['numFields'];
    
    // $tableName = $_GET['tableName'];
    // $numFields = $_GET['numFields'];
    $fields = array();
    $types = array();
    for($i=1; $i<=$numFields; $i++) {
        $fields[$i] = $_POST['field'.$i];
        $types[$i] = $_POST['type'.$i];
    }
    // echo $fields ;
    // echo $types;
    $fieldTypes = implode(',', $types);
    $fieldNames = implode(',', $fields);
    // print_r($fieldNames, $fieldTypes);
    // $sql = "CREATE TABLE $tableName ($fieldNames $fieldTypes)";
    $sql = "CREATE TABLE $tableName (";
			for ($i = 1; $i <= $numFields; $i++) {
				$fieldname = $fieldNames[$i];
                $fieldtype = $fieldTypes[$i];
				$sql .= "$fieldname $fieldtype(20)";
				if ($i < $numFields) {
					$sql .= ",";
				}
			}
            $sql .= ")";
    echo $sql;
    $conn = mysqli_connect("localhost", "root", "", "mydb");
    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if(mysqli_query($conn, $sql)) {
        echo "Table $tableName created successfully";
    }
    else {
        echo "Error creating table: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>





<!-- ------------------new -------------------- -->
<!-- <!DOCTYPE html>
<html>
<head>
    <title>Create Table</title>
</head>
<body>
    <h1>Create Table</h1>
    <form method="POST">
        <label for="tableName">Table Name:</label>
        <input type="text" name="tableName"><br><br>
        <label for="numFields">Number of Fields:</label>
        <input type="text" name="numFields"><br><br> -->
        <?php
            // if(isset($_POST['submit'])) {
            //     $tableName = $_POST['tableName'];
            //     $numFields = $_POST['numFields'];
            //     echo "<table>";
            //     for($i=1; $i<=$numFields; $i++) {
            //         echo "<tr>";
            //         echo "<td><label for='field$i'>Field $i:</label></td>";
            //         echo "<td><input type='text' name='field$i'></td>";
            //         echo "<td><label for='type$i'>Type:</label></td>";
            //         echo "<td><select name='type$i'>";
            //         echo "<option value='int'>INT</option>";
            //         echo "<option value='varchar'>VARCHAR</option>";
            //         echo "<option value='text'>TEXT</option>";
            //         echo "</select></td>";
            //         echo "</tr>";
            //     }
            //     echo "</table><br><br>";
            //     echo "<input type='submit' name='createTable' value='Create Table'>";
            // }
        ?>
        <!-- <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html> -->

<?php
// if(isset($_POST['createTable'])) {
//     $tableName = $_POST['tableName'];
//     $numFields = $_POST['numFields'];
//     $fields = array();
//     $types = array();
//     for($i=1; $i<=$numFields; $i++) {
//         $fields[$i-1] = $_POST['field'.$i];
//         $types[$i-1] = $_POST['type'.$i];
//     }
//     $fieldTypes = implode(',', $types);
//     $fieldNames = implode(',', $fields);
//     $sql = "CREATE TABLE $tableName ($fieldNames $fieldTypes)";
//     //Replace "localhost", "username", "password", and "database_name" with your own database information
//     $conn = mysqli_connect("localhost", "root", "", "mydb");
//     if(!$conn) {
//         die("Connection failed: " . mysqli_connect_error());
//     }
//     if(mysqli_query($conn, $sql)) {
//         echo "Table $tableName created successfully";
//     }
//     else {
//         echo "Error creating table: " . mysqli_error($conn);
//     }
//     mysqli_close($conn);
// }
?>
