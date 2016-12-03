<?php 
$img = imagecreatetruecolor(200, 200);

$color = imagecolorallocate($img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
$color1 = imagecolorallocate($img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
imagefill($img, 50, 50, $color1);
$fontfile = "./JOKERMAN.TTF";
imagettftext($img, 30, mt_rand(-30,30), mt_rand(20,120), mt_rand(50,150), $color, $fontfile, "dsjd");
header("Content-Type:image/png");
$jpg = "./test.jpg";
imagepng($img,$jpg);
imagedestroy($img);



















