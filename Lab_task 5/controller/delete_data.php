<?php 

require_once '../model/model.php';

if (delete($_GET['id'])) {
    echo '<script language="javascript">';
        echo 'window.alert("Delete Done");';
        echo 'window.location.href = "../display.php";';
        echo '</script>';
}

 ?>