<!-- Create Country State City Dropdown using Ajax in PHP MySQL -->
<!DOCTYPE html>
<html>
<head>
    <title>Country State City Dropdown using Ajax in PHP MySQL</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <style>
        div{
            padding: 10px;
        }
        label{
            display: inline-block;
            width: 100px;
        }
        select{
            display: inline-block;
            width: 200px;
        }
    </style>
</head>
<body>
    <div>
        <label>Country</label>
        <select name="country" id="country">
            <option value="">Select Country</option>
            <?php
            // Create Connection
            $conn=mysqli_connect("localhost","root","","pract9");
            // Check Connection
            if(mysqli_connect_errno()){
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $query = "SELECT * FROM country ORDER BY country_name ASC";
            $run_query = mysqli_query($conn, $query);
            if(mysqli_num_rows($run_query) > 0){
                while($row = mysqli_fetch_array($run_query)){
                    $country_id = $row['country_id'];
                    $country_name = $row['country_name'];
                    echo "<option value='$country_id'>$country_name</option>";
                }
            }else{
                echo "<option value=''>Country not available</option>";
            }
            ?>
        </select>
    </div>
    <div>
        <label>State</label>
        <select name="state" id="state">
            <option value="">Select State</option>
        </select>
    </div>
    <div>
        <label>City</label>
        <select name="city" id="city">
            <option value="">Select City</option>
        </select>
    </div>
    <script>
        $(document).ready(function(){
            $('#country').on('change', function(){
                var country_id = $(this).val();
                if(country_id){
                    $.ajax({
                        type: 'POST',
                        url: 'ajaxData.php',
                        data: 'country_id='+country_id,
                        success: function(html){
                            $('#state').html(html);
                            $('#city').html('<option value="">Select City</option>');
                        }
                    });
                }else{
                    $('#state').html('<option value="">Select State</option>');
                    $('#city').html('<option value="">Select City</option>');
                }
            });
            $('#state').on('change', function(){
                var state_id = $(this).val();
                if(state_id){
                    $.ajax({
                        type: 'POST',
                        url: 'ajaxData.php',
                        data: 'state_id='+state_id,
                        success: function(html){
                            $('#city').html(html);
                        }
                    });
                }else{
                    $('#city').html('<option value="">Select City</option>');
                }
            });
        });
    </script>
</body>
</html>

<!-- make database for this -->
 <!-- CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(1, 'India'),
(2, 'USA'),
(3, 'UK'),
(4, 'Canada'),
(5, 'Australia');

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `state` (`state_id`, `country_id`, `state_name`) VALUES
(1, 1, 'Gujarat'),
(2, 1, 'Maharashtra'),
(3, 1, 'Rajasthan'),
(4, 1, 'Punjab'),
(5, 1, 'Karnataka'),
(6, 2, 'California'),
(7, 2, 'Florida'),
(8, 2, 'Texas'),
(9, 2, 'New York'),
(10, 2, 'Washington'),
(11, 3, 'London'),
(12, 3, 'Manchester'),
(13, 3, 'Liverpool'),
(14, 3, 'Birmingham'),
(15, 3, 'Leeds'),
(16, 4, 'Ontario'),
(17, 4, 'Quebec'),
(18, 4, 'Alberta'),
(19, 4, 'British Columbia'),
(20, 4, 'Manitoba'),
(21, 5, 'New South Wales'),
(22, 5, 'Queensland'),
(23, 5, 'Victoria'),
(24, 5, 'Western Australia'),
(25, 5, 'South Australia');

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `city` (`city_id`, `state_id`, `city_name`) VALUES
(1, 1, 'Ahmedabad'),
(2, 1, 'Surat'),
(3, 1, 'Vadodara'),
(4, 1, 'Rajkot'),
(5, 1, 'Gandhinagar'),
(6, 2, 'Mumbai'),
(7, 2, 'Pune'),
(8, 2, 'Nagpur'),
(9, 2, 'Nashik'),
(10, 2, 'Thane'),
(11, 3, 'Jaipur'),
(12, 3, 'Jodhpur'),
(13, 3, 'Udaipur'),
(14, 3, 'Ajmer'),
(15, 3, 'Kota'),
(16, 4, 'Ludhiana'),
(17, 4, 'Amritsar'),
(18, 4, 'Jalandhar'),
(19, 4, 'Patiala'),
(20, 4, 'Bathinda'),
(21, 5, 'Bengaluru'),
(22, 5, 'Mysuru'),
(23, 5, 'Hubli'),
(24, 5, 'Mangalore'),
(25, 5, 'Belgaum'),
(26, 6, 'Los Angeles'),
(27, 6, 'San Diego'),
(28, 6, 'San Jose'),
(29, 6, 'San Francisco'),
(30, 6, 'Fresno'),
(31, 7, 'Miami'),
(32, 7, 'Tampa'),
(33, 7, 'Orlando'),
(34, 7, 'Jacksonville'),
(35, 7, 'Tallahassee'),
(36, 8, 'Houston'),
(37, 8, 'San Antonio'),
(38, 8, 'Dallas'),
(39, 8, 'Austin'),
(40, 8, 'Fort Worth'),
(41, 9, 'New York City'),
(42, 9, 'Buffalo'),
(43, 9, 'Rochester'),
(44, 9, 'Yonkers'),
(45, 9, 'Syracuse'); -->