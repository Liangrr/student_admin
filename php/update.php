<?php
	include 'db_class.php';
	header("Content-type:text/html;charset=utf8");
	$id = $_POST['id'];
	$name = $_POST['name'];
	$sex = $_POST['sex'];
	$age = $_POST['age'];
	$grade = $_POST['grade'];
	$username = $_POST['username'];
	$pwd = $_POST['password'];
	
	$sql = "UPDATE tb_student SET name = '$name',sex = '$sex', age = '$age', grade = '$grade', username = '$username', password = '$pwd' WHERE id=".$id;
	
	$conn = new db();
	$res = $conn -> query($sql,null);
	if($res){
		$array = array("msg"=>'',"code"=>"200","data"=>$res);
	}else{
		$array = array("msg"=>'插入失败!',"code"=>'0');
	}
	
	echo json_encode($array);
?>