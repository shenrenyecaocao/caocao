<?php
include_once "../../conn/Dbconn.class.php";
/**
 *
 */
class NewsTypes
{
		//添加新的新闻类
		public static function addtype($typeName,$pid,$level)
		{
				$sql = "insert into newsTypes(typeName,pid,level)
				values('{$typeName}','{$pid}','{$level}')";
				$conn = Dbconn::getInstance();
				$result = $conn->exec($sql);
				return $result;
		}
		public static function editType($typeName,$pid,$level,$typeId)
		{
				$sql = "update newsTypes set typeName='{$typeName}',
								pid='{$pid}',level='{$level}' where typeId='{$typeId}'";
				$conn = Dbconn::getInstance();
				$result = $conn->exec($sql);
				return $result;
		}
		//　取出所有没有删除的新闻类
		public static function getNewsTypes()
		{
				$sql = "select * from newsTypes where isDel=0";
				$conn = Dbconn::getInstance();
				$result = $conn->queryAll($sql);
				return $result;
		}
		//取出所有顶级菜单
		public static function getNewsTypes1()
		{
				$sql = "select * from newsTypes where level=1 and isDel=0";
				$conn = Dbconn::getInstance();
				$result = $conn->queryAll($sql);
				return $result;
		}
		//取出typeId对应的记录

		//删除新闻类
		public static function delType($typeId)
		{
				$sql = "update newsTypes set isDel = 1 where typeId='{$typeId}'";
				$conn = Dbconn::getInstance();
				$result = $conn->exec($sql);
				return $result;
		}

}
