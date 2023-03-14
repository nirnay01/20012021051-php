<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo prcatical</title>
    <style>
        
    </style>
</head>
<body>
   <?php echo "<p style=color:red>Hello World </p>" ?>
   <?php $a="name"; $b=10 ?>
   <?php echo $a ;print $b; ?>

   <?php echo "<table border=1px align=center>"; ?>
   <?php for($i=1;$i<=10;$i++){ ?>
   <?php if($i%2==0){ ?>
   <?php echo "<tr style=background-color:red>"; ?>
   <?php }else{ ?>
   <?php echo "<tr>"; ?>
   <?php } ?>
   <?php echo "<td>"; ?>
   <?php echo $a; ?>
   <?php echo "</td>"; ?>
   <?php echo "</tr>"; ?>
   <?php } ?>
   <?php echo "</table>"; ?>

</body>
</html>