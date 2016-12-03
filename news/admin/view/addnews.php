<?php
header("content-type:text/html;charset=utf-8");
include_once "../../dbio/newsArticles.php";
include_once "../../dbio/newsTypes.php";
include_once "../checkLogin.php";
if($_POST){
    typeId                int                 not null,   #
  title                 varchar(100)        not null,   #
  content               text                not null,   #
  userId                int                 not null,   #
  hints                 int                 default 0,#点击量
  imagepath             varchar(1000)           null,#新闻图片的路径
  dateandtime           varchar(20)         not null,#发表时间    #
  isHd                  int                 default 0,#精选  0未  1精
  isStories             int                 default 0,#图片故事  0未 1故事
  isNature              int                 default 0,#图片自然  0未 1自然
  isDel


}
//
$newsTypes = NewsTypes::getNewsTypes();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加新闻</title>
    <script type="text/javascript" src="../../kindeditor/kindeditor.js"></script>
    <script type="text/javascript">
        var editor;
        KindEditor.ready(function(e){
            editor = e.create("[name=content]",{
              "width":"800px",
              "height":"300px"
            });
        });
        //验证表单
        function check(){
            var frm = document.frm;
            if(frm.title.value ==""){
                document.getElementById('p').innerHTML = "标题不能为空";
                document.getElementById('p').style.color="red";
                frm.title.focus();
                return false;
            }
        }
    </script>

</head>
<body>
  <center><font size="6">发布新闻</font></center>
    <form action="addnews.php" method="post" onsubmit="return check();" name="frm" enctype="multipart/form-data">
        <table border="1" align="center">
            <tr>
                <td>新闻标题：</td>
                <td><input type="text" name="title" size="60" value="">
                    <span id="p"></span>
                </td>
            </tr>
            <tr>
                <td>新闻分类：</td>
                <td>
                    <select name="typeId">
                        <option value="">国内</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>新闻图片：</td>
                <td><input type="file" name="name"></td>
            </tr>
            <tr>
                <td>新闻图片选项：</td>
                <td><input type="checkbox" name="isHd" value="1">图片精选
                    <input type="checkbox" name="isStories" value="1">图片故事
                    <input type="checkbox" name="isNature" value="1">图片自然
                </td>
            </tr>
            <tr>
                <td colspan="2"><textarea name="content" height="350px"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="发表新闻"/>
                        &nbsp;&nbsp;&nbsp;
                    <input type="reset" value="全部重写"/>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
