<?php 

require_once 'db.php';


function add($data){
    $conn = db_conn();
  
        $addsql = "INSERT into products (name, buying_price, selling_price, display)
VALUES (:name, :b_price, :s_price, :display)";
    try{
        $stmt = $conn->prepare($addsql);
        $stmt->execute([
        	':name' => $data['name'],
        	':b_price' => $data['b_price'],
        	':s_price' => $data['s_price'],
        	':display' => $data['display'],
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}

function display(){
	$conn = db_conn();
    $displaysql = "SELECT * FROM products where display='Yes' ";
    try{
        $stmt = $conn->query($displaysql);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function edit($id){
	$conn = db_conn();
	$editsql = "SELECT * FROM products where ID = ?";

    try {
        $stmt = $conn->prepare($editsql);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}
function update($id, $data){
    $conn = db_conn();
    $sqlupdate = "UPDATE products set Name = ?, buying_price = ?, selling_price = ?, display= ? where ID = ?";
    try{
        $stmt = $conn->prepare($sqlupdate);
        $stmt->execute([
        	$data['name'], $data['buying_price'], $data['selling_price'], $data['display'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}
function delete($id){
	$conn = db_conn();
    $delsql = "DELETE FROM products WHERE id = ?";
    try{
        $stmt = $conn->prepare($delsql);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}
function search($name){
    $conn = db_conn();
    $searchsql = "SELECT * FROM products WHERE name LIKE '%$name%'";

    
    try{
        $stmt = $conn->query($searchsql);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}