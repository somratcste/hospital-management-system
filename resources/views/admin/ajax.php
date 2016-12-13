<?php
/*
Site : http:www.somrat.info
Author :Somrat
*/
include ("connection.php");
if(!empty($_POST['type'])){
	$type = $_POST['type'];
	$name = $_POST['name_startsWith'];
	$statement = $db->prepare("SELECT test_id, name, percent, room , cost FROM report_types where  cost !=0 and UPPER($type) LIKE '".strtoupper($name)."%' limit 10");
	$statement->execute(array());
	$data = array();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
    	$name = $row['test_id'].'|'.$row['name'].'|'.$row['percent'].'|'.$row['room'].'|'.$row['cost'];
		array_push($data, $name);

        }
	echo json_encode($data);exit;
}


