<?php
//$image = 'gongzuo/wenjian/link.jpg';
//$data = getimagesize($image);
/*
$im = imagecreatetruecolor(600,600);
$back = imagecolorallocate($im,30,40,5);
imagefill($im,0,0,$back);

$col = imagecolorallocate($im,200,220,200);
imagestring($im,5,0,0,'7774',$col);

header('content-type:image/png');
imagepng($im);
*/

/*
$im = imagecreatefromjpeg($image);
$c = imagecolorallocate($im,rand(0,200),rand(0,200),rand(0,200));
imagejpeg($im);
$a = imagerotate($im,90,$c);
imagejpeg($a);
imagejpeg($im);
*/

/*
header('content-type:image/jpeg');
$im = imagecreatefromjpeg($image);
imagejpeg($im);
*/

/*
$im = imagecreatetruecolor(400,400);
$color = imagecolorallocate($im,rand(0,360),rand(0,360),rand(0,360));
imagefill($im,200,200,$color);
imagejpeg($im);
*/

/*旋转图像
$im = imagecreatefromjpeg($image);
$col = imagecolorallocate($im,50,50,50);
$a = imagerotate($im, rand(0,360),$col);
imagejpeg($a);
*/
/*水印
$image = imagecreatefromjpeg($image);
$im = imagecreatetruecolor(600,600);
$back = imagecolorallocate($im,100,100,100);
imagecopymerge($im,$image,0,0,0,0,300,300,5);
imagepng($im);
*/

/*
$b = imagecreatetruecolor(300,300);
$c = imagecolorallocate($b,100,100,100);
imagefill($b,0,0,$c);

$col = imagecolorallocate($b,200,220,200);
imagestring($b,1,100,0,'7774',$col);
header('content-type:image/png');
imagepng($b);
*/
/*
$image = imagecreatefromjpeg($image);
$im = imagecreatetruecolor(600,600);

$back = imagecolorallocate($im,100,100,100);

imagecopymerge($im,$image,0,0,0,0,300,300,30);
imagepng($im);

*/
//$tuxinxi = getimagesize('i\wenjian\LRKsW7WoKB=.jpeg');
$shuiyin = imagecreatefrompng('i\wenjian\shuiyin.png');

$im = imagecreatefromjpeg('gongzuo/wenjian/link.jpg');
//header('content-type:image/jpeg');
imagecopymerge($im,$shuiyin,0,0,0,0,80,30,50);

imagepng($im,'gongzuo.67.jpg');