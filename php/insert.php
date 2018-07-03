<?php
	include 'db_class.php';
	header("Content-type:text/html;charset=utf8");
	
	$name = $_POST['name'];
	$sex = $_POST['sex'];
	$age = $_POST['age'];
	$grade = $_POST['grade'];
	$username = $_POST['username'];
	$pwd = $_POST['password'];
	
	$sql_insert = "INSERT INTO tb_student (name,sex,age,grade,username,".
		" password)VALUES ('$name', '$sex',$age,'$grade','$username','$pwd')";
	
	$conn = new db();
	$res = $conn -> query($sql_insert,null);
	if($res){
		$sql = "select * from tb_student";
     	$arr = $conn->query($sql, 1);

		$array = array("msg"=>'',"code"=>"200","data"=>$arr);
	}else{
		$array = array("msg"=>'插入失败!',"code"=>'0');
	}
	
	echo json_encode($array);
?>