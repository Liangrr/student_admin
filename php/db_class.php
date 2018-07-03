<?php
class db 
{
    //公有的
    // protected $name
    // 保护的, 只能在本类，或者子类中使用
    // private
    // 私有的 只能在本类中使用，其他的地方都不能用
    // static
    // 静态的，加在类上面的
    public $ip = "localhost";
    public $name = "root";
    public $pwd = "";
    public $db = "db_user";
    public $port = "3306";
    public function query($sql, $type=1) {
        $conn = new mysqli($this -> ip, $this->name, $this->pwd, $this->db, $this->port);
        $conn->query("SET CHARACTER SET 'utf8'");//读库   
        $conn->query("SET NAMES 'utf8'");//写库 
        $result = $conn -> query($sql);
        // var_dump($result);
        // type = 1 ,查询所有数据
        // type = 2, 查询一条数据
        // type 为其他的时候， 默认是删/改查
        if ($type == 1) {
            $rows = $result -> fetch_all();
            return $rows;
        } else if ($type == 2) {
            $rows = $result -> fetch_assoc();
            return $rows;
        } else {
            return $result;
        }
        $conn -> close();
    }
}


?>