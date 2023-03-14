<!-- 7.	Write a PHP program to print an arithmetic progression series.  -->
<?php
function AP($a,$b,$d){
$first = $a;
$last = $b;
$diff = $d;
for($i = $first; $i <= $last; $i += $diff)
{
echo $i." ";
}
}
AP(200,250,10);
echo "</br>";
AP(10,100,20);
?>