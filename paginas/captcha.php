<?php
session_start();
$codigoCaptcha = substr(md5(time()) ,0, 8);
//echo $codigoCaptcha;

$_SESSION['captcha'] = $codigoCaptcha;

$imagemCaptcha = imagecreatefrompng("../src/img/fundocaptch.png");

$fonteCaptcha = imageloadfont("font/anonymous.gdf");

$corCaptcha = imagecolorallocate($imagemCaptcha, 164,196,228);

imagestring($imagemCaptcha, $fonteCaptcha, 15, 5, $codigoCaptcha, $corCaptcha);

imagepng($imagemCaptcha);

echo ("<img src='$imagemCaptcha' alt='Código captcha'>");

imagedestroy($imagemCaptcha);
?>