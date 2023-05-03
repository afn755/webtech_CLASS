<?php



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
    <div style="text-align: center;">
<ul style=" list-style-type: none;margin: 0; padding: 2px;">
    <li style="display: inline;"><a href="../index.php" style="display: block;padding: 8px;background-color: #dddddd;"> Add Data</a></li>
        <li style="display: inline;"><a href="../display.php" style="display: block;padding: 8px;background-color: #dddddd;">Display Data</a></li>
        <li style="display: inline;"><a href="../search.php" style="display: block;padding: 8px;background-color: #dddddd;"> Search</a></li>
    </ul>
</div>
    
        <fieldset id = "field1">
        <legend><b>Search</b></legend>
 <form method="post" action="search_data.php">
        <input type="text" name="name" class="search" placeholder="">
         <input type="submit" name="submit" class="submit" value="Search by name"><br><hr>
       </form>
    

        <legend><b>Search Result</b></legend>
        <table border ="1" id = "table1">
             <tr>
                <th>Name</th>
                <th>Profit</th>
                <th colspan="2"></th>
             </tr>
             <tbody>
                 <?php foreach ($searchname as $i => $name): ?>
            <tr>
                <td><?php echo $name['name'] ?></td>
                <td><?php echo ($name['selling_price']-$name['buying_price']) ?></td>
                <td><a href="../edit.php?id=<?php echo $name['id'] ?>">edit</a></td>
                <td><a href="../delete.php?id=<?php echo $name['id'] ?>">delete</td>

            </tr>
            <?php endforeach; ?>
                </tbody>


        </table>

    </fieldset>
    
</body>
</html>