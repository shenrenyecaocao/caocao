<?php
header("content-type:text/html;charset=utf-8");
// include_once "../../dbio/newsTypes.php";
include_once "../../dbio/newsTypes.php";
include_once "../checkLogin.php";
if($_POST){
		$pid = $_POST['pid'];
		$typeName = $_POST['typeName'];
		if(empty($typeName)){
				header("location:../success.php?action=addtype&status=empty");
				die;
		}
		$level = $pid==0 ?1:2;
		$result = NewsTypes::addtype($typeName,$pid,$level);
		header("location:../success.php?action=addtype&status={$result}");
}
//获取所有的顶级菜单
$newsTypes = NewsTypes::getNewsTypes1();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
	<title>添加分类</title>
	<script type="text/javascript">
			function checkAdd()
			{
					if(document.frm.typeName.value == ""){
							alert("请输入分类名称！");
							document.frm.typeName.focus();
							return false;
					}
			}
	</script>
	</head>
	<body>
		<form name="frm" action="addtype.php" method="post" onsubmit="return checkAdd();">
        <table border="1" align="center">
            <tr>
            	<td>父级菜单：</td>
							<td><select name="pid">
									<option value="0">顶级菜单</option>
										<?php
												foreach ($newsTypes as $v) {
														echo "<option value='{$v["typeId"]}'>
														{$v["typeName"]}</option>";
												}
										?>
									</select>
							</td>
            </tr>
						<tr>
							<td>分类名称：</td>
							<td>
								<input type="text" name="typeName" size="20" value="">
							</td>
						</tr>
						<tr>
							<td colspan="2" align="center">
							<input type="submit" name="" value="添加">
							<input type="reset" name="" value="重置">
							</td>
						</tr>
        </table>
		</form>

	</body>
</html>
