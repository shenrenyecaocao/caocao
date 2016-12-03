<?php
	//数据库封装类
	class DbConn
	{
		private $conn = NULL;//连接对象

		//连接数据库
		private function __construct()
		{
			$url = "mysql:host=localhost;dbname=news";
			$user = "root";
			$pwd = "123456";
			$this->conn = new PDO($url,$user,$pwd);
			$this->conn->query("set names utf8");
		}
		//防止克隆
		private function __clone()
		{}
		public static function getInstance()
		{
			static $obj = NULL;
			if($obj == NULL)
			{
				$obj = new DbConn();
			}
			return $obj;
		}
		//执行select语句，返回：二维数组
		public function queryAll($sql)
		{
			$st = $this->conn->query($sql);
			$rs = $st->fetchAll();
			return $rs;
		}
		//执行select语句，返回：一维关联数组
		public function queryOne($sql)
		{
			$st = $this->conn->query($sql);
			$rs = $st->fetchAll();
			if($rs){
				return $rs[0];
			}else {
				return $rs;
			}
		}
		//执行insert、update、delete语句，返回：受影响的行数
		public function exec($sql)
		{
			$result = $this->conn->exec($sql);
			return $result;
		}
	}
?>
