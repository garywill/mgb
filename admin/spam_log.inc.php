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
	*/

	// ================ //
	// spam_log.inc.php //
	// ================ //
	//
	// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

	// make sure nobody has direct access to this script
	if (!defined('ADMINISTRATION')) {
		include ("error.html");
		die();
	} else {
		if(check_rights($_GET['action'], $_SESSION['ID'])) {
			// load config, settings and language files
			require ("../includes/config.inc.php");
			require ("../includes/load_settings.inc.php");
			require ("../language/".$settings['language_path']."/lang_admin.php");
			// load templates
			$content_spam_log = mgb_load_template("admin", "default", "spam_log", $settings['debug_mode']);

			// set number of site to "1" if it is "0"
			if(!isset($_GET['p'])) { $_GET['p'] = 1; }

			$_POST['dropbox'] = cleanstr($_POST['dropbox']);

			if((!empty($_POST['dropbox']) AND $_POST['dropbox'] == 2) OR (!empty($_POST['dropbox']) AND $_POST['dropbox'] == 4)) { // put all entries that were blocked on ip banlist
				$script_time_start = microtime(true);
				$entry_counter = 0;
				$result = mgb_sql_connect("SELECT ip FROM ".$db['prefix']."spam_log WHERE type=3 OR type=4 OR type=9 OR type=11", "Error while loading IPs from spam_log!", 1);
				for($i = 0; $i < mysqli_num_rows($result); $i++) {
					$spam_entry[$i] = mysqli_fetch_array($result);
					$counter = 0;
					$result_parts = explode(".", $spam_entry[$i]['ip']);
					$banned_ip = mgb_sql_connect("SELECT banned_ip FROM ".$db['prefix']."banlist_ips WHERE banned_ip = '".$spam_entry[$i]['ip']."'", "Error while loading banned IP from ".$db['prefix']."banlist_ips.", 1);
					$count_banned_ip = $count_banned_ip + mysqli_num_rows($banned_ip);
					$ip = mysqli_fetch_array($banned_ip);
					// put ip on ip banlist if it is not already in there
					if($spam_entry[$i]['ip'] != $ip['banned_ip']) {
						mgb_sql_connect("INSERT INTO ".$db['prefix']."banlist_ips (
							ID,
							banned_ip,
							banned_ip_first,
							banned_ip_second,
							banned_ip_third,
							banned_ip_fourth,
							matches,
							timestamp )
						values (
							NULL,
							'".$spam_entry[$i]['ip']."',
							'".$result_parts[0]."',
							'".$result_parts[1]."',
							'".$result_parts[2]."',
							'".$result_parts[3]."',
							'0',
							'".time()."' )", "Error while saving data into ".$db['prefix']."banlist_ips", 0);
						$entry_counter++;
					}
				}

				$script_time_end = microtime(true);
				$script_time = $script_time_end - $script_time_start;

				if($_POST['dropbox'] == 4) {
					$delete_everything++;
				}

				$template_message.= $lang['updated_ips'];
				$template_message = template("COUNTER", $entry_counter, $template_message);
				$template_message = template("SECONDS", round($script_time, 3), $template_message);
			}

			if((isset($_POST['dropbox']) AND $_POST['dropbox'] == 3) OR (isset($_POST['dropbox']) AND $_POST['dropbox'] == 4)) { // put all entries that were blocked on email banlist
				$script_time_start = microtime(true);
				$entry_counter = 0;
				$result = mgb_sql_connect("SELECT email FROM ".$db['prefix']."spam_log WHERE type=1 OR type=3 OR type=4 OR type=9 OR type=11", "Error while loading mails from spam table", 1);
				for($i = 0; $i < mysqli_num_rows($result); $i++) {
					$spam_entry[$i] = mysqli_fetch_array($result);
					$counter = 0;
					$result_parts = explode("@", $spam_entry[$i]['email']);
					$banned_email = mgb_sql_connect("SELECT banned_email FROM ".$db['prefix']."banlist_emails WHERE banned_email = '".$spam_entry[$i]['email']."'", "Error while loading banned email from ".$db['prefix']."banlist_emails.", 1);
					$count_banned_email = $count_banned_email + mysqli_num_rows($banned_email);
					$email = mysqli_fetch_array($banned_email);
					// put email on email banlist if it is not already in there
					if($spam_entry[$i]['email'] != $email['banned_email']) {
						mgb_sql_connect("INSERT INTO ".$db['prefix']."banlist_emails (
							ID,
							banned_email,
							banned_email_first,
							banned_email_second,
							matches,
							timestamp )
						values (
							NULL,
							'".$spam_entry[$i]['email']."',
							'".$result_parts[0]."',
							'".$result_parts[1]."',
							'0',
							'".time()."' )", "Error while saving data into ".$db['prefix']."banlist_emails", 0);
						$entry_counter++;
					}
				}

				$script_time_end = microtime(true);
				$script_time = $script_time_end - $script_time_start;

				if($_POST['dropbox'] == 4) {
					$template_message.= "<br><br>";
					$delete_everything++;
				}

				$template_message.= $lang['updated_emails'];
				$template_message = template("COUNTER", $entry_counter, $template_message);
				$template_message = template("SECONDS", round($script_time, 3), $template_message);
			}

			if((isset($_POST['dropbox']) AND $_POST['dropbox'] == 10) OR (isset($_POST['dropbox']) AND $_POST['dropbox'] == 4)) { // put all entries that were blocked on domain banlist
				$script_time_start = microtime(true);
				$entry_counter = 0;
				$result = mgb_sql_connect("SELECT email FROM ".$db['prefix']."spam_log WHERE type=1 OR type=9 OR type=11", "Error while loading mails from spam table", 1);
				for($i = 0; $i < mysqli_num_rows($result); $i++) {
					$spam_entry[$i] = mysqli_fetch_array($result);
					$counter = 0;
					$result_parts = explode("@", $spam_entry[$i]['email']);
					$banned_domain = mgb_sql_connect("SELECT banned_domain FROM ".$db['prefix']."banlist_domains WHERE banned_domain = '".$result_parts[1]."'", "Error while loading banned domain from ".$db['prefix']."banlist_domains.", 1);
					$count_banned_domain = $count_banned_domain + mysqli_num_rows($banned_domain);
					$domain = mysqli_fetch_array($banned_domain);
					// put domain on domain banlist if it is not already in there
					if($result_parts[1] != $domain['banned_domain']) {
						mgb_sql_connect("INSERT INTO ".$db['prefix']."banlist_domains (
							ID,
							banned_domain,
							matches,
							timestamp )
						values (
							NULL,
							'".$result_parts[1]."',
							'0',
							'".time()."' )", "Error while saving data into ".$db['prefix']."banlist_domains", 0);
						$entry_counter++;
					}
				}

				$script_time_end = microtime(true);
				$script_time = $script_time_end - $script_time_start;

				if($_POST['dropbox'] == 4) {
					$template_message.= "<br><br>";
					$delete_everything++;
				}

				$template_message.= $lang['updated_domains'];
				$template_message = template("COUNTER", $entry_counter, $template_message);
				$template_message = template("SECONDS", round($script_time, 3), $template_message);
			}

			if((isset($_POST['dropbox']) AND $_POST['dropbox'] == 1) OR ($delete_everything == 3)) { // Delete all spam_log entries
				mgb_sql_connect("TRUNCATE ".$db['prefix']."spam_log", "Error while deleting all log entries.", 0);
			}

			if(isset($_GET['id'])) {
				if(isset($_GET['spam_action'])) {
					if($_GET['spam_action'] == 'delete') {
						mgb_sql_connect("DELETE FROM `".$db['prefix']."spam_log` WHERE ID=".secure_value($_GET['id'])." LIMIT 1", "Error while deleting a single log entry.", 0);
					} elseif($_GET['spam_action'] == 'add_to_permanent_ip_banlist') {
						$script_time_start = microtime(true);
						$result = mgb_sql_connect("SELECT ip FROM ".$db['prefix']."spam_log WHERE ID=".secure_value($_GET['id'])." LIMIT 1", "Error while loading IP from spam table", 1);
						while($spam_entry = mysqli_fetch_array($result)) {
							$result_parts = explode(".", $spam_entry['ip']);
							$banned_ips = mgb_sql_connect("SELECT banned_ip FROM ".$db['prefix']."banlist_ips WHERE banned_ip = '".$spam_entry['ip']."'", "Error while loading banned ips from ".$db['prefix']."banlist_ips.", 1);
							$ip = mysqli_fetch_array($banned_ips);
							// put ip on ip banlist if it is not already in there
							if($spam_entry['ip'] != $ip['banned_ip']) {
								mgb_sql_connect("INSERT INTO ".$db['prefix']."banlist_ips (
									ID,
									banned_ip,
									banned_ip_first,
									banned_ip_second,
									banned_ip_third,
									banned_ip_fourth,
									matches,
									timestamp )
								values (
									NULL,
									'".$spam_entry['ip']."',
									'".$result_parts[0]."',
									'".$result_parts[1]."',
									'".$result_parts[2]."',
									'".$result_parts[3]."',
									'0',
									'".time()."' )", "Error while saving data into ".$db['prefix']."banlist_ips", 0);
								$template_message = $spam_entry['ip'].$lang['spam_added_to_ip_list'];
							} else {
								$template_message = $spam_entry['ip'].$lang['spam_is_already_on_ip_list'];
							}
						}
						$script_time_end = microtime(true);
						$script_time = $script_time_end - $script_time_start;
					} elseif($_GET['spam_action'] == 'add_to_permanent_email_banlist') {
						$script_time_start = microtime(true);
						$result = mgb_sql_connect("SELECT email FROM ".$db['prefix']."spam_log WHERE ID=".secure_value($_GET['id'])." LIMIT 1", "Error while loading email from spam table", 1);
						while($spam_entry = mysqli_fetch_array($result)) {
							$result_parts = explode("@", $spam_entry['email']);
							$banned_emails = mgb_sql_connect("SELECT banned_email FROM ".$db['prefix']."banlist_emails WHERE banned_email = '".$spam_entry['email']."'", "Error while loading banned emails from ".$db['prefix']."banlist_emails.", 1);
							$email = mysqli_fetch_array($banned_emails);
							// put email on email banlist if it is not already in there
							if($spam_entry['email'] != $email['banned_email']) {
								mgb_sql_connect("INSERT INTO ".$db['prefix']."banlist_emails (
									ID,
									banned_email,
									banned_email_first,
									banned_email_second,
									matches,
									timestamp )
								values (
									NULL,
									'".$spam_entry['email']."',
									'".$result_parts[0]."',
									'".$result_parts[1]."',
									'0',
									'".time()."' )", "Error while saving data into ".$db['prefix']."banlist_emails", 0);
								$template_message = $spam_entry['email'].$lang['spam_added_to_email_list'];
							} else {
								$template_message = $spam_entry['email'].$lang['spam_is_already_on_email_list'];
							}
						}
						$script_time_end = microtime(true);
						$script_time = $script_time_end - $script_time_start;
					} elseif($_GET['spam_action'] == 'add_to_permanent_domain_banlist') {
						$script_time_start = microtime(true);
						$result = mgb_sql_connect("SELECT email FROM ".$db['prefix']."spam_log WHERE ID=".secure_value($_GET['id'])." LIMIT 1", "Error while loading email from spam table", 1);
						while($spam_entry = mysqli_fetch_array($result)) {
							$result_parts = explode("@", $spam_entry['email']);
							$banned_domains = mgb_sql_connect("SELECT banned_domain FROM ".$db['prefix']."banlist_domains WHERE banned_domain = '".$result_parts[1]."'", "Error while loading banned domains from ".$db['prefix']."banlist_domains.", 1);
							$email = mysqli_fetch_array($banned_domains);
							// put domain on domain banlist if it is not already in there
							if($result_parts[1] != $email['banned_domain']) {
								mgb_sql_connect("INSERT INTO ".$db['prefix']."banlist_domains (
									ID,
									banned_domain,
									matches,
									timestamp )
								values (
									NULL,
									'".$result_parts[1]."',
									'0',
									'".time()."' )", "Error while saving data into ".$db['prefix']."banlist_domains", 0);
								$template_message = $result_parts[1].$lang['spam_added_to_domain_list'];
							} else {
								$template_message = $result_parts[1].$lang['spam_is_already_on_domain_list'];
							}
						}
						$script_time_end = microtime(true);
						$script_time = $script_time_end - $script_time_start;
						// delete the entry from spam table
						// mgb_sql_connect("DELETE FROM `".$db['prefix']."spam_log` WHERE ID=".secure_value($_GET['id'])." LIMIT 1", "Error while deleting an entry from spam table.", 0);
					}
				}
			}

			// get total number of entries
			if((!empty($_POST['dropbox']) AND $_POST['dropbox'] == 5) OR (!empty($_GET['show_type']) AND $_GET['show_type'] == 1)) {
				$show_type = " WHERE type=1";
				$show_url = "&amp;show_type=1";
			} elseif((!empty($_POST['dropbox']) AND $_POST['dropbox'] == 6) OR (!empty($_GET['show_type']) AND $_GET['show_type'] == 3)) {
				$show_type = " WHERE type=3";
				$show_url = "&amp;show_type=3";
			} elseif((!empty($_POST['dropbox']) AND $_POST['dropbox'] == 7) OR (!empty($_GET['show_type']) AND $_GET['show_type'] == 4)) {
				$show_type = " WHERE type=4";
				$show_url = "&amp;show_type=4";
			} elseif((!empty($_POST['dropbox']) AND $_POST['dropbox'] == 8) OR (!empty($_GET['show_type']) AND $_GET['show_type'] == 11)) {
				$show_type = " WHERE type=11";
				$show_url = "&amp;show_type=11";
			} elseif((!empty($_POST['dropbox']) AND $_POST['dropbox'] == 9) OR (!empty($_GET['show_type']) AND $_GET['show_type'] == 9)) {
				$show_type = " WHERE type=9";
				$show_url = "&amp;show_type=9";
			}

			$results = mysqli_fetch_assoc(mgb_sql_connect("SELECT COUNT(ID) FROM ".$db['prefix']."spam_log".$show_type, "Error while counting spam log entries.", 1));
			$total = $results['COUNT(ID)'];

			// how many entries per page shall be shown?
			$epp = 50;

			// compute how many pages there are
			$p = ($total / $epp);

			if ($p <= 1) {
				$p = 0;
				if ($total > 1) {
					$how_many_entries = "<span class=\"admin\">".$total."&nbsp;".$lang['entries']."</span>";
				} elseif ($total == 0) {
					$how_many_entries = "<span class=\"admin\">".$lang['no_spam_entries']."</span>";
				} else {
					$how_many_entries = "<span class=\"admin\">".$total."&nbsp;".$lang['entry']."</span>";
				}
			} else {
				$p = ceil($p);
				$how_many_entries = "<span class=\"admin\">".$total."&nbsp;".$lang['entries_on_pages']."</span>";
			}

			$load_start = ($_GET['p'] * $epp) - $epp;
			$load_end = $epp;

			$pages_total = ceil($p);

			if ($_GET['p'] == 1) {
				$sf_forwards = "<a class=\"admin\" href=\"admin.php?action=spam_log".$show_url."&amp;p=".($_GET['p'] + 1).$sid."\" title=\"".$lang['page_forwards']."\">".$lang['page_forwards_symbol']."</a>";
				$sf_pagenumber = $_GET['p'];
				if ($pages_total >= 3 ) {
					$sf_last = "<a class=\"admin\" href=\"admin.php?action=spam_log".$show_url."&amp;p=".$pages_total."\" title=\"".$lang['page_last']."\">".$lang['page_last_symbol']."</a>";
				}
			}

			if ($_GET['p'] > 1) {
				if (($pages_total >= 3) AND ($_GET['p'] > 2)) {
					$sf_first = "<a class=\"admin\" href=\"admin.php?action=spam_log".$show_url."&amp;p=1".$sid."\" title=\"".$lang['page_first']."\">".$lang['page_first_symbol']."</a>";
				}
				$sf_backwards = "<a class=\"admin\" href=\"admin.php?action=spam_log".$show_url."&amp;p=".($_GET['p'] - 1).$sid."\" title=\"".$lang['page_backwards']."\">".$lang['page_backwards_symbol']."</a>";
				$sf_pagenumber = $_GET['p'];
				$sf_forwards = "<a class=\"admin\" href=\"admin.php?action=spam_log".$show_url."&amp;p=".($_GET['p'] + 1).$sid."\" title=\"".$lang['page_forwards']."\">".$lang['page_forwards_symbol']."</a>";
				if (($pages_total >= 3) AND ($_GET['p'] < ($pages_total - 1))) {
					$sf_last = "&nbsp;<a class=\"admin\" href=\"admin.php?action=spam_log".$show_url."&amp;p=".$pages_total.$sid."\" title=\"".$lang['page_last']."\">".$lang['page_last_symbol']."</a>";
				}
			}

			if ($_GET['p'] == $pages_total) {
				if ($pages_total >= 3) {
					$sf_first = "<a class=\"admin\" href=\"admin.php?action=spam_log".$show_url."&amp;p=1".$sid."\" title=\"".$lang['page_first']."\">".$lang['page_first_symbol']."</a>";
				}
				$sf_backwards = "<a class=\"admin\" href=\"admin.php?action=spam_log".$show_url."&amp;p=".($_GET['p'] - 1).$sid."\" title=\"".$lang['page_backwards']."\">".$lang['page_backwards_symbol']."</a>";
				$sf_pagenumber = $_GET['p'];
				$sf_forwards = "";
			}

			if ($pages_total <= 0) {
				$content_scrolling_function = "<br><br>";
			}

			// load spam_log entries
			$result = mgb_sql_connect("SELECT * FROM ".$db['prefix']."spam_log".$show_type." ORDER BY timestamp DESC LIMIT $load_start, $load_end", "Error while loading spam_log entries banned by IP.", 1);
			$counter = 0;

			for($i = 0; $i < mysqli_num_rows($result); $i++) {
				$entry[$i] = mysqli_fetch_array($result);
				$counter++;
			}

			if($counter <= 1) {
				if ($_GET['p'] == 1) {
					$add_page_nr = NULL;
				} else {
					$add_page_nr = "&amp;p=".($_GET['p'] - 1);
				}
			} else {
				$add_page_nr = "&amp;p=".$_GET['p'];
			}

			// fill entry template with content
			require ("../includes/functions.inc.php");

			if(!isset($entry)) {
				$entry = NULL;
			}

			for($i = 0; $i < count($entry); $i++) {
				$page_entry[$i] = $content_spam_log;
				$entry_timestamp = mgb_modern_timestamp($entry[$i]['timestamp'], $settings['language_path'], "adminpanel");

				if(empty($entry[$i]['email'])) {
					$entry[$i]['email'] = "-";
				}

				$entry_domain = explode("@", $entry[$i]['email']);
				// fill template with entry (strings)
				$page_entry[$i] = template("ENTRY_ID", $entry[$i]['ID'], $page_entry[$i]);
				$page_entry[$i] = template("ENTRY_IP", "<a href=\"admin.php?action=spam_log&amp;id=".$entry[$i]['ID']."&amp;spam_action=add_to_permanent_ip_banlist".$add_page_nr.$sid."\" onClick=\"return confirm('{LANG_CONFIRM_ADD_TO_PERMANENT_IP_BLOCKLIST}'); submit();\" title=\"{LANG_SPAM_ADD_TO_IP_BANLIST}\">".$entry[$i]['ip']."</a>", $page_entry[$i]);
				$page_entry[$i] = template("ENTRY_EMAIL", "<a href=\"admin.php?action=spam_log&amp;id=".$entry[$i]['ID']."&amp;spam_action=add_to_permanent_email_banlist".$add_page_nr.$sid."\" onClick=\"return confirm('{LANG_CONFIRM_ADD_TO_PERMANENT_EMAIL_BLOCKLIST}'); submit();\" title=\"{LANG_SPAM_ADD_TO_EMAIL_BANLIST}\">".$entry[$i]['email']."</a>", $page_entry[$i]);
				$page_entry[$i] = template("ENTRY_DOMAIN", "<a href=\"admin.php?action=spam_log&amp;id=".$entry[$i]['ID']."&amp;spam_action=add_to_permanent_domain_banlist".$add_page_nr.$sid."\" onClick=\"return confirm('{LANG_CONFIRM_ADD_TO_PERMANENT_DOMAIN_BLOCKLIST}'); submit();\" title=\"{LANG_SPAM_ADD_TO_DOMAIN_BANLIST}\">".$entry_domain[1]."</a>", $page_entry[$i]);
				$page_entry[$i] = template("ENTRY_USER_AGENT", $entry[$i]['user_agent'], $page_entry[$i]);
				$page_entry[$i] = template("ENTRY_HP", $entry[$i]['hp'], $page_entry[$i]);
				$page_entry[$i] = template("ENTRY_MESSAGE", $entry[$i]['message'], $page_entry[$i]);
				$page_entry[$i] = template("ENTRY_TYPE", $lang['spam_entry_type'][$entry[$i]['type']], $page_entry[$i]);
				$page_entry[$i] = template("ENTRY_SITE", $entry[$i]['site'], $page_entry[$i]);
				$page_entry[$i] = template("ENTRY_TIMESTAMP", $entry_timestamp, $page_entry[$i]);
				$page_entry[$i] = template("DELETE", "<a href=\"admin.php?action=spam_log&amp;id=".$entry[$i]['ID']."&amp;spam_action=delete".$add_page_nr.$sid."\" onClick=\"return confirm('".$entry[$i]['ID'].", ".$entry[$i]['ip'].":&nbsp;{LANG_CONFIRM_DELETE}'); submit();\"><img class=\"icon\" src=\"templates/default/images/delete.png\" title=\"".$lang['delete_entry']."\" alt=\"".$lang['delete_entry']."\"></a>", $page_entry[$i]);

				if(!isset($page_include)) { $page_include = NULL; }
				$page_include .= $page_entry[$i];
			}
		} else {
			$page_include = "<span class=\"admin\">".$lang['errormessage'][4]."</span>";
			$content_scrolling_function = "<br>";
		}
	}
?>