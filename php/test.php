<?php
	
    $username = $_POST['username'];
    $password = $_POST['password'];
	
	
	$conn = new mysqli('localhost','root','','db_user','3306');
	$sql = "select * from tb_student where username='$username'";
    $conn->query("SET CHARACTER SET 'utf8'");//读库 
	$result = $conn -> query($sql);
	$row = $result -> fetch_assoc();
	if($row){
		$arr = array("id" => $row["id"], "username"=> $row["username"]);
		$array = array("msg" => "", "code"=> "200", "data" => $arr);
	}else{
		$array = array("msg" => "账号或者用户名错误！", "code"=> "0");
	}
	
    echo json_encode($array);
	
	$conn -> close();
?>