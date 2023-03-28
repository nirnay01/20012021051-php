<!-- create a html form for one input with submit button -->
<html>
<body>
<form method="post">
<input type="text" name="Database" placeholder="enter database here" required>
<input type="submit" name="submit">
</form>
</body>
</html>
<!-- create a php programe to get the input and pass into mysqli qury -->
<?php
if(isset($_POST['submit'])){
    $servername = "localhost";
    $username="root";
    $password="";
    $database=$_POST['Database'];
    $conn = mysqli_connect($servername, $username, $password);
    
    if($conn){
        $sql="CREATE DATABASE $database";
        if(mysqli_query($conn,$sql)){
            echo "table created successfully";
        }else{
            print "table not created";
        }
    } 
}
?>