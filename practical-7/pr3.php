<?php
include_once("connectdb.php");
?>
<html>
<body>
<form method="post">
<input type="text" name="t" placeholder="enter table name here" required>
<input type="submit" name="submit">
</form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $tname=$_POST['t'];
    $sql="CREATE TABLE $tname(
        c_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        c_name VARCHAR(30) NOT NULL,
        name_item VARCHAR(30) NOT NULL,
        review_product VARCHAR(50) NOT NULL,
    )";
    if(mysqli_query($conn,$sql)){
        echo "table created successfully";
    }else{
        print "table not created";
    }
}
?>