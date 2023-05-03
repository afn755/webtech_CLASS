<?php 

require_once 'controller/edit_data.php';
$gedit = fetchedit($_GET['id']);


 include "nav.php";



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task5(D)</title>
    
    <style>
        #field1{
            width: 300px;
            height: 300px;
            text-align:center;
            margin-left: auto;
  margin-right: auto;
        }
        </style>
</head>
<body>
    <form action="controller/delete_data.php?id=<?php echo $_GET['id'] ?>" method="post">
        <fieldset id = "field1">
            <legend><b>DELETE PRODUCT</b></legend>
            Name: <?php echo $gedit['name'] ?><br><br>
            Buying price: <?php echo $gedit['buying_price'] ?><br><br>
            Selling price: <?php echo $gedit['selling_price'] ?><br><br>
            Displayable: <?php echo $gedit['display'] ?><br><br><hr>

            <input type="submit" value="Delete" >



        </fieldset>
    </form>
</body>
</html>