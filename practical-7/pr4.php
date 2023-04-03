<!-- Write a PHP program to create 'customer feedback form' and store data into Customer table.  -->
<?php
include_once("connectdb.php");
?>
<html>
<head>
<title>Customer Feedback Form</title>
</head>
<body>
<br><br>
    <table border="1px">
        <form method="post">
            <tr>
                <td>Customer ID:</td>
                <td><input type="text" name="id" /></td>
            </tr>
            <tr>
                <td>Customer Name:</td>
                <td><input type="text" name="name" /></td>
            </tr>
            <tr>
                <td>Item Name:</td>
                <td><input type="text" name="item" /></td>
            <tr>
                <td>Customer Feedback:</td>
                <td><textarea name="feedback" rows="5" cols="40"></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Submit" /></td>
            </tr>
        </form>
    </table>
</body>
</html>

<?php
    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $item = $_POST['item'];
        $feedback = $_POST['feedback'];
        $query = "INSERT INTO customers('c_name','name_item','review_product') VALUES('$name','$item','$feedback')";
        $result = mysqli_query($conn,$query);
        if($result)
        {
            echo "Data Inserted Successfully";
        }
        else
        {
            echo "Data Insertion Failed";
        }
    }
mysqli_close($conn);
?>