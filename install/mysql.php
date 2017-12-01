<?php
	/*
	MGB 0.7.x - OpenSource PHP and MySql Guestbook
	Copyright (C) 2004 - 2013 Juergen Grueneisl - http://www.m-gb.org/

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
	mysql.php - 0.7
	===============
	*/

	// make sure nobody has direct access to this script
	if(!defined('INSTALL')) {
		echo "Error! Start installation with <a href=\"install.php\">install.php</a>";
		die();
	}

	$db_hostname = $_SESSION['db_hostname'];
	$db_dbname = $_SESSION['db_dbname'];
	$db_username = $_SESSION['db_username'];
	$db_password = $_SESSION['db_password'];
	$db_prefix = $_SESSION['db_prefix'];

	$admin_name = $_SESSION['admin_name'];
	$admin_username = $_SESSION['admin_username'];
	$admin_password = md5($_SESSION['admin_password']);
	$admin_email = $_SESSION['admin_email'];
	$admin_gbemail = $_SESSION['admin_gbemail'];

	$server_name = $_SERVER["SERVER_NAME"];
	$gb_path = $_SERVER["SCRIPT_NAME"];
	$gb_path = str_replace("install/install.php", "", $gb_path);
	$install_language = preg_replace("/\.\.\/language\//", "", $_SESSION['install_language']);

	$h_domain = "www.".$_SERVER["SERVER_NAME"];

	// ++++++++++++++++++++++++++++++++++ //

	require ("../language/".$_SESSION['install_language']."/lang_admin.php");

	$sql = array();

	$sql[1] = "CREATE TABLE IF NOT EXISTS ".$db_prefix."entries (
		`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
		`name` VARCHAR( 255 ) NOT NULL ,
		`city` VARCHAR( 255 ) NOT NULL ,
		`email` VARCHAR( 255 ) NOT NULL ,
		`icq` VARCHAR( 255 ) NOT NULL ,
		`aim` VARCHAR( 255 ) NOT NULL ,
		`msn` VARCHAR( 255 ) NOT NULL ,
		`fb` VARCHAR( 255 ) NOT NULL ,
		`twitter` VARCHAR( 255 ) NOT NULL ,
		`hp` VARCHAR( 255 ) NOT NULL ,
		`message` MEDIUMTEXT NOT NULL ,
		`comment` MEDIUMTEXT NOT NULL ,
		`ip` VARCHAR( 15 ) NOT NULL ,
		`timestamp` VARCHAR( 255 ) NOT NULL ,
		`user_notification` TINYINT( 1 ) NOT NULL ,
		`user_show_email` TINYINT( 1 ) NOT NULL ,
		`checked` TINYINT( 1 ) NOT NULL ,
		`isspam` TINYINT( 1 ) NOT NULL
		) DEFAULT CHARSET=utf8 ;";

	$sql[2] = "CREATE TABLE IF NOT EXISTS ".$db_prefix."settings (
		`title` VARCHAR(255) NOT NULL DEFAULT 'MGB 0.6.x OpenSource Guestbook',
		`h_author` VARCHAR(255) NOT NULL DEFAULT '".$admin_name."',
		`h_domain` VARCHAR(255) NOT NULL DEFAULT '".$server_name."',
		`gb_path` VARCHAR(255) NOT NULL DEFAULT '".$gb_path."',
		`h_keywords` VARCHAR(255) NOT NULL,
		`h_description` VARCHAR(255) NOT NULL,
		`timezone` VARCHAR(255) NOT NULL DEFAULT 'Europe/Berlin',
		`admin_name` VARCHAR(255) NOT NULL DEFAULT '".$admin_name."',
		`admin_email` VARCHAR(255) NOT NULL DEFAULT '".$admin_email."',
		`admin_gbemail` VARCHAR(255) NOT NULL DEFAULT '".$admin_gbemail."',
		`caching` TINYINT( 1 ) NOT NULL DEFAULT '0',
		`sendmail_admin` TINYINT(1) NOT NULL,
		`sendmail_admin_text` MEDIUMTEXT NOT NULL,
		`sendmail_user` TINYINT(1) NOT NULL,
		`sendmail_user_text` MEDIUMTEXT NOT NULL,
		`sendmail_user_text_moderated` MEDIUMTEXT NOT NULL,
		`sendmail_user_notification_text` MEDIUMTEXT NOT NULL,
		`sendmail_comment_text` MEDIUMTEXT NOT NULL,
		`sendmail_contactmail_text` MEDIUMTEXT NOT NULL,
		`sendmail_contactmail_text_copy` MEDIUMTEXT NOT NULL,
		`mailer_method` TINYINT(1) NOT NULL DEFAULT '0',
		`smtp_server` VARCHAR(255) NOT NULL,
		`smtp_port` INT(6) NOT NULL DEFAULT '25',
		`smtp_user` VARCHAR(255) NOT NULL,
		`smtp_password` VARCHAR(255) NOT NULL,
		`smtp_auth` TINYINT( 1 ) NOT NULL DEFAULT '1',
		`template_path` VARCHAR(255) NOT NULL DEFAULT 'mgbModern',
		`template_style_path` VARCHAR(255) NOT NULL DEFAULT 'blue',
		`iconset_path` VARCHAR(255) NOT NULL DEFAULT 'default',
		`language_path` VARCHAR(255) NOT NULL DEFAULT 'lang_english_utf8',
		`badwords` MEDIUMTEXT NOT NULL,
		`bbcode` TINYINT(1) NOT NULL DEFAULT '1',
		`allow_img_tag` TINYINT(1) NOT NULL DEFAULT '0',
		`max_img_width` INT(4) NOT NULL DEFAULT '400',
		`max_img_height` INT(4) NOT NULL DEFAULT '400',
		`center_img` TINYINT(1) NOT NULL DEFAULT '1',
		`allow_flash_tag` TINYINT(1) NOT NULL DEFAULT '0',
		`max_flash_width` INT(4) NOT NULL DEFAULT '400',
		`max_flash_height` INT(4) NOT NULL DEFAULT '400',
		`center_flash` TINYINT(1) NOT NULL DEFAULT '1',
		`smileys` TINYINT(1) NOT NULL DEFAULT '1',
		`smileys_break` TINYINT(2) NOT NULL DEFAULT '11',
		`smileys_order` VARCHAR(4) NOT NULL DEFAULT 'ASC',
		`captcha` TINYINT(1) NOT NULL DEFAULT '1',
		`captcha_method` TINYINT(1) NOT NULL DEFAULT '0',
		`captcha_length` TINYINT(1) NOT NULL DEFAULT '6',
		`captcha_max_length` TINYINT(1) NOT NULL,
		`captcha_salt` VARCHAR( 255 ) NOT NULL DEFAULT '".mt_rand()."',
		`captcha_hash_method` VARCHAR( 255 ) NOT NULL DEFAULT 'sha256',
		`captcha_double_hash` TINYINT(1) NOT NULL DEFAULT '1',
		`captcha_coords_x` INT( 3 ) NOT NULL DEFAULT '20',
		`captcha_coords_y` INT( 3 ) NOT NULL DEFAULT '25',
		`captcha_color` VARCHAR( 6 ) NOT NULL DEFAULT '505050' ,
		`captcha_angle_1` INT( 4 ) NOT NULL DEFAULT '-10' ,
		`captcha_angle_2` INT( 4 ) NOT NULL DEFAULT '5' ,
		`recaptcha_pub_key` VARCHAR(255) NOT NULL,
		`recaptcha_private_key` VARCHAR(255) NOT NULL,
		`recaptcha_style` VARCHAR(255) NOT NULL,
		`wrong_captcha_count` INT(2) NOT NULL,
		`akismet_plugin` TINYINT(1) NOT NULL DEFAULT '1',
		`akismet_api` VARCHAR(50) NOT NULL,
		`akismet_mark_as_spam` TINYINT(1) NOT NULL,
		`time_lock` TINYINT(1) NOT NULL DEFAULT '1',
		`time_lock_value` INT(3) NOT NULL DEFAULT '30',
		`time_lock_maxtime` INT(11) NOT NULL DEFAULT '600',
		`time_lock_spam_count` TINYINT(2) NOT NULL DEFAULT '5',
		`keystroke` TINYINT( 1 ) NOT NULL DEFAULT '1' ,
		`keystroke_max_cps` TINYINT( 2 ) NOT NULL DEFAULT '8' ,
		`keystroke_ban_time` INT( 6 ) NOT NULL DEFAULT '20' ,
		`dynamic_fieldnames` TINYINT( 1 ) NOT NULL DEFAULT '1' ,
		`dynamic_fieldnames_method` TINYINT( 1 ) NOT NULL DEFAULT '1' ,
		`dynamic_fieldnames_length` INT( 255 ) NOT NULL DEFAULT '16' ,
		`user_notification` TINYINT(1) NOT NULL DEFAULT '1',
		`user_show_email` TINYINT(1) NOT NULL DEFAULT '1',
		`session_timeout` INT(4) NOT NULL DEFAULT '900',
		`password_min_length` TINYINT(2) NOT NULL DEFAULT '8',
		`moderated` TINYINT(1) NOT NULL DEFAULT '1',
		`require_email` TINYINT(1) NOT NULL DEFAULT '1',
		`blocktime` INT(10) NOT NULL DEFAULT '9999999',
		`entries_per_page` TINYINT(2) NOT NULL DEFAULT '10',
		`entries_order` VARCHAR(11) NOT NULL DEFAULT 'ID',
		`entries_order_asc_desc` VARCHAR(4) NOT NULL DEFAULT 'DESC',
		`entries_numbering` TINYINT(1) NOT NULL DEFAULT '1',
		`spam_protection` TINYINT(1) NOT NULL DEFAULT '1',
		`ipblocker` TINYINT(1) NOT NULL DEFAULT '0',
		`wordwrap` TINYINT(2) NOT NULL DEFAULT '60',
		`dateform` VARCHAR(255) NOT NULL DEFAULT 'd.m.Y, H:i',
		`gravatar_show` TINYINT(1) NOT NULL DEFAULT '0',
		`gravatar_rating` TINYINT(1) NOT NULL DEFAULT '0',
		`gravatar_type` TINYINT(1) NOT NULL DEFAULT '1',
		`gravatar_size` INT(3) NOT NULL DEFAULT '50',
		`gravatar_position` TINYINT(1) NOT NULL DEFAULT '1',
		`spam_mail` VARCHAR(255) NOT NULL,
		`banlist_emails` TINYINT(1) NOT NULL,
		`banlist_domains` TINYINT(1) NOT NULL,
		`banlist_ips` TINYINT(1) NOT NULL,
		`banlist_log` TINYINT(1) NOT NULL,
		`debug_mode` TINYINT(1) NOT NULL,
		`announcement_message` MEDIUMTEXT NOT NULL,
		`version` VARCHAR(20) NOT NULL,
		PRIMARY KEY (`title`)
		) DEFAULT CHARSET=utf8 ;";

	$sql[3] = "INSERT INTO ".$db_prefix."settings (
		`title` ,
		`h_author` ,
		`h_domain` ,
		`gb_path` ,
		`h_keywords` ,
		`h_description` ,
		`timezone` ,
		`admin_name` ,
		`admin_email` ,
		`admin_gbemail` ,
		`caching` ,
		`sendmail_admin` ,
		`sendmail_admin_text` ,
		`sendmail_user` ,
		`sendmail_user_text` ,
		`sendmail_user_text_moderated` ,
		`sendmail_user_notification_text` ,
		`sendmail_comment_text` ,
		`sendmail_contactmail_text` ,
		`sendmail_contactmail_text_copy` ,
		`mailer_method` ,
		`smtp_server` ,
		`smtp_port` ,
		`smtp_user` ,
		`smtp_password` ,
		`smtp_auth` ,
		`template_path` ,
		`template_style_path` ,
		`iconset_path` ,
		`language_path` ,
		`badwords` ,
		`bbcode` ,
		`allow_img_tag` ,
		`max_img_width` ,
		`max_img_height` ,
		`center_img` ,
		`allow_flash_tag` ,
		`max_flash_width` ,
		`max_flash_height` ,
		`center_flash` ,
		`smileys` ,
		`smileys_break` ,
		`smileys_order` ,
		`captcha` ,
		`captcha_method` ,
		`captcha_length` ,
		`captcha_max_length` ,
		`captcha_salt` ,
		`captcha_hash_method` ,
		`captcha_coords_x` ,
		`captcha_coords_y` ,
		`captcha_color` ,
		`captcha_angle_1` ,
		`captcha_angle_2` ,
		`akismet_plugin` ,
		`akismet_api` ,
		`akismet_mark_as_spam` ,
		`time_lock` ,
		`time_lock_value` ,
		`time_lock_maxtime` ,
		`keystroke` ,
		`keystroke_max_cps` ,
		`keystroke_ban_time` ,
		`dynamic_fieldnames` ,
		`dynamic_fieldnames_method` ,
		`dynamic_fieldnames_length` ,
		`user_notification` ,
		`user_show_email` ,
		`session_timeout` ,
		`password_min_length` ,
		`moderated` ,
		`require_email` ,
		`entries_per_page` ,
		`entries_order` ,
		`entries_order_asc_desc` ,
		`entries_numbering` ,
		`spam_protection` ,
		`ipblocker` ,
		`wordwrap` ,
		`dateform` ,
		`gravatar_show` ,
		`gravatar_rating` ,
		`gravatar_type` ,
		`gravatar_size` ,
		`gravatar_position` ,
		`spam_mail` ,
		`banlist_emails` ,
		`banlist_domains` ,
		`banlist_ips` ,
		`banlist_log` ,
		`debug_mode` ,
		`announcement_message` ,
		`version`
		) VALUES (
		'MGB OpenSource Guestbook',
		'".$admin_name."',
		'".$h_domain."',
		'".$gb_path."',
		'',
		'',
		'".$language_timezone."',
		'".$admin_name."',
		'".$admin_email."',
		'".$admin_gbemail."',
		'0',
		'1',
		'".$lang['sendmail_admin_text']."',
		'1',
		'".$lang['sendmail_user_text']."',
		'".$lang['sendmail_user_text_moderated']."',
		'".$lang['sendmail_user_notification_text']."',
		'".$lang['sendmail_comment_text']."',
		'".$lang['sendmail_contactmail_text']."',
		'".$lang['sendmail_contactmail_text_copy']."',
		'0',
		'',
		'25',
		'',
		'',
		'1',
		'mgbModern',
		'blue',
		'default',
		'".$install_language."',
		'',
		'1',
		'0',
		'400',
		'400',
		'1',
		'0',
		'400',
		'400',
		'1',
		'1',
		'12',
		'ASC',
		'0',
		'0',
		'5',
		'8',
		'".mt_rand()."',
		'sha256',
		'10',
		'25',
		'303030',
		'-10',
		'5',
		'0',
		'',
		'1',
		'0',
		'30',
		'600',
		'1',
		'8',
		'20',
		'1',
		'1',
		'16',
		'1',
		'1',
		'900',
		'8',
		'1',
		'1',
		'10',
		'ID',
		'DESC',
		'1',
		'1',
		'0',
		'60',
		'd.m.Y, H:i',
		'0',
		'0',
		'1',
		'50',
		'1',
		'',
		'0',
		'0',
		'0',
		'1',
		'',
		'',
		'".MGB_VERSION."'
		);";


	$sql[4] = "CREATE TABLE IF NOT EXISTS ".$db_prefix."user (
		`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
		`user_name` VARCHAR( 255 ) NOT NULL ,
		`user_password` VARCHAR( 255 ) NOT NULL ,
		`user_key` VARCHAR( 16 ) NOT NULL ,
		`user_ip` VARCHAR( 15 ) NOT NULL ,
		`user_email` VARCHAR( 255 ) NOT NULL ,
		`user_is_active` TINYINT( 1 ) NOT NULL ,
		`user_level` TINYINT( 1 ) NOT NULL ,
		`r_settings` TINYINT( 1 ) NOT NULL ,
		`r_activate` TINYINT( 1 ) NOT NULL ,
		`r_deactivate` TINYINT( 1 ) NOT NULL ,
		`r_delete` TINYINT( 1 ) NOT NULL ,
		`r_edit` TINYINT( 1 ) NOT NULL ,
		`r_spam` TINYINT( 1 ) NOT NULL ,
		`r_edit_smilies` TINYINT( 1 ) NOT NULL ,
		`logged_in` INT( 255 ) NOT NULL ,
		`logged_out` TINYINT( 1 ) NOT NULL ,
		`np_key` VARCHAR( 16 ) NOT NULL ,
		`np_expiration` VARCHAR( 255 ) NOT NULL
		) DEFAULT CHARSET=utf8 ;";

	$sql[5] = "INSERT INTO ".$db_prefix."user (
		`ID` ,
		`user_name` ,
		`user_password` ,
		`user_key` ,
		`user_ip` ,
		`user_email` ,
		`user_is_active` ,
		`user_level` ,
		`r_settings` ,
		`r_activate` ,
		`r_deactivate` ,
		`r_delete` ,
		`r_edit`,
		`r_spam`,
		`r_edit_smilies`,
		`logged_in` ,
		`logged_out`,
		`np_key` ,
		`np_expiration`
		) VALUES (
		NULL,
		'".$admin_username."',
		'".$admin_password."',
		'0',
		'".$_SERVER['REMOTE_ADDR']."',
		'".$admin_email."',
		'1',
		'0',
		'1',
		'1',
		'1',
		'1',
		'1',
		'1',
		'1',
		'".time()."',
		'1',
		'',
		''
		);";

	$sql[6] = "CREATE TABLE IF NOT EXISTS ".$db_prefix."smilies (
		`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
		`path` VARCHAR( 255 ) NOT NULL ,
		`replacement` VARCHAR( 255 ) NOT NULL ,
		`height` TINYINT( 4 ) NOT NULL ,
		`width` TINYINT( 4 ) NOT NULL
		) DEFAULT CHARSET=utf8 ;";

	$sql[7] = "INSERT INTO ".$db_prefix."smilies (
		`ID` ,
		`path` ,
		`replacement` ,
		`height` ,
		`width`
		) VALUES
		( NULL , 'smiley_smile.gif', ':smile:, :), :-)', '15', '15' ),
		( NULL , 'smiley_wink.gif', ':wink:, ;), ;-)', '15', '15' ),
		( NULL , 'smiley_lol.gif', ':lol:', '15', '15' ),
		( NULL , 'smiley_biggrin.gif', ':biggrin:, :D, :-D', '15', '15' ),
		( NULL , 'smiley_cool.gif', ':cool:, B), B-)', '15', '15' ),
		( NULL , 'smiley_fun.gif', ':fun:, ^^', '15', '15' ),
		( NULL , 'smiley_surprised.gif', ':surprised:, :O, :-O', '15', '15' ),
		( NULL , 'smiley_tongue.gif', ':tongue:, :P, :-P', '15', '15' ),
		( NULL , 'smiley_confused.gif', ':confused:, :-/', '15', '15' ),
		( NULL , 'smiley_eek.gif', ':eek:, 8O, 8-O', '15', '15' ),
		( NULL , 'smiley_doubt.gif', ':doubt:', '15', '15' ),
		( NULL , 'smiley_neutral.gif', ':neutral:, :|, :-|', '15', '15' ),
		( NULL , 'smiley_redface.gif', ':redface:', '15', '15' ),
		( NULL , 'smiley_rolleyes.gif', ':rolleyes:', '15', '15' ),
		( NULL , 'smiley_silenced.gif', ':silenced:', '15', '15' ),
		( NULL , 'smiley_sad.gif', ':sad:, :(, :-(', '15', '15' ),
		( NULL , 'smiley_cry.gif', ':cry:, :\'(, :\'-(', '15', '15' ),
		( NULL , 'smiley_doh.gif', ':doh:', '15', '15' ),
		( NULL , 'smiley_angry.gif', ':angry:', '15', '15' ),
		( NULL , 'smiley_evil.gif', ':evil:', '15', '15' ),
		( NULL , 'icon_arrow.gif', ':arrow:', '15', '15' ),
		( NULL , 'icon_exclaim.gif', ':exclaim:', '15', '15' ),
		( NULL , 'icon_question.gif', ':question:', '15', '15' );";

	$sql[8] = "CREATE TABLE IF NOT EXISTS ".$db_prefix."banlist_ips (
		`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
		`banned_ip` VARCHAR( 255 ) NOT NULL ,
		`banned_ip_first` VARCHAR( 255 ) NOT NULL ,
		`banned_ip_second` VARCHAR( 255 ) NOT NULL ,
		`banned_ip_third` VARCHAR( 255 ) NOT NULL ,
		`banned_ip_fourth` VARCHAR( 255 ) NOT NULL ,
		`matches` INT( 11 ) NOT NULL ,
		`timestamp` INT( 255 ) NOT NULL
		) DEFAULT CHARSET=utf8 ;";

	$sql[9] = "CREATE TABLE IF NOT EXISTS ".$db_prefix."banlist_emails (
		`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
		`banned_email` VARCHAR( 255 ) NOT NULL ,
		`banned_email_first` VARCHAR( 255 ) NOT NULL ,
		`banned_email_second` VARCHAR( 255 ) NOT NULL ,
		`matches` INT( 11 ) NOT NULL ,
		`timestamp` INT( 255 ) NOT NULL
		) DEFAULT CHARSET=utf8 ;";

	$sql[10] = "CREATE TABLE IF NOT EXISTS ".$db_prefix."banlist_domains (
		`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
		`banned_domain` VARCHAR( 255 ) NOT NULL ,
		`matches` INT( 11 ) NOT NULL ,
		`timestamp` INT( 255 ) NOT NULL
		) DEFAULT CHARSET=utf8 ;";

	$sql[11] = "CREATE TABLE IF NOT EXISTS ".$db_prefix."spam_log (
		`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
		`ip` VARCHAR( 255 ) NOT NULL ,
		`email` VARCHAR( 255 ) NOT NULL ,
		`user_agent` VARCHAR( 255 ) NOT NULL ,
		`hp` VARCHAR( 255 ) NOT NULL ,
		`message` MEDIUMTEXT NOT NULL ,
		`type` INT( 2 ) NOT NULL ,
		`site` VARCHAR( 255 ) NOT NULL ,
		`timestamp` VARCHAR( 255 ) NOT NULL
		) DEFAULT CHARSET=utf8 ;";

	$sql[12] = "CREATE TABLE IF NOT EXISTS ".$db_prefix."spam (
		`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
		`name` VARCHAR( 255 ) NOT NULL ,
		`ip` VARCHAR( 15 ) NOT NULL ,
		`email` VARCHAR( 255 ) NOT NULL ,
		`city` VARCHAR( 255 ) NOT NULL ,
		`icq` VARCHAR( 255 ) NOT NULL ,
		`aim` VARCHAR( 255 ) NOT NULL ,
		`msn` VARCHAR( 255 ) NOT NULL ,
		`fb` VARCHAR( 255 ) NOT NULL ,
		`twitter` VARCHAR( 255 ) NOT NULL ,
		`hp` VARCHAR( 255 ) NOT NULL ,
		`message` MEDIUMTEXT NOT NULL ,
		`comment` MEDIUMTEXT NOT NULL ,
		`user_notification` TINYINT( 1 ) NOT NULL ,
		`user_show_email` TINYINT( 1 ) NOT NULL ,
		`captcha` VARCHAR( 9 ) NOT NULL ,
		`sent_captcha` VARCHAR( 9 ) NOT NULL ,
		`counter` TINYINT( 1 ) NOT NULL ,
		`timestamp` INT( 11 ) NOT NULL
		) DEFAULT CHARSET=utf8 ;";

	if(!empty($success)) {
		$success = 0;
	}

	// establish sql connection
	$link = mysqli_connect($db_hostname, $db_username, $db_password, $db_dbname) or die ("(mysql.php, line 541) Error: ".mysqli_error($link));
	mysqli_set_charset($link, 'utf8');

	for($i = 1; $i <= count($sql); $i++) {
		$sqlcommand = $sql[$i];
		if(mysqli_query($link, $sqlcommand) === TRUE) {
			$success++;
		} else {
			echo "<pre>\n";
			echo mysqli_errno($link)." : ".mysqli_error($link);
			echo "</pre>\n";
		}
	}
?>
