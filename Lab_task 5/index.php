<?php
include "nav.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
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
    <form action="controller/add_data.php" method="POST" >
        <fieldset id = "field1">
            <legend><b>ADD PRODUCT</b></legend>

            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br>

            <level for = "buying-price">Buying price</level><br>
            <input type = "number" step="any" id = "buying_price" name = "buying_price" required"><br>

            
            <level for = "selling-price">Selling price</level><br>
            <input type = "number" step="any" id = "selling_price" name = "selling_price" required"><br><hr>

            <input type = "checkbox" id ="display" name = "display" value="yes">Display<br><hr>
            <input type="submit" value="Save" name="submit">


        </fieldset>
    </form>
</body>
</html>