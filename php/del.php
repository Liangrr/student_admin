<?php
	header("Context-type:text/html;charset=utf-8");
	include 'db_class.php';
	$id = $_POST['id'];
//	var_dump($id);
	$sql = "DELETE FROM tb_student WHERE id =".$id;
	$conn = new db();
//	var_dump($conn);
	$res = $conn -> query($sql,null);
//	var_dump($res);
	if($res){
		$arr = array("msg"=>'',"data"=>$res,"code"=>'200');
	}else{
		$arr = array("msg"=>'删除失败!',"code"=>'0');
	}
	echo json_encode($arr);
?>