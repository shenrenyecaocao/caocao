<?php
header("content-type:text/html;charset=utf-8");
include_once "../../dbio/newsTypes.php";
include_once "../checkLogin.php";
//获取没有删除的新闻菜单
$newsTypes = NewsTypes::getNewsTypes();
if(isset($_GET["typeId"])){
	$result = NewsTypes::delType($_GET["typeId"]);
	header("location:../success.php?action=delType&status={$result}");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>分类列表</title>
	</head>
	<script type="text/javascript">
	function delType(){
			return ;

	}

	</script>
	<body>
		<table border="1" align="center" width="90%">
			<tr align="center">
				<td>序号</td>
				<td>分类名</td>
				<td>父级菜单</td>
				<td>级别</td>
				<td>操作</td>
			</tr>
			<?php
					foreach($newsTypes as $v){
							//显示所有一级分类
							//if($v['pid']==0)或者if($v['level']==1)
							if($v['level']==1){
			 ?>
			<tr align="center">
				<td><?php echo $v["typeId"]; ?></td>
				<td><?php echo $v["typeName"]; ?></td>
				<td><?php echo $v["pid"]; ?></td>
				<td><?php echo $v["level"]; ?></td>
				<td>
					<a onclick="return confirm('确认修改？');"
					href="updatetype.php?typeId=<?php echo $v["typeId"];?>" >修改</a>
					&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="return confirm('是否将该分类及该分类下的所有新闻放入回收站？');"
					href="typelist.php?typeId=<?php echo $v["typeId"];?>">删除</a>
				</td>
			</tr>
			<?php
									foreach($newsTypes as $vv){
											//if($vv["pid"] == $v["typeId"])显示子目录
											if($vv["pid"] == $v["typeId"]){
													echo "<tr align='center'>";
													echo "<td>{$vv['typeId']}</td>";
													echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																{$vv['typeName']}</td>";
													echo "<td>{$vv['pid']}</td>";
													echo "<td>{$vv['level']}</td>";
													echo "<td><a onclick=\"return confirm('确认修改？');\"
																href=\"updatetype.php?typeId={$vv["typeId"]}\" >修改</a>
																&nbsp;&nbsp;&nbsp;&nbsp;<a onclick=\"return confirm('是否将该分类及该分类下的所有新闻放入回收站？');\"
																href=\"typelist.php?typeId={$vv["typeId"]}\">删除</a></td>";
													echo "</tr>";
											}
									}
							}
					}
			?>
		</table>
	</body>
</html>
