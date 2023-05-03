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
    <title>Edit Data</title>
    <style>
        #field1{
            width: 300px;
            height: 350px;
            text-align:center;
            margin-left: auto;
  margin-right: auto;
  
        }
       
    </style>
</head>
<body>
    <form action="controller/update.php" method="POST">
        <fieldset id = "field1">
            <legend><b>EDIT PRODUCT</b></legend>

            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required value="<?php echo $gedit['name'] ?>"><br>

            <level for = "buying-price">Buying price</level><br>
            <input type = "number" step="any" id = "buying_price" name = "buying_price" value="<?php echo $gedit['buying_price'] ?>" required"><br>

            
            <level for = "selling-price">Selling price</level><br>
            <input type = "number" step="any" id = "sellinging_price" name = "selling_price" value="<?php echo $gedit['selling_price'] ?>" required"><br><hr>
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
            <input type = "checkbox" id = "display" name = "display" value="yes" <?php echo ($gedit['display'] == yes) ? 'checked="checked"' : ''; ?>>Display<br><hr>
            <input type="submit" value="update" name="update">


        </fieldset>
    </form>
</body>
</html>