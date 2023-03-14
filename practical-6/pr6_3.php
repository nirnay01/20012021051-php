
<?php
// 3.	Write a PHP Program to upload File & Display information of file onto browser. [Note: To print File name, Type, Size, Temporary Location]

if(isset($_POST['submit']))
{
$filename = $_FILES['file']['name'];
$filetype = $_FILES['file']['type'];
$filesize = $_FILES['file']['size'];
$filetmp = $_FILES['file']['tmp_name'];
$fileerror = $_FILES['file']['error'];

if($fileerror == 0)
{
echo "File Name: $filename <BR>";
echo "File Type: $filetype <BR>";
echo "File Size: $filesize <BR>";
echo "File Temporary Location: $filetmp <BR>";
}
else
{
echo "Error in uploading file";
}
}
?>
<!-- make html form for this-->
<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
</head>
<body>
    <form action="pr6_3.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="submit">UPLOAD</button>
    </form>
</body>
</html>