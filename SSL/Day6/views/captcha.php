<?php

$string = "";

for ($i = 0; $i < 5; $i++)
{
    // this numbers refer to numbers of the ascii table (lower case)  
    $string .= chr(rand(97, 122));
}

$_SESSION['random_code'] = $string;

$font = 'Andale Mono.ttf';

$image = imagecreate(180, 60);
$black = imagecolorallocate($image, 0, 0, 0);
$color = imagecolorallocate($image, 200, 100, 90); // red
$white = imagecolorallocate($image, 255, 255, 255);

imagefilledrectangle($image,0,0,180,60,$white);  
imagettftext ($image, 30, 0, 10, 40, $color, $font, $_SESSION['random_code']);
 
imagepng($image, "mycaptcha.png");
imagedestroy($image);

?>