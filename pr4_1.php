<!-- 7.	Write a PHP program to print an arithmetic progression series.  -->
<?php
$first = 1;
$last = 10;
$diff = 2;
for($i = $first; $i <= $last; $i += $diff)
{
echo $i." ";
}
?>