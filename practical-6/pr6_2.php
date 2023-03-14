<?php
// 	Write a PHP Program to read content from file and count vowels, consonants, digits and white spaces.
$fp = fopen("pr6_2.txt", "r");
$contents = fread($fp, filesize("pr6_2.txt"));
fclose($fp);
$contents = strtolower($contents);
$vowels = 0;
$consonants = 0;
$digits = 0;
$whitespaces = 0;
for ($i = 0; $i < strlen($contents); $i++) {
    if ($contents[$i] == 'a' || $contents[$i] == 'e' || $contents[$i] == 'i' || $contents[$i] == 'o' || $contents[$i] == 'u') {
        $vowels++;
    } else if ($contents[$i] >= 'a' && $contents[$i] <= 'z') {
        $consonants++;
    } else if ($contents[$i] >= '0' && $contents[$i] <= '9') {
        $digits++;
    } else if ($contents[$i] == ' ') {
        $whitespaces++;
    }
}
echo "Vowels: $vowels<br>";
echo "Consonants: $consonants<br>";
echo "Digits: $digits<br>";
echo "White Spaces: $whitespaces<br>";
?>