<?php  
require_once '../model/model.php';


if (isset($_POST['update'])) {
	$data['name'] = $_POST['name'];
	$data['buying_price'] = $_POST['buying_price'];
	$data['selling_price'] = $_POST['selling_price'];
	$data['display'] = $_POST['display'];

	


  if (update($_POST['id'], $data)) {
 echo '<script language="javascript">';
        echo 'window.alert("Update Done");';
        echo 'window.location.href = "../display.php";';
        echo '</script>';
  }
} else {
	echo '<script language="javascript">';
        echo 'window.alert("Somthing Wrong!!!!");';
        echo 'window.location.href = "../display.php";';
        echo '</script>';
}


?>