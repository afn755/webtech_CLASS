<?php
require_once 'controller/display_data.php';
include "nav.php";
$display = fetchDisplay();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <style>
        #field1{
            width: 300px;
            height: 300px;
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
        <legend><b>DISPLAY</b></legend>
        <table border ="1" id = "table1">
             <tr>
                <th>Name</th>
                <th>Profit</th>
                <th colspan="2"></th>
             </tr>
             <tbody>
                 <?php foreach ($display as $i => $display): ?>
            <tr>
                <td><?php echo $display['name'] ?></td>
                <td><?php echo ($display['selling_price']-$display['buying_price']) ?></td>
                <td><a href="edit.php?id=<?php echo $display['id'] ?>">edit</a></td>
                <td><a href="delete.php?id=<?php echo $display['id'] ?>">delete</td>

            </tr>
            <?php endforeach; ?>
                </tbody>


        </table>
    </fieldset>
    
    
</body>
</html>