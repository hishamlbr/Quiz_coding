<?php
header('content-type:image/jpeg');
$font = "Italianno-Regular.ttf";
$image = imagecreatefrompng("certificate.png");
$color = imagecolorallocate($image, 148, 128, 57);
$name = "HICHAM ";

// Calculate x-coordinate based on the length of the name
$nameLength = strlen($name);
$textWidth = imagettfbbox(112, 0, $font, $name);
$textWidth = $textWidth[2] - $textWidth[0];
$x = (imagesx($image) - $textWidth) / 2;

imagettftext($image, 112, 0, $x, 800, $color, $font, $name);
$date = date('l jS F Y');
imagettftext($image, 27, 0, 550, 1330, $color, "AGENCYR.TTF", $date);
imagejpeg($image);
imagedestroy($image);
?>
