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

	=========================
	settings_security.inc.php
	=========================

	DATE OF CREATION: 24.02.2013; 15:09
	*/

	// make sure nobody has direct acces to this script
	if(!defined('ADMINISTRATION')) {
		include ("error.html");
		die();
	} else {
		require ("../includes/functions.inc.php");
		// load template
		$content_settings_security = mgb_load_template("admin", "default", "settings_security", $settings['debug_mode']);

		if(!isset($_GET['action'])) { $_GET['action'] = "settings_security"; }
		if(check_rights($_GET['action'], $_SESSION['ID'])) {
			if(isset($_POST['sent_settings']) AND $_POST['sent_settings'] == 1) {
				$empty_needed_value = 0;

				/*
				needed values in this script:
				=============================

				session_timeout
				password_min_length *
				blocktime
				captcha_length
				captcha_coords_x
				captcha_coords_y
				captcha_color
				captcha_angle_1 *
				captcha_angle_2 *
				wrong_captcha_count
				akismet_api
				time_lock_value
				time_lock_maxtime
				time_lock_spamcount *
				*/

				if($_POST['session_timeout'] < 60) {
					$empty_needed_value = 19;
				}

				if($_POST['password_min_length'] < 6) {
					$_POST['password_min_length'] = $settings['password_min_length'];
					$empty_needed_value = 15;
				}

				if(!empty($_POST['captcha_length'])) {
					if($_POST['captcha_length'] < 3) {
						$empty_needed_value = 16;
					} elseif($_POST['captcha_length'] >= 3) {
						if(!empty($_POST['captcha_max_length'])) {
							if($_POST['captcha_max_length'] <= $_POST['captcha_length']) {
								$empty_needed_value = 16;
							} elseif($_POST['captcha_max_length'] > 9) {
								$empty_needed_value = 16;
							}
						}
					}
				} else {
					$empty_needed_value = 16;
				}

				/*
				if($_POST['time_lock_spam_count'] < 5 OR $_POST['time_lock_spam_count'] > 99)
					{
					$_POST['time_lock_spam_count'] = $settings['time_lock_spam_count'];
					$empty_needed_value = 17;
					}
				*/

				// check if the captcha angles are correct
				if((!empty($_POST['captcha_angle_1'])) AND (!empty($_POST['captcha_angle_1']))) {
					if ($_POST['captcha_angle_1'] >= $_POST['captcha_angle_2']) {
						$_POST['captcha_angle_1'] = $settings['captcha_angle_1'];
						$_POST['captcha_angle_2'] = $settings['captcha_angle_2'];
					}
				} else {
					$empty_needed_value = 18;
				}

				if($_POST['akismet_plugin'] == 1) {
					if(empty($_POST['akismet_api'])) {
						$empty_needed_value = 23;
					}
				}

				// reCaptchaV2 does not need this anymore
            			
				/* if($_POST['captcha_method'] == 2) {
					if(!file_exists("../plugins/recaptcha/recaptchalib.php") OR empty($_POST['recaptcha_pub_key']) OR empty($_POST['recaptcha_private_key'])) {
						$empty_needed_value = 35;
					}
				} */

				if(!empty($_POST['captcha_salt'])) {
					if(!preg_match('/^[a-z0-9_\.]+$/i', $_POST['captcha_salt'])) {
						$empty_needed_value = 41;
					}
				}

				if(empty($_POST['captcha_color'])) {
					$empty_needed_value = 22;
				} else {
					if(!preg_match('/^[0-9A-F^#]{6}$/i', $_POST['captcha_color'])) {
						$empty_needed_value = 22;
					}
				}

				if(empty($_POST['dynamic_fieldnames_length'])) {
					$empty_needed_value = 42;
				} else {
					if($_POST['dynamic_fieldnames_length'] < 3) {
						$empty_needed_value = 42;
					} elseif($_POST['dynamic_fieldnames_length'] > 255) {
						$empty_needed_value = 42;
					}
				}

				if(empty($_POST['captcha_coords_x'])) { $empty_needed_value = 20; }
				if(empty($_POST['captcha_coords_y'])) { $empty_needed_value = 21; }
				if(empty($_POST['time_lock_value'])) { $empty_needed_value = 24; }
				if(empty($_POST['time_lock_maxtime'])) { $empty_needed_value = 25; }
				// if(empty($_POST['time_lock_spam_count'])) { $empty_needed_value = 26; }
				// if(empty($_POST['wrong_captcha_count'])) { $empty_needed_value = 34; }
				if($empty_needed_value == 0) { // no error, continue with saving settings
					// everything's okay now, let's save the data
					$sql = "UPDATE `".$db['prefix']."settings` SET
						`debug_mode` = '".cleanstr($_POST['debug_mode'])."',
						`session_timeout` = '".cleanstr($_POST['session_timeout'])."',
						`password_min_length` = '".cleanstr($_POST['password_min_length'])."',
						`moderated` = '".cleanstr($_POST['moderated'])."',
						`require_email` = '".cleanstr($_POST['require_email'])."',
						`spam_protection` = '".cleanstr($_POST['spam_protection'])."',
						`banlist_ips` = '".cleanstr($_POST['banlist_ips'])."',
						`banlist_emails` = '".cleanstr($_POST['banlist_emails'])."',
						`banlist_domains` = '".cleanstr($_POST['banlist_domains'])."',
						`banlist_log` = '".cleanstr($_POST['banlist_log'])."',
						`blocktime` = '".cleanstr($_POST['blocktime'])."',
						`captcha` = '".cleanstr($_POST['captcha'])."',
						`captcha_method` = '".cleanstr($_POST['captcha_method'])."',
						`captcha_length` = '".cleanstr($_POST['captcha_length'])."',
						`captcha_max_length` = '".cleanstr($_POST['captcha_max_length'])."',
						`captcha_salt` = '".cleanstr($_POST['captcha_salt'])."',
						`captcha_hash_method` = '".cleanstr($_POST['captcha_hash_method'])."',
						`captcha_double_hash` = '".cleanstr($_POST['captcha_double_hash'])."',
						`captcha_coords_x` = '".cleanstr($_POST['captcha_coords_x'])."',
						`captcha_coords_y` = '".cleanstr($_POST['captcha_coords_y'])."',
						`captcha_color` = '".cleanstr($_POST['captcha_color'])."',
						`captcha_angle_1` = '".cleanstr($_POST['captcha_angle_1'])."',
						`captcha_angle_2` = '".cleanstr($_POST['captcha_angle_2'])."',
						`recaptcha_pub_key` = '".cleanstr($_POST['recaptcha_pub_key'])."',
						`recaptcha_private_key` = '".cleanstr($_POST['recaptcha_private_key'])."',
						`recaptcha_style` = '".cleanstr($_POST['recaptcha_style'])."',
						`wrong_captcha_count` = '".cleanstr($_POST['wrong_captcha_count'])."',
						`akismet_plugin` = '".cleanstr($_POST['akismet_plugin'])."',
						`akismet_api` = '".cleanstr($_POST['akismet_api'])."',
						`akismet_mark_as_spam` = '".cleanstr($_POST['akismet_mark_as_spam'])."',
						`time_lock` = '".cleanstr($_POST['time_lock'])."',
						`time_lock_value` = '".cleanstr($_POST['time_lock_value'])."',
						`time_lock_maxtime` = '".cleanstr($_POST['time_lock_maxtime'])."',
						`time_lock_spam_count` = '".cleanstr($_POST['time_lock_spam_count'])."',
						`keystroke` = '".cleanstr($_POST['keystroke'])."',
						`keystroke_max_cps` = '".cleanstr($_POST['keystroke_max_cps'])."',
						`keystroke_ban_time` = '".cleanstr($_POST['keystroke_ban_time'])."',
						`dynamic_fieldnames` = '".cleanstr($_POST['dynamic_fieldnames'])."',
						`dynamic_fieldnames_method` = '".cleanstr($_POST['dynamic_fieldnames_method'])."',
						`dynamic_fieldnames_length` = '".cleanstr($_POST['dynamic_fieldnames_length'])."'";

					if(mgb_sql_connect($sql, "Error while saving security settings.", 0)) {
						$saved_settings_successfull = 1;
						mgb_erase_cache("../cache/");
					}

					require ("../includes/load_settings.inc.php");
				}
			}

			// load active language
			include ("../language/".$settings['language_path']."/settings.php");

			// load template
			$page_include = $content_settings_security;

			// now start replacement for template

			// replacement that has nothing to do with front end
			$page_include = template("URL_SETTINGS", "admin.php?action=settings_security".$sid, $page_include);

			// value replacement
			if (file_exists("../plugins/akismet/akismet.class.php")) {
				$page_include = template("EDIT_AKISMET_CHECK_IMAGE", "<img src='templates/default/images/active.png' height='16' width='16' alt='active.png' title='active.png'>&nbsp;", $page_include);
				$page_include = template("LANG_EDIT_EXPL_AKISMET_CHECK", $lang['edit_expl_akismet_check_ok'], $page_include);
			} else {
				$page_include = template("EDIT_AKISMET_CHECK_IMAGE", "<img src='templates/default/images/inactive.png' height='16' width='16' alt='inactive.png' title='inactive.png'>&nbsp;", $page_include);
				$page_include = template("LANG_EDIT_EXPL_AKISMET_CHECK", $lang['edit_expl_akismet_check_fail'], $page_include);
			}

			if($settings['debug_mode'] == 0) { $selected_debug_mode_0 = " selected"; } elseif($settings['debug_mode'] == 1) { $selected_debug_mode_1 = " selected"; } else { $selected_debug_mode_2 = " selected"; }
			if($settings['moderated'] == 0) { $selected_moderated_0 = " selected"; } else { $selected_moderated_1 = " selected"; }
			if($settings['require_email'] == 0) { $selected_require_email_0 = " selected"; } else { $selected_require_email_1 = " selected"; }
			if($settings['banlist_ips'] == 0) { $selected_banlist_ips_0 = " selected"; } else { $selected_banlist_ips_1 = " selected"; }
			if($settings['banlist_emails'] == 0) { $selected_banlist_emails_0 = " selected"; } else { $selected_banlist_emails_1 = " selected"; }
			if($settings['banlist_domains'] == 0) { $selected_banlist_domains_0 = " selected"; } else { $selected_banlist_domains_1 = " selected"; }
			if($settings['banlist_log'] == 0) { $selected_banlist_log_0 = " selected"; } else { $selected_banlist_log_1 = " selected"; }
			if($settings['blocktime'] == 9999999) { $selected_blocktime_0 = " selected"; }
			if($settings['blocktime'] == 6480000) { $selected_blocktime_1 = " selected"; }
			if($settings['blocktime'] == 216000) { $selected_blocktime_2 = " selected"; }
			if($settings['blocktime'] == 3600) { $selected_blocktime_3 = " selected"; }
			if($settings['blocktime'] == 60) { $selected_blocktime_4 = " selected"; }
			if($settings['blocktime'] == 0) { $selected_blocktime_5 = " selected"; }
			if($settings['captcha'] == 0) { $selected_captcha_0 = " selected"; } else { $selected_captcha_1 = " selected"; }
			if($settings['captcha_method'] == 0) { $selected_captcha_method_0 = " selected"; } elseif($settings['captcha_method'] == 1) { $selected_captcha_method_1 = " selected"; } else { $selected_captcha_method_2 = " selected"; }
			if($settings['captcha_hash_method'] == "md2") {
				$selected_captcha_hash_method_0 = " selected";
			} elseif($settings['captcha_hash_method'] == "md4") {
				$selected_captcha_hash_method_1 = " selected";
			} elseif($settings['captcha_hash_method'] == "md5") {
				$selected_captcha_hash_method_2 = " selected";
			} elseif($settings['captcha_hash_method'] == "sha1") {
				$selected_captcha_hash_method_3 = " selected";
			} elseif($settings['captcha_hash_method'] == "sha256") {
				$selected_captcha_hash_method_4 = " selected";
			} elseif($settings['captcha_hash_method'] == "sha384") {
				$selected_captcha_hash_method_5 = " selected";
			} elseif($settings['captcha_hash_method'] == "sha512") {
				$selected_captcha_hash_method_6 = " selected";
			} elseif($settings['captcha_hash_method'] == "whirlpool") {
				$selected_captcha_hash_method_7 = " selected";
			}
			// if($settings['recaptcha_style'] == 'red') { $selected_recaptcha_style_0 = " selected"; } elseif($settings['recaptcha_style'] == 'white') { $selected_recaptcha_style_1 = " selected"; } elseif($settings['recaptcha_style'] == 'blackglass') { $selected_recaptcha_style_2 = " selected"; } elseif($settings['recaptcha_style'] == 'clean') { $selected_recaptcha_style_3 = " selected"; }
			if($settings['captcha_double_hash'] == 0) { $selected_captcha_double_hash_0 = " selected"; } else { $selected_captcha_double_hash_1 = " selected"; }
			if($settings['akismet_plugin'] == 0) { $selected_akismet_plugin_0 = " selected"; } else { $selected_akismet_plugin_1 = " selected"; }
			if($settings['akismet_mark_as_spam'] == 0) { $selected_akismet_mark_as_spam_0 = " selected"; } else { $selected_akismet_mark_as_spam_1 = " selected"; }
			if($settings['time_lock'] == 0) { $selected_time_lock_0 = " selected"; } else { $selected_time_lock_1 = " selected"; }
			if($settings['spam_protection'] == 0) { $selected_spam_protection_0 = " selected"; } else { $selected_spam_protection_1 = " selected"; }
			if($settings['ipblocker'] == 0) { $selected_ipblocker_0 = " selected"; } else { $selected_ipblocker_1 = " selected"; }
			if($settings['keystroke'] == 0) { $selected_keystroke_0 = " selected"; } else { $selected_keystroke_1 = " selected"; }
			if($settings['dynamic_fieldnames'] == 0) { $selected_dynamic_fieldnames_0 = " selected"; } else { $selected_dynamic_fieldnames_1 = " selected"; }
			if($settings['dynamic_fieldnames_method'] == 0) { $selected_dynamic_fieldnames_method_0 = " selected"; } else { $selected_dynamic_fieldnames_method_1 = " selected"; }
			$page_include = template("SELECTED_DEBUG_MODE_0", $selected_debug_mode_0, $page_include);
			$page_include = template("SELECTED_DEBUG_MODE_1", $selected_debug_mode_1, $page_include);
			$page_include = template("SELECTED_DEBUG_MODE_2", $selected_debug_mode_2, $page_include);
			$page_include = template("SELECTED_MODERATED_0", $selected_moderated_0, $page_include);
			$page_include = template("SELECTED_MODERATED_1", $selected_moderated_1, $page_include);
			$page_include = template("SELECTED_REQUIRE_EMAIL_0", $selected_require_email_0, $page_include);
			$page_include = template("SELECTED_REQUIRE_EMAIL_1", $selected_require_email_1, $page_include);
			$page_include = template("SELECTED_BANLIST_IPS_0", $selected_banlist_ips_0, $page_include);
			$page_include = template("SELECTED_BANLIST_IPS_1", $selected_banlist_ips_1, $page_include);
			$page_include = template("SELECTED_BANLIST_EMAILS_0", $selected_banlist_emails_0, $page_include);
			$page_include = template("SELECTED_BANLIST_EMAILS_1", $selected_banlist_emails_1, $page_include);
			$page_include = template("SELECTED_BANLIST_DOMAINS_0", $selected_banlist_domains_0, $page_include);
			$page_include = template("SELECTED_BANLIST_DOMAINS_1", $selected_banlist_domains_1, $page_include);
			$page_include = template("SELECTED_BANLIST_LOG_0", $selected_banlist_log_0, $page_include);
			$page_include = template("SELECTED_BANLIST_LOG_1", $selected_banlist_log_1, $page_include);
			// $page_include = template("SELECTED_SPAM_PROTECTION_0", $selected_spam_protection_0, $page_include);
			// $page_include = template("SELECTED_SPAM_PROTECTION_1", $selected_spam_protection_1, $page_include);
			$page_include = template("SELECTED_BLOCKTIME_0", $selected_blocktime_0, $page_include);
			$page_include = template("SELECTED_BLOCKTIME_1", $selected_blocktime_1, $page_include);
			$page_include = template("SELECTED_BLOCKTIME_2", $selected_blocktime_2, $page_include);
			$page_include = template("SELECTED_BLOCKTIME_3", $selected_blocktime_3, $page_include);
			$page_include = template("SELECTED_BLOCKTIME_4", $selected_blocktime_4, $page_include);
			$page_include = template("SELECTED_BLOCKTIME_5", $selected_blocktime_5, $page_include);
			$page_include = template("SELECTED_CAPTCHA_0", $selected_captcha_0, $page_include);
			$page_include = template("SELECTED_CAPTCHA_1", $selected_captcha_1, $page_include);
			$page_include = template("SELECTED_CAPTCHA_METHOD_0", $selected_captcha_method_0, $page_include);
			$page_include = template("SELECTED_CAPTCHA_METHOD_1", $selected_captcha_method_1, $page_include);
			$page_include = template("SELECTED_CAPTCHA_METHOD_2", $selected_captcha_method_2, $page_include);
			$page_include = template("EDIT_CAPTCHA_SALT", $settings['captcha_salt'], $page_include);
			$page_include = template("SELECTED_CAPTCHA_HASH_METHOD_0", $selected_captcha_hash_method_0, $page_include);
			$page_include = template("SELECTED_CAPTCHA_HASH_METHOD_1", $selected_captcha_hash_method_1, $page_include);
			$page_include = template("SELECTED_CAPTCHA_HASH_METHOD_2", $selected_captcha_hash_method_2, $page_include);
			$page_include = template("SELECTED_CAPTCHA_HASH_METHOD_3", $selected_captcha_hash_method_3, $page_include);
			$page_include = template("SELECTED_CAPTCHA_HASH_METHOD_4", $selected_captcha_hash_method_4, $page_include);
			$page_include = template("SELECTED_CAPTCHA_HASH_METHOD_5", $selected_captcha_hash_method_5, $page_include);
			$page_include = template("SELECTED_CAPTCHA_HASH_METHOD_6", $selected_captcha_hash_method_6, $page_include);
			$page_include = template("SELECTED_CAPTCHA_HASH_METHOD_7", $selected_captcha_hash_method_7, $page_include);
			$page_include = template("SELECTED_RECAPTCHA_STYLE_0", $selected_recaptcha_style_0, $page_include);
			$page_include = template("SELECTED_RECAPTCHA_STYLE_1", $selected_recaptcha_style_1, $page_include);
			$page_include = template("SELECTED_RECAPTCHA_STYLE_2", $selected_recaptcha_style_2, $page_include);
			$page_include = template("SELECTED_RECAPTCHA_STYLE_3", $selected_recaptcha_style_3, $page_include);
			$page_include = template("EDIT_CAPTCHA_LENGTH", $settings['captcha_length'], $page_include);
			$page_include = template("EDIT_CAPTCHA_MAX_LENGTH", $settings['captcha_max_length'], $page_include);
			$page_include = template("SELECTED_CAPTCHA_DOUBLE_HASH_0", $selected_captcha_double_hash_0, $page_include);
			$page_include = template("SELECTED_CAPTCHA_DOUBLE_HASH_1", $selected_captcha_double_hash_1, $page_include);
			$page_include = template("EDIT_CAPTCHA_COORDS_X", $settings['captcha_coords_x'], $page_include);
			$page_include = template("EDIT_CAPTCHA_COORDS_Y", $settings['captcha_coords_y'], $page_include);
			$page_include = template("EDIT_CAPTCHA_COLOR", $settings['captcha_color'], $page_include);
			$page_include = template("EDIT_CAPTCHA_ANGLE_1", $settings['captcha_angle_1'], $page_include);
			$page_include = template("EDIT_CAPTCHA_ANGLE_2", $settings['captcha_angle_2'], $page_include);
			$page_include = template("EDIT_RECAPTCHA_PUB_KEY", $settings['recaptcha_pub_key'], $page_include);
			$page_include = template("EDIT_RECAPTCHA_PRIVATE_KEY", $settings['recaptcha_private_key'], $page_include);
			$page_include = template("SELECTED_AKISMET_PLUGIN_0", $selected_akismet_plugin_0, $page_include);
			$page_include = template("SELECTED_AKISMET_PLUGIN_1", $selected_akismet_plugin_1, $page_include);
			$page_include = template("EDIT_AKISMET_API", $settings['akismet_api'], $page_include);
			$page_include = template("SELECTED_AKISMET_MARK_AS_SPAM_0", $selected_akismet_mark_as_spam_0, $page_include);
			$page_include = template("SELECTED_AKISMET_MARK_AS_SPAM_1", $selected_akismet_mark_as_spam_1, $page_include);
			$page_include = template("SELECTED_TIME_LOCK_0", $selected_time_lock_0, $page_include);
			$page_include = template("SELECTED_TIME_LOCK_1", $selected_time_lock_1, $page_include);
			$page_include = template("EDIT_TIME_LOCK_VALUE", $settings['time_lock_value'], $page_include);
			$page_include = template("EDIT_TIME_LOCK_MAXTIME", $settings['time_lock_maxtime'], $page_include);
			$page_include = template("EDIT_TIME_LOCK_SPAM_COUNT", $settings['time_lock_spam_count'], $page_include);
			$page_include = template("SELECTED_KEYSTROKE_0", $selected_keystroke_0, $page_include);
			$page_include = template("SELECTED_KEYSTROKE_1", $selected_keystroke_1, $page_include);
			$page_include = template("SELECTED_DYNAMIC_FIELDNAMES_0", $selected_dynamic_fieldnames_0, $page_include);
			$page_include = template("SELECTED_DYNAMIC_FIELDNAMES_1", $selected_dynamic_fieldnames_1, $page_include);
			$page_include = template("SELECTED_DYNAMIC_FIELDNAMES_METHOD_0", $selected_dynamic_fieldnames_method_0, $page_include);
			$page_include = template("SELECTED_DYNAMIC_FIELDNAMES_METHOD_1", $selected_dynamic_fieldnames_method_1, $page_include);
			$page_include = template("EDIT_DYNAMIC_FIELDNAMES_LENGTH", $settings['dynamic_fieldnames_length'], $page_include);
			$page_include = template("EDIT_KEYSTROKE_MAX_CPS", $settings['keystroke_max_cps'], $page_include);
			$page_include = template("EDIT_KEYSTROKE_BAN_TIME", $settings['keystroke_ban_time'], $page_include);
			$page_include = template("EDIT_SESSION_TIMEOUT", $settings['session_timeout'], $page_include);
			$page_include = template("EDIT_PASSWORD_MIN_LENGTH", $settings['password_min_length'], $page_include);
			$page_include = template("EDIT_WRONG_CAPTCHA_COUNT", $settings['wrong_captcha_count'], $page_include);

			// is scrolling function needed?
			$content_scrolling_function = "";
		} else {
			$page_include = "<span class=\"admin\">".$lang['errormessage'][4]."</span>"; // user has no access to this page, user level too low
			$content_scrolling_function = "<br>";
		}
	}
?>