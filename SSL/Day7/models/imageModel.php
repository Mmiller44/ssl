<?php

class imageModel {

	public function getGD(){

		return gd_info();
		
	}

	public function imageCopy($orgfile, $newfile)
	{
		$n = imagecreatefromjpeg($orgfile);
		imagejpeg($n, $newfile);
		imagedestroy($n);
	}

	public function imageResize($orgfile, $newfile, $h, $w)
	{
		$n = imagecreatefromjpeg($orgfile);
		$ar = getimagesize($orgfile);
		$orgw = $ar[0];
		$orgh = $ar[1];

		$cont = imagecreatetruecolor($w, $h);
		imagecopyresampled($cont, $n, 0, 0, 0, 0, $w, $h, $orgw, $orgh);
		imagejpeg($cont, $newfile, 100);
		imagedestroy($n);
	}

	public function msg($msg)
	{

		$container = imagecreate(300, 200);
		$black = imagecolorallocate($container, 0, 0, 0);
		$white = imagecolorallocate($container, 255, 255, 255);
		$font = "Andale Mono.ttf";
		imagefilledrectangle($container, 0, 0, 250, 150, $black);
		imagerectangle($container, 0, 0, 50, 60, $white);
		imagefttext($container, 12, 0, 0, 12, $white, $font, $msg);
		header('Content-Type: image/png');
		imagepng($container, null);
		imagedestroy($container);
	}

	public function fileUpload($file)
	{
		$tempfile = $file["tmp_name"];

		move_uploaded_file($tempfile, $file['name']);
	}






}
?>