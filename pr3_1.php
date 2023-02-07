<!-- 6.	Write a PHP program to remove duplicate values from an array.  -->
<?php
$color = array('white', 'green', 'red', 'blue', 'black','black');
$color = array_unique($color);
print_r($color);
?>