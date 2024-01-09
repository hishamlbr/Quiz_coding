<?php
include "connection.php";
session_start();

$username = $_SESSION['username'];

$pylevel = 3;

// Update the user's level in the database
$sql = "UPDATE `tbl_user` SET `pylevel` = '$pylevel' WHERE `username` = '$username'";
$result = mysqli_query($conn, $sql);
$_SESSION['pylevel'] = 3;

// Generate the image
$font = "Italianno-Regular.ttf";
$image = imagecreatefrompng("certificate.png");
$color = imagecolorallocate($image, 148, 128, 57);
$name = $_SESSION['username'];

// Calculate x-coordinate based on the length of the name
$nameLength = strlen($name);
$textWidth = imagettfbbox(112, 0, $font, $name);
$textWidth = $textWidth[2] - $textWidth[0];
$x = (imagesx($image) - $textWidth) / 2;

imagettftext($image, 112, 0, $x, 800, $color, $font, $name);
$date = date('l jS F Y');
imagettftext($image, 27, 0, 550, 1330, $color, "AGENCYR.TTF", $date);

// Output the image directly
header('Content-type: image/png');  // Corrected header for PNG image
imagepng($image,"{$username}.png");
imagedestroy($image);
header("Location: hh.php");

exit();
?>
