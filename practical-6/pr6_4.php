<!-- 4.	Write a PHP Program to save uploaded file (if not exists) into new location and display link into browser to open file. -->
<?php
if(isset($_POST['submit']))
{
    $filename = $_FILES['file']['name'];
    $filesize = $_FILES['file']['size'];
    $filetype = $_FILES['file']['type'];
    $filetmp = $_FILES['file']['tmp_name'];
    mkdir("uploads");
    $filepath = "uploads/".$filename;
    if(move_uploaded_file($filetmp,$filepath))
    {
        echo "File Uploaded Successfully";
        echo "<br>";
        echo "File Name : ".$filename;
        echo "<br>";
        echo "File Size : ".$filesize;
        echo "<br>";
        echo "File Type : ".$filetype;
        echo "<br>";
        echo "File Path : ".$filepath;
        echo "<br>";
        echo "<a href='$filepath'>Click Here to Open File</a>";
    }
    else
    {
        echo "File Not Uploaded";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>