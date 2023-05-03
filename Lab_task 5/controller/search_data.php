<?php

require_once '../model/model.php';

if (isset($_POST['name'])) {
	

    try {
    	
    	$searchname = search($_POST['name']);
     require_once '../search1.php';

    } catch (Exception $ex) {
    	echo $ex->getMessage();
    }
}

