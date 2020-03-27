<?php

require_once '../../config.php';

$string = '';

for ($i = 0; $i < 5; $i++) {
    $string .= rand(0, 9);
}

$_SESSION[SESSION]['rand_code'] = $string;

$dir = 'C://xampp/htdocs/GIF/includes/libs/captcha/fonts/';

$image = imagecreatefromjpeg("C://xampp/htdocs/GIF/includes/libs/captcha/default.jpg");

$black = imagecolorallocate($image, 150, 150, 150);
$grey = imagecolorallocate($image, 70, 70, 70); // red
$red = imagecolorallocate($image, 220, 34, 41); // red
$white = imagecolorallocate($image, 255, 255, 255);


$grey1[0] = imagecolorallocate($image, 70, 70, 70);
$grey1[1] = imagecolorallocate($image, 37, 119, 174);
$grey1[2] = imagecolorallocate($image, 120, 120, 120);

$oNum = rand(0, 2);

imagettftext($image, 40, rand(-15, 15), 20, 50, $grey1[$oNum], $dir . "times_new_yorker.ttf", $string[0]);
$oNum++;
if ($oNum == 3)
    $oNum = 0;
imagettftext($image, 40, rand(-15, 15), 45, 50, $grey1[$oNum], $dir . "times_new_yorker.ttf", $string[1]);
$oNum++;
if ($oNum == 3)
    $oNum = 0;
imagettftext($image, 40, rand(-15, 15), 70, 50, $grey1[$oNum], $dir . "times_new_yorker.ttf", $string[2]);
$oNum++;
if ($oNum == 3)
    $oNum = 0;
imagettftext($image, 40, rand(-15, 15), 95, 50, $grey1[$oNum], $dir . "times_new_yorker.ttf", $string[3]);
$oNum++;
if ($oNum == 3)
    $oNum = 0;
imagettftext($image, 40, rand(-15, 15), 110, 50, $grey1[$oNum], $dir . "times_new_yorker.ttf", $string[4]);

imagettftext($image, 7.1, 0, 74, 72, $black, $dir . "arial.ttf", "Powered by Abdelrahman Alhorani");

header("Content-type: image/png");
imagepng($image);


?>