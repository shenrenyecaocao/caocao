<?php
header("content-type:text/html;charset=utf-8");
session_start();
$action = $_GET['action'];
$status = isset($_GET['status'])?$_GET['status']:"0";
// echo $status;die;
/**
 *                 1             用户名为空
 *               ２　           密码为空
 *                3             验证码为空
 *                4             验证码错误
 *                5             登陆成功
 *                6             用户名或密码错误
 */
if($action=="login"){
    if($status == 1){
        $message = "用户名为空!";
            $jumpUrl = "login.php";
        }elseif($status == 2){
            $message = "密码为空!";
            $jumpUrl = "login.php";
        }elseif($status == 3){
            $message = "验证码为空";
            $jumpUrl = "login.php";
        }elseif ($status==4) {
            $message = "验证码错误";
            $jumpUrl = "login.php";
        } elseif ($status==5) {
            $message = "登陆成功";
            $jumpUrl = "index.php";
        } else {
            $message = "用户名或密码错误";
            $jumpUrl = "login.php";
        }
}elseif($action=="noLogin"){
    $message = "无权访问，请登录！";
    $jumpUrl = "login.php";
}elseif($action=="loginOut"){
    unset($_SESSION['userInfo']);
    $message = "退出登录";
    $jumpUrl = "login.php";
}elseif($action=="addtype"){
    if($status=="empty"){
        $message = "添加新闻类不能为空！";
    }elseif($status>0){
        $message = "添加分类成功！";
    }else{
        $message = "添加分类失败！";
    }
    $jumpUrl = "./view/addtype.php";
}elseif($action=="delType"){
    if($status){
        $message = "删除分类成功！";
    }else{
        $message = "删除分类失败！";
    }
    $jumpUrl = "./view/typelist.php";
}elseif($action=="edit"){
    $message = "修改发生未知错误";
    $jumpUrl = "./view/updatetype.php";
}elseif($action=="update"){
    if($status>0){
        $message = "修改分类成功！";
    }else{
        $message = "修改分类失败！";
    }
    $jumpUrl = "./view/typelist.php";
}else{

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $message; ?></title>
<script type="text/javascript">
function changeTime() {
    var time = document.getElementById("time");
    time.innerHTML--;
    if(time.innerHTML<0) {
        window.location.href = "<?php echo $jumpUrl;?>";
    }else{
        window.setTimeout("changeTime()",1000);
    }
}
</script>
</head>
<body onload="changeTime();">
  <br />
     <br />
     <br />
     <br />
    <table border="1px" align="center" width="65%">
        <tr>
            <th><h1>系统提示信息</h1></th>
        </tr>
        <tr>
            <th><p style="font-size:20px; color:red;"> <?php echo $message; ?></p>
              该页面将在<span id="time">5</span>秒后跳转！如果没有跳转，请
              <a href="<?php echo $jumpUrl;?>">点击这里</a>。</th>
        </tr>
    </table>
</body>
</html>
