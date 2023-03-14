<!-- 1.	Write a PHP Program to write sentence in text file. -->
<?php
$fp = fopen("pr6_1.txt", "w");
fwrite($fp, "Hello Nirnay. Testing!");
fclose($fp);
?>
