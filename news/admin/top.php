<?php include_once "checkLogin.php"; ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>my demo</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css" media="all"/>
<style>
      body{
	      background:url(images/top_bg.gif);
      }
      #wrap{

      	    line-height:100px;
            height:100px;
      }
      #wrap h1{
	        font:bold 30px/100px 微软雅黑;
      	    color:#fff;
      	    padding:0 20px;
      }
      #wrap span{
	        float:right;
      	    font-size:12px;
      	    color:#fff;
      }
      #wrap  h1 a{
	       color:#fff;
      	   padding:0 6px;
      }
</style>
<script type="text/javascript">
    function loginOut(){
        if(window.parent.confirm("是否退出后台管理？")){
            window.parent.location.href = "success.php?action=loginOut";
        }
    }
</script>
</head>
<body>
    <div  id="wrap">
           <h1>达内集团CMS V1.0  <span><?php echo date("A")=="AM"?"上午":"下午"; ?>好,
             <?php echo $_SESSION["userInfo"]['userName']; ?>
             <a href="#" onclick="loginOut()">退出</a>  
           </span></h1>

    </div>
</body>
</html>
