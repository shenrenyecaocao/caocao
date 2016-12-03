<?php
if(file_exists("conn/Dbconn.class.php")){
  include_once "conn/Dbconn.class.php";//必须用once
}else {
  include_once "../conn/Dbconn.class.php";
}
	//bbsInfo表操作类
class Manager
{
   public static function checkLogin($userName,$password)
   {
     $sql = "select * from manager where
     userName='{$userName}' and password='{$password}'";
     
     $conn = DbConn::getInstance();
     $result = $conn->queryone($sql);
     return $result;
   }

}
