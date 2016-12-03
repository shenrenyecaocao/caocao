<?php
session_start();
if(!$_SESSION['userInfo'] ){
        header("location:success.php?action=noLogin");
}
?>
