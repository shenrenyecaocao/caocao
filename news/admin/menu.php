<?php include_once "checkLogin.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
     <title>Document</title>
     <link rel="stylesheet" type="text/css" href="styles/reset.css"/>
     <link rel="stylesheet" type="text/css" href="styles/common.css"/>
     <style type="text/css">
          html,body{
               height: 100%;
          }
          body{
               background:#0B4E9D url(images/4bf26d8d5a34e095b4b2b5005b943e3265e1d4d0.png) no-repeat left bottom;
               border-right: 3px solid #055992;
          }
          #nav-tree dl {
               margin-bottom:5px;
               padding-bottom: 5px;
               border-bottom:1px dotted #fff;
          }
          #nav-tree dt {
               position: relative;
               padding-left: 50px;
               margin-bottom: 8px;
               line-height: 26px;
               height: 24px;
               overflow: hidden;
               cursor: pointer;
               color: #fff;
               font-weight: bold;
               background: url(images/nav-tree-background.png) no-repeat right -255px;
          }
          #nav-tree dd {
               padding-left: 50px;
               line-height: 28px;
               display:none;
          }
          #nav-tree dd a{
               color: #fff;
          }
          span.icon {
               position: absolute;
               left: 20px;
               top: 0;
               width: 28px;
               height: 24px;
               overflow: hidden;
               background-image: url(images/nav-tree-background.png);
          }
          span.user {
               background-position: 0 0;
          }
          span.role {
               background-position: 0 -24px;
          }
          span.catelog {
               background-position: 0 -48px;
          }
          span.article {
               background-position: 0 -72px;
          }
          span.member {
               background-position: 0 -96px;
          }
          span.ad {
               background-position: 0 -120px;
          }
          span.friendlink {
               background-position: 0 -144px;
          }
          span.database {
               background-position: 0 -168px;
          }
          span.system {
               background-position: 0 -192px;
          }
     </style>
     <script type="text/javascript" src="../jquery/jquery-1.4.js"></script>
     <script type="text/javascript">
       //$(function(){})

       //相当于onload事件
       $(document).ready(function(){
            //给所有dt标签加onclick事件
            $("dt").click(function(){
                 //显示或隐藏dt下的所有dd
                 $(this).nextAll().toggle(200);
            });
       });
     </script>
</head>
<body>
     <div class="wrap">
          <div id="nav-tree">
               <dl>
                    <dt class="aaa"><span class="icon article"></span>新闻管理</dt>
                    <dd><a href="./view/addnews.php" target="mainFrame">发布新闻</a></dd>
                    <dd><a href="./view/listnews.php" target="mainFrame">新闻列表</a></dd>
                    <dd><a href="#">回收站</a></dd>
               </dl>
<?php
     if($_SESSION["userInfo"]["roleId"] == 1)
     {
?>
               <dl>
                    <dt class="aaa"><span class="icon user"></span>管理员设置</dt>
                    <dd><a href="./view/managerlist.php" target="mainFrame">管理员列表</a></dd>
                    <dd><a href="./view/addmanager.php" target="mainFrame">添加管理员</a></dd>
               </dl>
               <dl>
                    <dt class="aaa"><span class="icon role"></span>角色管理</dt>
                    <dd><a href="./view/rolelist.php" target="mainFrame">角色列表</a></dd>
                    <dd><a href="./view/addrole.php" target="mainFrame">添加角色</a></dd>
               </dl>
<?php
     }
?>
               <dl>
                    <dt class="aaa"><span class="icon catelog"></span>分类管理</dt>
                    <dd><a href="./view/typelist.php" target="mainFrame">分类列表</a></dd>
                    <dd><a href="./view/addtype.php" target="mainFrame">添加分类</a></dd>
               </dl>

               <dl>
                    <dt class="aaa"><span class="icon member"></span>会员管理</dt>
                    <dd><a href="./view/userlist.php" target="mainFrame">会员列表</a></dd>
               </dl>
<?php
     if($_SESSION["userInfo"]["roleId"] == 1)
     {
?>
               <dl>
                    <dt class="aaa"><span class="icon ad"></span>广告管理</dt>
                    <dd><a href="./view/adlist.php" target="mainFrame">广告列表</a></dd>
                    <dd><a href="addad.php" target="mainFrame">发布广告</a></dd>
               </dl>
               <dl>
                    <dt class="aaa"><span class="icon friendlink"></span>友链管理</dt>
                    <dd><a href="./view/friendlist.php" target="mainFrame">友链列表</a></dd>
                    <dd><a href="./view/addfriend.php" target="mainFrame">添加友链</a></dd>

               </dl>
               <dl>
                    <dt class="aaa"><span class="icon database"></span>数据库管理</dt>
                    <dd><a href="./view/dump.php" target="mainFrame">数据库备份</a></dd>
                    <dd><a href="./view/source.php" target="mainFrame">数据库还原</a></dd>
               </dl>
               <dl>
                    <dt class="aaa"><span class="icon system"></span>系统管理</dt>
                    <dd><a href="#" target="./view/mainFrame">网站设置</a></dd>
                    <dd><a href="#" target="./view/mainFrame">基本设置</a></dd>
               </dl>
<?php
     }
?>
          </div>
     </div>
</body>
</html>
