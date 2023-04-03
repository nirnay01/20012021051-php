<!-- 5.	Write a PHP program to display information of Customer table with well formatting (table form) on output screen -->
<?php
include_once("connectdb.php");
$sql = "SELECT * FROM customers";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<table border='1'>";
    echo "<tr><th>Customer ID</th><th>Customer Name</th><th>Product Name</th><th>Feedback</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["c_id"]."</td><td>".$row["c_name"]."</td><td>".$row["name_item"]."</td><td>".$row["review_product"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
mysqli_close($conn);
?>