<?php
include "nav.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <style>
        #field1{
            width: 300px;
            height: auto;
            text-align:center;
            margin-left: auto;
  margin-right: auto;
        }
        #table1{
    width: 400px;
    height: 270px;
    table-layout: fixed; 
}
        
       
    </style>
</head>
<body>
    
        <fieldset id = "field1">
        <legend><b>Search</b></legend>
 <form method="post" action="controller/search_data.php">
        <input type="text" name="name" class="search" placeholder="">
         <input type="submit" name="submit" class="submit" value="Search by name"><br><hr>
       </form>
    


    </fieldset>
    
</body>
</html>