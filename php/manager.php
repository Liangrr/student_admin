<?php
	include "db_class.php";
 	header('Content-Type: text/html; charset=UTF-8');
	$sql = "select * from tb_student";
	$conn = new db();
	$rows = $conn -> query($sql,1);
 	if($rows){
		$array = array("msg" => "", "code"=> "200", "data" =>$rows);
	}else{
		$array = array("msg" => "账号或者用户名错误！", "code"=> "0");
	}
	echo json_encode($array);
 
?>
