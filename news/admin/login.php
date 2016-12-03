<?php
session_start();
header("content-type:text/html;charset=utf-8");
include_once "../dbio/manager.php";
/**
 * post判定是否点击提交
 *返回值
 *                1             用户名为空
 *               ２　           密码为空
 *                3             验证码为空
 *                4             验证码错误
 *                5             登陆成功
 *                6             用户名或密码错误
 */
if($_POST){
    $post = $_POST;
    $userName = $post['userName'];
    $password = $post['password'];
    if(!$userName){   //用户名或密码为空则返回
        header("location:success.php?action=login&status=1");  //1
    }elseif(!$password){
        header("location:success.php?action=login&status=2");  //2
    }elseif(!$post['code']){
        header("location:success.php?action=login&status=3");  //3
    }elseif($_SESSION['code']!=$post['code']){
        header("location:success.php?action=login&status=4");  // 4
    }else{
        //验证码正确
        $result = Manager::checkLogin($userName,$password);
        if($result){
        //登陆成功
        $_SESSION['userInfo'] = $result;
        header("location:success.php?action=login&status=5");  //5
        }else {
          //用户名或密码错误
            header("location:success.php?action=login&status=6");  //6
        }
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>后台管理登录</title>
    <script type="text/javascript">
        window.onload = function(){
            var frm = document.frm;
            var tip = document.getElementById('tip');
            frm.onsubmit = function(){
                if(frm.userName.value==""){
                    tip.innerHTML = "用户名不能为空！";
                    frm.userName.focus();
                    return false;
                }
                if(frm.password.value==""){
                    frm.password.focus();
                    tip.innerHTML = "密码不能为空！";
                return false;
                }
                if(frm.code.value==""){
                    tip.innerHTML = "验证码不能为空！";
                    frm.code.focus();
                    return false;
                }
            }
        }
    </script>
  </head>
  <body>
    <form name="frm" action="login.php" method="post">
      <table align="center" border="1px">
        <tr>
          <th colspan="2"><font size="6" face="隶书">管理登录</font></th>
        </tr>
        <tr>
          <td align="center">用户名：</td>
          <td><input type="text" name="userName" size="25"></td>
        </tr>
        <tr>
          <td align="center">密&nbsp;&nbsp;&nbsp;码：</td>
          <td><input type="password" name="password" size="25"></td>
        </tr>
        <tr>
          <td align="center">验证码:</td><td><input type="text" name="code" size="10">
            <img src="../ValidateCode/captcha.php" width="110px"
            onclick="this.src='../ValidateCode/captcha.php?'+Math.random();"
            height="35px" alt="验证码" align="absmiddle"></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="submit" value="登录">
            &nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="" value="重置"><br>
            <p id="tip" align="center" style="color:red;"></p>
          </td>
        </tr>
        <tr>

        </tr>
      </table>
    </form>
  </body>
</html>
