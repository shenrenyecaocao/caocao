<?php
	include_once "../conn/Dbconn.class.php";//必须用once

	//bbsInfo表操作类
	class BbsInfo
	{
		//查询所有记录
		public static function getBbsInfo()
		{
			$sql = "select * from bbsInfo";
			$conn = DbConn::getInstance();
			$result = $conn->queryAll($sql);
			return $result;
		}
	}
?>
