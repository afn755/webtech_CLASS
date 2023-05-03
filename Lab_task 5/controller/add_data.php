<?php  
require_once '../model/model.php';

if (isset($_POST['submit'])) {
	$data['name'] = $_POST['name'];
	$data['b_price'] = $_POST['buying_price'];
	$data['s_price'] = $_POST['selling_price'];
	$data['display'] = $_POST['display'];

	
  if (add($data)) {
  	echo '<script language="javascript">';
        echo 'window.alert("Entry Successfully Done");';
        echo 'window.location.href = "../index.php";';
        echo '</script>';
  }
} else {
	echo '<script language="javascript">';
        echo 'window.alert("something Wrong");';
        echo 'window.location.href = "../index.php";';
        echo '</script>';
       
}

?>