<?php
	/*
	MGB 0.6.x - OpenSource PHP and MySql Guestbook
	Copyright (C) 2004 - 2011 Juergen Grueneisl - http://www.m-gb.org/

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

	===============
	captcha.inc.php
	===============
	*/

	// start the session
	@session_name("newentry");
	ini_set('url_rewriter.tags', '');
	@session_start();
	@session_regenerate_id();

	header ("Content-type: image/png");

	require ("config.inc.php");
	require ("functions.inc.php");
	require ("load_settings.inc.php");

	// randomly choose a background for the captcha
	$captcha_dir = "../images/captchas/";
	if(is_dir($captcha_dir)) {
		if($dir = @opendir($captcha_dir)) {
			$filecounter = 0;
			while(($file = @readdir($dir)) !== false) {
				$filecounter++;
			}
		@closedir($file);
		}
	}

	// counting starts when opening directories. there are two directories, so substract 2
	$filecounter = $filecounter - 2;

	// if the captcha-background doesn't exist, get a new random number
	$captcha_randombg = mt_rand(1, $filecounter);
	if(!file_exists("../images/captchas/captchabg".$captcha_randombg.".png")) {
		echo "Background #".$captcha_randombg." for captcha does not exist!";
	}

	// create the image
	$captcha_img = imagecreatefrompng ("../images/captchas/captchabg".$captcha_randombg.".png");

	if($settings['captcha_method'] == 0) {
		$captcha_text = $_SESSION['CAPTCHA_CODE'];
		$x = $settings['captcha_coords_x']; // x-coordinate where to start the text in the image
		$y = $settings['captcha_coords_y'];; // y-coordinate where to start the text in the image
		$textcolor = "0x00".$settings['captcha_color']; // color of text
		$angle = rand($settings['captcha_angle_1'], $settings['captcha_angle_2']); // random value of the text angle
		imagettftext($captcha_img, 22, $angle, $x, $y, $textcolor, "../fonts/akoom.ttf", $captcha_text);
	} else {
		$captcha_text = $_SESSION['CAPTCHA_MATH'];
		$x = $settings['captcha_coords_x']; // x-coordinate where to start the text in the image
		$y = $settings['captcha_coords_y'];; // y-coordinate where to start the text in the image
		$textcolor = "0x00".$settings['captcha_color']; // color of text
		$angle = rand($settings['captcha_angle_1'], $settings['captcha_angle_2']); // random value of the text angle
		imagettftext($captcha_img, 18, $angle, $x, $y, $textcolor, "../fonts/acidic.ttf", $captcha_text);
	}

	// The font "akoom.ttf" used in here is copyrighted by http://veredgf.fredfarm.com/.
	// It is NOT released under GNU/GPL. It's Freeware. This means you can use and
	// share it for free but you may NOT sell it!

	imagepng($captcha_img);
	imagedestroy($captcha_img);
?>
