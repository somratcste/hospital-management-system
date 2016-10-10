<?php
/*
Site : http:www.somrat.info
Author :Somrat
*/
include ("connection.php");
if(!empty($_POST['type'])){
	$type = $_POST['type'];
	$name = $_POST['name_startsWith'];
	$statement = $db->prepare("SELECT productCode, productName, sellPrice , quantityInStock FROM table_products where quantityInStock !=0 and UPPER($type) LIKE '".strtoupper($name)."%'");
	$statement->execute(array());
	$data = array();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
    	$name = $row['productCode'].'|'.$row['productName'].'|'.$row['quantityInStock'].'|'.$row['sellPrice'];
		array_push($data, $name);

        }
	echo json_encode($data);exit;
}


