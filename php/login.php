 <?php
 	
	include 'db_class.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
	
    $conn = new db();
	$sql = "select * from tb_student where username='$username'";
	$row = $conn -> query($sql,2);
	
	if($row){
		$arr = array("id" => $row["id"], "username"=> $row["username"]);
		$array = array("msg" => "", "code"=> "200", "data" => $arr);
	}else{
		$array = array("msg" => "账号或者用户名错误！", "code"=> "0");
	}
    echo json_encode($array);
?>