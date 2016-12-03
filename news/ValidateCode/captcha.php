<?php
session_start();
require "./ValidateCode.calss.php";
$_vc = new ValidateCode();
$_vc->doimg();
$_SESSION['code'] = $_vc->getCode();





?>
