<!-- 
    Write a PHP Program to create table at run time by passing table name and no. of fields through text boxes same as PHPMYADMIN interface. 
 -->
 <!DOCTYPE html>
<html>
<head>
	<title>Create Table</title>
</head>
<body>
	<h1>Create Table</h1>
	<form action="" method="post">
		<label for="table_name">Table Name:</label>
		<input type="text" name="table_name" id="table_name"><br><br>
		<label for="num_fields">Number of Fields:</label>
		<input type="number" name="num_fields" id="num_fields" min="1"><br><br>
		<input type="submit" name="submit" value="Create Table">
	</form>
	<?php
		// check if form is submitted
		if (isset($_POST['submit'])) {
			// get table name and number of fields from form
			$table_name = $_POST['table_name'];
			$num_fields = $_POST['num_fields'];
            // using num_fields, create a form to get field names
            // if($num_fields > 0)
            // {
            // echo "<form action='' method='post'>";
            // for ($i = 1; $i <= $num_fields; $i++) 
            // {
            //     echo "<label for='field$i'>Field $i:</label>";
            //     echo "<input type='text' name='field$i' id='field$i'><br><br>";
            // }
            // echo "<input type='submit' name='submit' value='Create Table'>";
            // echo "</form>";
            // }
  
        // check if form is submitted


			// connect to database (replace DB_USERNAME, DB_PASSWORD, and DB_NAME with your database credentials)
			$mysqli = new mysqli('localhost', 'root', '', 'mydb');
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: " . $mysqli->connect_error;
				exit();
			}

			// create table with given table name and number of fields
			$query = "CREATE TABLE $table_name (";
			for ($i = 1; $i <= $num_fields; $i++) {
				$field_name = "field$i";
				$query .= "$field_name varchar(255)";
				if ($i < $num_fields) {
					$query .= ",";
				}
			}
			$query .= ")";
			if ($mysqli->query($query) === TRUE) {
				echo "Table created successfully!";
			} else {
				echo "Error creating table: " . $mysqli->error;
			}

			// close database connection
			$mysqli->close();
        }
	?>
</body>
</html>
