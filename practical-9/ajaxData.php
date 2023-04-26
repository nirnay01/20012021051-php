<!-- // Path: practical-9\ajaxData.php -->
<?php
// Create Connection
$conn=mysqli_connect("localhost","root","","pract9");
// Check Connection
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// Fetch State by Country ID
if(isset($_POST['country_id'])){
    $country_id = $_POST['country_id'];
    $query = "SELECT * FROM state WHERE country_id = '$country_id' ORDER BY state_name ASC";
    $run_query = mysqli_query($conn, $query);
    $count = mysqli_num_rows($run_query);
    if($count > 0){
        echo "<option value=''>Select State</option>";
        while($row = mysqli_fetch_array($run_query)){
            $state_id = $row['state_id'];
            $state_name = $row['state_name'];
            echo "<option value='$state_id'>$state_name</option>";
        }
    }else{
        echo "<option value=''>State not available</option>";
    }
}

// Fetch City by State ID
if(isset($_POST['state_id'])){
    $state_id = $_POST['state_id'];
    $query = "SELECT * FROM city WHERE state_id = '$state_id' ORDER BY city_name ASC";
    $run_query = mysqli_query($conn, $query);
    $count = mysqli_num_rows($run_query);
    if($count > 0){
        echo "<option value=''>Select City</option>";
        while($row = mysqli_fetch_array($run_query)){
            $city_id = $row['city_id'];
            $city_name = $row['city_name'];
            echo "<option value='$city_id'>$city_name</option>";
        }
    }else{
        echo "<option value=''>City not available</option>";
    }
}
?>