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

	=======
	063.php
	=======
	*/

	// 0.6 - 0.6.3

	if(file_exists("../functions.inc.php")) {
		if(unlink("../functions.inc.php")) {
			echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">- deleting old ''functions.inc.php'' from root directory...</span>\n
				\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">&nbsp;OK!<br /></span>\n";
			$success++;
			$count++;
		} else {
			echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">- deleting old ''functions.inc.php'' from root directory...</span>\n
				\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: red;\">ERROR!<br /></span>\n";
			$count++;
		}
	}

	if(file_exists("../load_templates.inc.php")) {
		if(unlink("../load_templates.inc.php")) {
			echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">- deleting old ''load_templates.inc.php'' from root directory...</span>\n
				\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">&nbsp;OK!<br /></span>\n";
			$success++;
			$count++;
		} else {
			echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">- deleting old ''load_templates.inc.php'' from root directory...</span>\n
				\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: red;\">ERROR!<br /></span>\n";
			$count++;
		}
	}

	if(file_exists("../load_settings.inc.php")) {
		if(unlink("../load_settings.inc.php")) {
			echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">- deleting old ''load_settings.inc.php'' from root directory...</span>\n
				\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">&nbsp;OK!<br /></span>\n";
			$success++;
			$count++;
		} else {
			echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">- deleting old ''load_settings.inc.php'' from root directory...</span>\n
				\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: red;\">ERROR!<br /></span>\n";
			$count++;
		}
	}

	if(file_exists("../captcha.php")) {
		if(unlink("../captcha.php")) {
			echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">- deleting old ''captcha.php'' from root directory...</span>\n
				\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">&nbsp;OK!<br /></span>\n";
			$success++;
			$count++;
		} else {
			echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">- deleting old ''captcha.php'' from root directory...</span>\n
				\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: red;\">ERROR!<br /></span>\n";
			$count++;
		}
	}

	if(file_exists("../akoom.ttf")) {
		if(unlink("../akoom.ttf")) {
			echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">- deleting old ''akoom.ttf'' from root directory...</span>\n
				\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">&nbsp;OK!<br /></span>\n";
			$success++;
			$count++;
		} else {
			echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">- deleting old ''akoom.ttf'' from root directory...</span>\n
				\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: red;\">ERROR!<br /></span>\n";
			$count++;
		}
	}

	if(file_exists("../config.inc.php")) {
		if(rename("../config.inc.php", "../config.inc.bak")) {
			echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">- renaming old ''config.inc.php'' to ''config.inc.bak''...</span>\n
				\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">&nbsp;OK!<br /></span>\n";
			$success++;
			$count++;
		} else {
			echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">- renaming old ''config.inc.php'' to ''config.inc.bak''...</span>\n
				\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: red;\">ERROR!<br /></span>\n";
			$count++;
		}
	}

	$sql = array();

	// 0.6.4

	$sql[1] = "CREATE TABLE ".$db['prefix']."captcha_math (
		`math` VARCHAR( 20 ) NOT NULL ,
		  `sum` INT NOT NULL ,
		  PRIMARY KEY ( `math` )
		  );";
	$sqldescription[1] = "- Creating table for new captcha method...";

	$sql[2] = "INSERT INTO ".$db['prefix']."captcha_math (
			`math` ,
			`sum`
		) VALUES (
			'1+2+3' ,
			'6'
			);";
	$sqldescription[2] = "- Inserting default values for new captcha method...";
	$sqlisinsert[2] = 1;

	$sql[3] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `captcha_method` TINYINT( 1 ) DEFAULT '0' NOT NULL AFTER `captcha`";
	$sqldescription[3] = "- Inserting 'captcha_method' in settings table...";

	// 0.6.5

	$sql[4] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `akismet_plugin` TINYINT(1) DEFAULT '1' NOT NULL AFTER `bbcode`";
	$sqldescription[4] = "- Adding 'akismet_plugin' in settings table...";

	$sql[5] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `akismet_api` VARCHAR(50) NOT NULL AFTER `akismet_plugin`";
	$sqldescription[5] = "- Adding 'akismet_api' in settings table...";

	$sql[6] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `akismet_mark_as_spam` TINYINT( 1 ) DEFAULT '1' NOT NULL AFTER `akismet_api`";
	$sqldescription[6] = "- Adding 'akismet_mark_as_spam' in settings table...";

	$sql[7] = "ALTER TABLE `".$db['prefix']."entries`
			ADD `isspam` TINYINT( 1 ) NOT NULL AFTER `checked`";
	$sqldescription[7] = "- Adding 'isspam' in entries table...";

	$sql[8] = "ALTER TABLE `".$db['prefix']."user`
			ADD `r_spam` TINYINT( 1 ) NOT NULL AFTER `r_edit`";
	$sqldescription[8] = "- Adding 'r_spam' in user table...";

	// 0.6.6

	$sql[9] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `time_lock` INT( 1 ) NOT NULL AFTER `akismet_mark_as_spam`";
	$sqldescription[9] = "- Adding 'time_lock' in settings table...";

	$sql[10] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `time_lock_value` INT( 3 ) DEFAULT '30' NOT NULL AFTER `time_lock`";
	$sqldescription[10] = "- Adding 'time_lock_value' in settings table...";

	$sql[11] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `time_lock_maxtime` INT DEFAULT '300' NOT NULL AFTER `time_lock_value`";
	$sqldescription[11] = "- Adding 'time_lock_maxtime' in settings table...";

	$sql[12] = "ALTER TABLE `".$db['prefix']."user`
			ADD `r_edit_smilies` TINYINT( 1 ) NOT NULL AFTER `r_spam`";
	$sqldescription[12] = "- Adding 'r_edit_smilies' in user table...";

	// 0.6.7

	$sql[13] = "CREATE TABLE ".$db['prefix']."smilies (
		  `ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
		  `path` VARCHAR( 255 ) NOT NULL ,
		  `replacement` VARCHAR( 255 ) NOT NULL ,
		  `height` TINYINT( 4 ) NOT NULL ,
		  `width` TINYINT( 4 ) NOT NULL
		  );";
	$sqldescription[13] = "- Creating table for smilies...";

	$sql[14] = "INSERT INTO ".$db['prefix']."smilies (
		  `ID` ,
		  `path` ,
		  `replacement` ,
		  `height` ,
		  `width`
		  ) VALUES 	( NULL , 'smiley_smile.gif', ':smile:, :), :-)', '15', '15' ),
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
					( NULL , 'icon_arrow.gif', ':arrow:', '15', '15' ),
					( NULL , 'icon_exclaim.gif', ':exclaim:', '15', '15' ),
					( NULL , 'icon_question.gif', ':question:', '15', '15' );";
	$sqldescription[14] = "- Adding smilies...";
	$sqlisinsert[14] = 1;

	$sql[15] = "ALTER TABLE `".$db['prefix']."user`
			ADD `r_edit_smilies` TINYINT( 1 ) NOT NULL AFTER `r_spam`";
	$sqldescription[15] = "- Adding 'r_edit_smilies' in user table...";

	// 0.6.8

	$sql[16] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `gravatar_type` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `gravatar_rating`";
	$sqldescription[16] = "- Adding 'gravatar_type' in settings table...";

	$sql[17] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `gravatar_size` INT( 3 ) NOT NULL DEFAULT '50' AFTER `gravatar_type`";
	$sqldescription[17] = "- Adding 'gravatar_size' in settings table...";

	$sql[18] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `gravatar_position` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `gravatar_size` ";
	$sqldescription[18] = "- Adding 'gravatar_position' in settings table...";

	$sql[19] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `entries_order_asc_desc` VARCHAR( 4 ) NOT NULL DEFAULT 'DESC' AFTER `entries_order`";
	$sqldescription[19] = "- Adding 'entries_order_asc_desc' in settings table...";

	$sql[20] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `entries_numbering` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `entries_order_asc_desc`";
	$sqldescription[20] = "- Adding 'entries_numbering' in settings table...";

	$sql[21] = "ALTER TABLE `".$db['prefix']."settings`
			CHANGE `entries_order` `entries_order` VARCHAR( 11 ) NOT NULL DEFAULT 'ID'";
	$sqldescription[21] = "- Changing 'entries_order' in settings table...";

	$sql[22] = "UPDATE `".$db['prefix']."settings` SET `entries_order` = 'ID'";
	$sqldescription[22] = "- Changing value of 'entries_order' in settings table...";
	$sqlisinsert[22] = 1;

	$sql[23] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `smileys_break` INT( 2 ) NOT NULL DEFAULT '11' AFTER `smileys`";
	$sqldescription[23] = "- Adding 'smileys_break' in settings table...";

	$sql[24] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `smileys_order` VARCHAR( 4 ) NOT NULL DEFAULT 'ASC' AFTER `smileys_break`";
	$sqldescription[24] = "- Adding 'smileys_order' in settings table...";

	$sql[25] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `password_min_length` TINYINT( 2 ) NOT NULL DEFAULT '8' AFTER `session_timeout`";
	$sqldescription[25] = "- Adding 'password_min_length' in settings table...";

	// 0.6.9

	$sql[26] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `allow_img_tag` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `bbcode`";
	$sqldescription[26] = "- Adding 'allow_img_tag' in settings table...";

	$sql[27] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `max_img_width` INT( 4 ) NOT NULL DEFAULT '400' AFTER `allow_img_tag`";
	$sqldescription[27] = "- Adding 'max_img_width' in settings table...";

	$sql[28] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `max_img_height` INT( 4 ) NOT NULL DEFAULT '400' AFTER `max_img_width`";
	$sqldescription[28] = "- Adding 'max_img_height' in settings table...";

	$sql[29] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `center_img` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `max_img_height`";
	$sqldescription[29] = "- Adding 'center_img' in settings table...";

	$sql[30] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `allow_flash_tag` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `center_img`";
	$sqldescription[30] = "- Adding 'allow_flash_tag' in settings table...";

	$sql[31] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `max_flash_width` INT( 4 ) NOT NULL DEFAULT '400' AFTER `allow_flash_tag`";
	$sqldescription[31] = "- Adding 'max_flash_width' in settings table...";

	$sql[32] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `max_flash_height` INT( 4 ) NOT NULL DEFAULT '400' AFTER `max_flash_width`";
	$sqldescription[32] = "- Adding 'max_flash_height' in settings table...";

	$sql[33] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `center_flash` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `max_flash_height`";
	$sqldescription[33] = "- Adding 'center_flash' in settings table...";

	$sql[34] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `captcha_coords_x` INT( 3 ) NOT NULL DEFAULT '20' AFTER `captcha_method`";
	$sqldescription[34] = "- Adding 'captcha_coords_x' in settings table...";

	$sql[35] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `captcha_coords_y` INT( 3 ) NOT NULL DEFAULT '25' AFTER `captcha_coords_x`";
	$sqldescription[35] = "- Adding 'captcha_coords_y' in settings table...";

	$sql[36] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `captcha_color` VARCHAR( 6 ) NOT NULL DEFAULT '505050' AFTER `captcha_coords_y`";
	$sqldescription[36] = "- Adding 'captcha_color' in settings table...";

	$sql[37] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `captcha_angle_1` INT( 4 ) NOT NULL DEFAULT '-10' AFTER `captcha_color`";
	$sqldescription[37] = "- Adding 'captcha_angle_1' in settings table...";

	$sql[38] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `captcha_angle_2` INT( 4 ) NOT NULL DEFAULT '5' AFTER `captcha_angle_1` ";
	$sqldescription[38] = "- Adding 'captcha_angle_2' in settings table...";

	// 0.6.9.1 - 0.6.9.3

	$sql[39] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `timezone` VARCHAR( 255 ) NOT NULL DEFAULT 'Europe/Berlin' AFTER `h_description`";
	$sqldescription[39] = "- Adding 'timezone' in settings table...";

	// 0.6.9.4

	$sql[40] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `require_email` TINYINT ( 1 ) NOT NULL DEFAULT '1' AFTER `moderated`";
	$sqldescription[40] = "- Adding 'require_email' in settings table...";

	$sql[41] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `sendmail_user_text_moderated` MEDIUMTEXT NOT NULL AFTER `sendmail_user_text`";
	$sqldescription[41] = "- Adding 'sendmail_user_text_moderated' in settings table...";

	$sql[42] = "ALTER TABLE `".$db['prefix']."settings`
			ADD `sendmail_contactmail_text_copy` MEDIUMTEXT NOT NULL AFTER `sendmail_contactmail_text`";
	$sqldescription[42] = "- Adding 'sendmail_contactmail_text_copy' in settings table...";

	include("../language/".$settings['language_path']."/lang_admin.php");

	$sql[43] = "UPDATE `".$db['prefix']."settings` SET
			`sendmail_user_text` = '".$lang['sendmail_user_text']."',
			`sendmail_user_text_moderated` = '".$lang['sendmail_user_text_moderated']."',
			`sendmail_contactmail_text_copy` = '".$lang['sendmail_contactmail_text_copy']."';";
	$sqldescription[43] = "- Inserting values in new fields ...";
	$sqlisinsert[43] = 1;

	$sql[44] = "ALTER TABLE `".$db['prefix']."user` ADD
			`user_ip` VARCHAR( 15 ) NOT NULL AFTER `user_key`";
	$sqldescription[44] = "- Adding 'user_ip' in user table...";

	// 0.6.9.5

	$sql[45] = "CREATE TABLE IF NOT EXISTS ".$db['prefix']."spam (
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
			  )";
	$sqldescription[45] = "- Creating spam table ...";

	$sql[46] = "CREATE TABLE IF NOT EXISTS ".$db['prefix']."banlist_ips (
			  `ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			  `banned_ip` VARCHAR( 255 ) NOT NULL ,
			  `banned_ip_first` VARCHAR( 255 ) NOT NULL ,
			  `banned_ip_second` VARCHAR( 255 ) NOT NULL ,
			  `banned_ip_third` VARCHAR( 255 ) NOT NULL ,
			  `banned_ip_fourth` VARCHAR( 255 ) NOT NULL ,
			  `matches` INT( 11 ) NOT NULL ,
			  `timestamp` INT( 11 ) NOT NULL
			  )";
	$sqldescription[46] = "- Creating ip banlist ...";

	$sql[47] = "CREATE TABLE IF NOT EXISTS ".$db['prefix']."banlist_emails (
			  `ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			  `banned_email` VARCHAR( 255 ) NOT NULL ,
			  `banned_email_first` VARCHAR( 255 ) NOT NULL ,
			  `banned_email_second` VARCHAR( 255 ) NOT NULL ,
			  `matches` INT( 11 ) NOT NULL ,
			  `timestamp` INT( 11 ) NOT NULL
			  )";
	$sqldescription[47] = "- Creating email banlist ...";

	$sql[48] = "CREATE TABLE IF NOT EXISTS ".$db['prefix']."banlist_domains (
			  `ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			  `banned_domain` VARCHAR( 255 ) NOT NULL ,
			  `matches` INT( 11 ) NOT NULL ,
			  `timestamp` INT( 11 ) NOT NULL
			  )";
	$sqldescription[48] = "- Creating domain banlist ...";

	$sql[49] = "CREATE TABLE IF NOT EXISTS ".$db['prefix']."spam_log (
			  `ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			  `ip` VARCHAR( 255 ) NOT NULL ,
			  `email` VARCHAR( 255 ) NOT NULL ,
			  `user_agent` VARCHAR( 255 ) NOT NULL ,
			  `hp` VARCHAR( 255 ) NOT NULL ,
			  `message` MEDIUMTEXT NOT NULL ,
			  `type` INT( 2 ) NOT NULL ,
			  `site` VARCHAR( 255 ) NOT NULL ,
			  `timestamp` VARCHAR( 255 ) NOT NULL
			  )";
	$sqldescription[49] = "- Creating spam log table ...";

	$sql[50] = "ALTER TABLE `".$db['prefix']."settings` ADD
			`announcement_message` MEDIUMTEXT NOT NULL AFTER `gravatar_position`";
	$sqldescription[50] = "- Adding new field 'announcement_message' in settings table ...";

	$sql[51] = "ALTER TABLE `".$db['prefix']."settings`
				ADD `spam_mail` VARCHAR( 255 ) NOT NULL AFTER `gravatar_position`";
	$sqldescription[51] = "- Adding 'spam_mail' to settings table...";

	$sql[52] = "ALTER TABLE `".$db['prefix']."settings`
				ADD `banlist_emails` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `spam_mail`";
	$sqldescription[52] = "- Adding 'banlist_emails' to settings table...";

	$sql[53] = "ALTER TABLE `".$db['prefix']."settings`
				ADD `banlist_domains` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `banlist_emails`";
	$sqldescription[53] = "- Adding 'banlist_domains' to settings table...";

	$sql[54] = "ALTER TABLE `".$db['prefix']."settings`
				ADD `banlist_ips` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `banlist_domains`";
	$sqldescription[54] = "- Adding 'banlist_ips' to settings table...";

	$sql[55] = "ALTER TABLE `".$db['prefix']."settings`
				ADD `banlist_log` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `banlist_ips`";
	$sqldescription[55] = "- Adding 'banlist_log' to settings table...";

	$sql[56] = "ALTER TABLE `".$db['prefix']."settings`
				ADD `captcha_length` TINYINT( 2 ) NOT NULL DEFAULT '6' AFTER `captcha_method`";
	$sqldescription[56] = "- Adding 'captcha_length' to settings table...";

	$sql[57] = "ALTER TABLE `".$db['prefix']."settings`
				ADD `captcha_double_hash` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `captcha_length`";
	$sqldescription[57] = "- Adding 'captcha_double_hash' to settings table...";

	$sql[58] = "ALTER TABLE `".$db['prefix']."settings`
				ADD `time_lock_spam_count` TINYINT( 2 ) NOT NULL DEFAULT '5' AFTER `time_lock_maxtime`";
	$sqldescription[58] = "- Adding 'time_lock_spam_count' to settings table...";

	$sql[59] = "ALTER TABLE `".$db['prefix']."settings`
				ADD `blocktime` INT( 10 ) NOT NULL DEFAULT '9999999' AFTER `require_email`";
	$sqldescription[59] = "- Adding 'blocktime' to settings table...";

	$sql[60] = "ALTER TABLE `".$db['prefix']."settings`
				ADD `wrong_captcha_count` INT( 2 ) NOT NULL DEFAULT '5' AFTER `captcha_angle_2`";
	$sqldescription[60] = "- Adding 'wrong_captcha_count' to settings table...";

	$sql[61] = "ALTER TABLE `".$db['prefix']."settings`
				ADD `debug_mode` TINYINT( 1 ) DEFAULT '0' NOT NULL AFTER `banlist_log`";
	$sqldescription[61] = "- Adding 'debug_mode' to settings table...";

	$sql[62] = "ALTER TABLE `".$db['prefix']."settings`
				ADD `recaptcha_pub_key` VARCHAR( 255 ) DEFAULT '' NOT NULL AFTER `captcha_angle_2`";
	$sqldescription[62] = "- Adding 'recaptcha_pub_key' to settings table...";

	$sql[63] = "ALTER TABLE `".$db['prefix']."settings`
				ADD `recaptcha_private_key` VARCHAR( 255 ) DEFAULT '' NOT NULL AFTER `recaptcha_pub_key`";
	$sqldescription[63] = "- Adding 'recaptcha_private_key' to settings table...";

	$sql[64] = "ALTER TABLE `".$db['prefix']."settings`
				ADD `recaptcha_style` VARCHAR( 15 ) DEFAULT 'red' NOT NULL AFTER `recaptcha_private_key`";
	$sqldescription[64] = "- Adding 'recaptcha_style' to settings table...";

	$sql[65] = "ALTER TABLE `".$db['prefix']."entries`
				ADD `fb` VARCHAR( 255 ) NOT NULL AFTER `msn`";
	$sqldescription[65] = "- Adding 'fb' to entries table...";

	$sql[66] = "ALTER TABLE `".$db['prefix']."entries`
				ADD `twitter` VARCHAR( 255 ) NOT NULL AFTER `fb`";
	$sqldescription[66] = "- Adding 'twitter' to entries table...";

	$sql[67] = "ALTER TABLE `".$db['prefix']."settings`
				CHANGE `dateform` `dateform` VARCHAR( 255 ) NOT NULL DEFAULT 'd.m.Y, H:i'";
	$sqldescription[67] = "- Update 'dateform' in settings table...";

	$sql[68] = "UPDATE `".$db['prefix']."settings` SET
			`dateform` = 'd.m.Y, H:i';";
	$sqldescription[68] = "- Inserting values in new fields ...";
	$sqlisinsert[68] = 1;

	$sql[69] = "ALTER TABLE `".$db['prefix']."settings` ADD `mailer_method` TINYINT( 1 ) NOT NULL  DEFAULT '0' AFTER `sendmail_contactmail_text_copy` ,
				ADD `smtp_server` VARCHAR( 255 ) NOT NULL AFTER `mailer_method` ,
				ADD `smtp_port` INT( 6 ) NOT NULL DEFAULT '25' AFTER `smtp_server` ,
				ADD `smtp_user` VARCHAR( 255 ) NOT NULL AFTER `smtp_port` ,
				ADD `smtp_password` VARCHAR( 255 ) NOT NULL AFTER `smtp_user`,
				ADD `smtp_auth` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `smtp_password`";
	$sqldescription[69] = "- Adding smtp fields in settings table...";

	$sql[70] = "ALTER TABLE `".$db['prefix']."settings` ADD `keystroke` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `time_lock_spam_count` ,
				ADD `keystroke_max_cps` TINYINT( 2 ) NOT NULL DEFAULT '8' AFTER `keystroke` ,
				ADD `keystroke_ban_time` INT( 6 ) NOT NULL DEFAULT '20' AFTER `keystroke_max_cps`";
	$sqldescription[70] = "- Adding keystroke fields in settings table...";

	$sql[71] = "ALTER TABLE `".$db['prefix']."settings` ADD `captcha_max_length` TINYINT( 1 ) NOT NULL AFTER `captcha_length`";
	$sqldescription[71] = "- Adding field for captcha max length in settings table ...";

	$sql[72] = "ALTER TABLE `".$db['prefix']."settings` ADD `captcha_salt` VARCHAR( 255 ) NOT NULL DEFAULT '".mt_rand()."' AFTER `captcha_max_length`";
	$sqldescription[72] = "- Adding field for captcha salt in settings table ...";

	$sql[73] = "ALTER TABLE `".$db['prefix']."settings` ADD `captcha_hash_method` VARCHAR( 255 ) NOT NULL DEFAULT 'sha256' AFTER `captcha_salt`";
	$sqldescription[73] = "- Adding field for captcha hash method in settings table ...";

	$sql[74] = "ALTER TABLE `".$db['prefix']."settings` ADD `caching` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `admin_gbemail`";
	$sqldescription[74] = "- Adding field for caching in settings table ...";

	$sql[75] = "ALTER TABLE `".$db['prefix']."settings` ADD `dynamic_fieldnames` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `keystroke_ban_time`";
	$sqldescription[75] = "- Adding field for dynamic fieldnames in settings table ...";

	$sql[76] = "ALTER TABLE `".$db['prefix']."settings` ADD `dynamic_fieldnames_method` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `dynamic_fieldnames`";
	$sqldescription[76] = "- Adding field for dynamic fieldnames method in settings table ...";

	$sql[77] = "ALTER TABLE `".$db['prefix']."settings` ADD `dynamic_fieldnames_length` INT( 255 ) NOT NULL DEFAULT '16' AFTER `dynamic_fieldnames_method`";
	$sqldescription[77] = "- Adding field for dynamic fieldnames length in settings table ...";

	// update version number every time
	if(isset($_POST['update_version']) AND $_POST['update_version'] == 1) {
		$sql[78] = "UPDATE `".$db['prefix']."settings` SET `version` = '".MGB_VERSION."'";
		$sqldescription[78] = "- Updating version number...";

		if(isset($settings['language_path']) AND $settings['language_path'] == "lang_german_ansi") {
			$sql[79] = "UPDATE `".$db['prefix']."settings` SET `language_path` = 'lang_german_utf8'";
			$sqldescription[79] = "- Updating language path (delete \"language/lang_german_ansi/\" after this upgrade and VERY IMPORTANT: start <a href='convert_ansi.php'>convert_ansi.php</a>)!";
		}
	} else {
		if(isset($settings['language_path']) AND $settings['language_path'] == "lang_german_ansi") {
			$sql[78] = "UPDATE `".$db['prefix']."settings` SET `language_path` = 'lang_german_utf8'";
			$sqldescription[78] = "- Updating language path (delete \"language/lang_german_ansi/\" after this upgrade and VERY IMPORTANT: start <a href='convert_ansi.php'>convert_ansi.php</a>)!";
		}
	}
?>
