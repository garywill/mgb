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

	===================
	banlist_ips.inc.php
	===================
	*/

	// make sure nobody has direct access to this script
	if (!defined('ADMINISTRATION'))
		{
		include ("error.html");
		die();
		}
	else
		{
		if(check_rights($_GET['action'], $_SESSION['ID']))
			{
			// load config, settings and language files
			require ("../includes/config.inc.php");
			require ("../includes/load_settings.inc.php");
			require ("../language/".$settings['language_path']."/lang_admin.php");
			// load templates
			$content_banlist_ips = mgb_load_template("admin", "default", "banlists", $settings['debug_mode']);

			// set number of site to "1" if it is "0"
			if(!isset($_GET['p'])) { $_GET['p'] = 1; }

			$_POST['dropbox'] = cleanstr($_POST['dropbox']);

			if(!empty($_POST['dropbox']))
				{
				if($_POST['dropbox'] == 1) // Delete all spam entries
					{
					mgb_sql_connect("TRUNCATE ".$db['prefix']."banlist_ips", "Error while deleting all ip entries.", 0);
					}
				elseif($_POST['dropbox'] == 8) // export as sql dump
					{
					$script_time_start = microtime(true);
					include("../includes/config.inc.php");

					$sql_dump = "-- MGB OpenSource Guestbook SQL Dump\n";
					$sql_dump.= "-- Version: ".$settings['version']."\n";
					$sql_dump.= "-- http://www.m-gb.org/\n";
					$sql_dump.= "--\n";
					$sql_dump.= "-- Host: ".$db['hostname']."\n";
					$sql_dump.= "-- Database: ".$db['dbname']."\n";
					$sql_dump.= "-- Tables: banlist_ips\n";
					$sql_dump.= "-- ---------------------------------------;\n\n";

					// banlist_ips
					/* $sql_dump.= "--\n";
					$sql_dump.= "-- Structure of: banlist_ips\n";
					$sql_dump.= "--\n\n"; */

					$sql_dump.= "CREATE TABLE IF NOT EXISTS `{DB_PREFIX}banlist_ips` (
						`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
						`banned_ip` VARCHAR( 255 ) NOT NULL ,
						`banned_ip_first` VARCHAR( 255 ) NOT NULL ,
						`banned_ip_second` VARCHAR( 255 ) NOT NULL ,
						`banned_ip_third` VARCHAR( 255 ) NOT NULL ,
						`banned_ip_fourth` VARCHAR( 255 ) NOT NULL ,
						`matches` INT( 11 ) NOT NULL ,
						`timestamp` INT( 255 ) NOT NULL
						) DEFAULT CHARSET=utf8 ;\n\n";

					/* $sql_dump.= "--\n";
					$sql_dump.= "-- Data of: banlist_ips\n";
					$sql_dump.= "--\n\n"; */

					$result = mgb_sql_connect("SELECT banned_ip, banned_ip_first, banned_ip_second, banned_ip_third, banned_ip_fourth, timestamp FROM ".$db['prefix']."banlist_ips ORDER BY timestamp ASC", "Error while loading data from banlist_ips for sql export.", 1);
					if(mysqli_num_rows($result) < 2)
						{
						for($i = 0; $i < mysqli_num_rows($result); $i++)
							{
							$export[$i] = mysqli_fetch_array($result);
							$ID = $i + 1;
							$sql_dump.= "INSERT INTO `{DB_PREFIX}banlist_ips` (`ID`, `banned_ip`, `banned_ip_first`, `banned_ip_second`, `banned_ip_third`, `banned_ip_fourth`, `timestamp`) VALUES (".secure_value($ID).", ".secure_value($export[$i]['banned_ip']).", ".secure_value($export[$i]['banned_ip_first']).", ".secure_value($export[$i]['banned_ip_second']).", ".secure_value($export[$i]['banned_ip_third']).", ".secure_value($export[$i]['banned_ip_fourth']).", ".secure_value($export[$i]['timestamp']).");\n";
							}
						}
					else
						{
						$sql_dump.= "INSERT INTO `{DB_PREFIX}banlist_ips` (`ID`, `banned_ip`, `banned_ip_first`, `banned_ip_second`, `banned_ip_third`, `banned_ip_fourth`, `timestamp`) VALUES\n";
						for($i = 0; $i < mysqli_num_rows($result); $i++)
							{
							$export[$i] = mysqli_fetch_array($result);
							$ID = $i + 1;
							$sql_dump.="(".secure_value($ID).", ".secure_value($export[$i]['banned_ip']).", ".secure_value($export[$i]['banned_ip_first']).", ".secure_value($export[$i]['banned_ip_second']).", ".secure_value($export[$i]['banned_ip_third']).", ".secure_value($export[$i]['banned_ip_fourth']).", ".secure_value($export[$i]['timestamp']).")";
							if($i == (mysqli_num_rows($result) - 1))
								{
								$sql_dump.= ";\n";
								}
							else
								{
								$sql_dump.= ",\n";
								}
							}
						}
					$sql_dump.= "\n-- END OF FILE --";

					if(file_exists("../save") AND is_writable("../save"))
						{
						$timestamp = time();
						if(mgb_write_export_file("../save/".$timestamp."-".$db['prefix']."banlist_ips.sql", $sql_dump) === TRUE)
							{
							$script_time_end = microtime(true);
							$script_time = $script_time_end - $script_time_start;
							$template_message = "<span class='newer_version'><a href='../save/".$timestamp."-".$db['prefix']."banlist_ips.sql' target='_blank'>SQL Dump</a> erfolgreich in ".round($script_time, 3)." Sekunden erstellt!</span>";
							}
						else
							{
							$template_message = "<span class='old_version'>".$lang['errormessage'][17]."</span>";
							}
						}
					else
						{
						$template_message = "<span class='old_version'>".$lang['errormessage'][17]."</span>";
						}
					}
				elseif($_POST['dropbox'] == 9) // export as csv
					{
					$script_time_start = microtime(true);

					$result = mgb_sql_connect("SELECT banned_ip, banned_ip_first, banned_ip_second, banned_ip_third, banned_ip_fourth, timestamp FROM ".$db['prefix']."banlist_ips ORDER BY timestamp ASC", "Error while loading data from banlist_ips for sql export.", 1);
					for($i = 0; $i < mysqli_num_rows($result); $i++)
						{
						$export[$i] = mysqli_fetch_array($result);
						$ID = $i + 1;
						$csv.= $ID.":".$export[$i]['banned_ip'].":".$export[$i]['banned_ip_first'].":".$export[$i]['banned_ip_second'].":".$export[$i]['banned_ip_third'].":".$export[$i]['banned_ip_fourth'].":".$export[$i]['timestamp']."\n";
						}

					if(file_exists("../save") AND is_writable("../save"))
						{
						$timestamp = time();
						if(mgb_write_export_file("../save/".$timestamp."-".$db['prefix']."banlist_ips.csv", $csv) === TRUE)
							{
							$script_time_end = microtime(true);
							$script_time = $script_time_end - $script_time_start;
							$template_message = "<span class='newer_version'><a href='../save/".$timestamp."-".$db['prefix']."banlist_ips.csv' target='_blank'>CSV</a> erfolgreich in ".round($script_time, 3)." Sekunden erstellt!</span>";
							}
						else
							{
							$template_message = "<span class='old_version'>".$lang['errormessage'][18]."</span>";
							}
						}
					else
						{
						$template_message = "<span class='old_version'>".$lang['errormessage'][18]."</span>";
						}
					}
				}

			if(isset($_GET['id']))
				{
				if(isset($_GET['spam_action']))
					{
					if($_GET['spam_action'] == 'delete')
						{
						mgb_sql_connect("DELETE FROM `".$db['prefix']."banlist_ips` WHERE ID=".secure_value($_GET['id'])." LIMIT 1", "Error while deleting a single ip entry.", 0);
						}
					}
				}

			// get total number of entries
			$results = mysqli_fetch_assoc(mgb_sql_connect("SELECT COUNT(banned_ip) FROM ".$db['prefix']."banlist_ips", "Error while counting banned ip entries.", 1));
			$total = $results['COUNT(banned_ip)'];

			// how many entries per page shall be shown?
			$epp = 100;

			// compute how many pages there are
			$p = ($total / $epp);

			if ($p <= 1)
				{
				$p = 0;
				if ($total > 1)
					{
					$how_many_entries = "<span class=\"admin\">".$total."&nbsp;".$lang['entries']."</span>";
					}
				elseif ($total == 0)
					{
					$how_many_entries = "<span class=\"admin\">".$lang['no_spam_entries']."</span>";
					}
				else
					{
					$how_many_entries = "<span class=\"admin\">".$total."&nbsp;".$lang['entry']."</span>";
					}
				}
			else
				{
				$p = ceil($p);
				$how_many_entries = "<span class=\"admin\">".$total."&nbsp;".$lang['entries_on_pages']."</span>";
				}

			$load_start = ($_GET['p'] * $epp) - $epp;
			$load_end = $epp;

			$pages_total = ceil($p);

			if ($_GET['p'] == 1)
				{
				$sf_forwards = "<a class=\"admin\" href=\"admin.php?action=banlist_ips&amp;p=".($_GET['p'] + 1).$sid."\" title=\"".$lang['page_forwards']."\">".$lang['page_forwards_symbol']."</a>";
				$sf_pagenumber = $_GET['p'];
				if ($pages_total >= 3 )
					{
					$sf_last = "<a class=\"admin\" href=\"admin.php?action=banlist_ips&amp;p=".$pages_total."\" title=\"".$lang['page_last']."\">".$lang['page_last_symbol']."</a>";
					}
				}

			if ($_GET['p'] > 1)
				{
				if (($pages_total >= 3) AND ($_GET['p'] > 2))
					{
					$sf_first = "<a class=\"admin\" href=\"admin.php?action=banlist_ips&amp;p=1".$sid."\" title=\"".$lang['page_first']."\">".$lang['page_first_symbol']."</a>";
					}
				$sf_backwards = "<a class=\"admin\" href=\"admin.php?action=banlist_ips&amp;p=".($_GET['p'] - 1).$sid."\" title=\"".$lang['page_backwards']."\">".$lang['page_backwards_symbol']."</a>";
				$sf_pagenumber = $_GET['p'];
				$sf_forwards = "<a class=\"admin\" href=\"admin.php?action=banlist_ips&amp;p=".($_GET['p'] + 1).$sid."\" title=\"".$lang['page_forwards']."\">".$lang['page_forwards_symbol']."</a>";
				if (($pages_total >= 3) AND ($_GET['p'] < ($pages_total - 1)))
					{
					 $sf_last = "&nbsp;<a class=\"admin\" href=\"admin.php?action=banlist_ips&amp;p=".$pages_total.$sid."\" title=\"".$lang['page_last']."\">".$lang['page_last_symbol']."</a>";
					}
				}

			if ($_GET['p'] == $pages_total)
				{
				if ($pages_total >= 3)
					{
					$sf_first = "<a class=\"admin\" href=\"admin.php?action=banlist_ips&amp;p=1".$sid."\" title=\"".$lang['page_first']."\">".$lang['page_first_symbol']."</a>";
					}
				$sf_backwards = "<a class=\"admin\" href=\"admin.php?action=banlist_ips&amp;p=".($_GET['p'] - 1).$sid."\" title=\"".$lang['page_backwards']."\">".$lang['page_backwards_symbol']."</a>";
				$sf_pagenumber = $_GET['p'];
				$sf_forwards = "";
				}

			if ($pages_total <= 0)
				{
				$content_scrolling_function = "<br><br>";
				}

			// load banlist entries
			$result = mgb_sql_connect("SELECT id, banned_ip, matches, timestamp FROM ".$db['prefix']."banlist_ips ORDER BY timestamp ASC LIMIT $load_start, $load_end", "Error while loading banned ip entries.", 1);

			$counter = 0;

			for($i = 0; $i < mysqli_num_rows($result); $i++)
				{
				$entry[$i] = mysqli_fetch_array($result);
				$counter++;
				}

			if ($counter <= 1)
				{
				if ($_GET['p'] == 1)
					{
					$add_page_nr = NULL;
					}
				else
					{
					$add_page_nr = "&amp;p=".($_GET['p'] - 1);
					}
				}
			else
				{
				$add_page_nr = "&amp;p=".$_GET['p'];
				}

			// fill entry template with content
			require ("../includes/functions.inc.php");

			if(!isset($entry)) { $entry = NULL; }

			for($i = 0; $i < count($entry); $i++)
				{
				$page_entry[$i] = $content_banlist_ips;

				if(!empty($entry[$i]['timestamp']))
					{
					$entry_timestamp = mgb_modern_timestamp($entry[$i]['timestamp'], $settings['language_path'], "adminpanel");
					}
				else
					{
					$entry_timestamp = "-";
					}

				// fill template with entry (strings)
				$page_entry[$i] = template("ENTRY_COUNTER", $entry[$i]['counter'], $page_entry[$i]);

				$page_entry[$i] = template("ENTRY_ID", $entry[$i]['id'], $page_entry[$i]);
				$page_entry[$i] = template("ENTRY_IP", $entry[$i]['banned_ip'], $page_entry[$i]);
				$page_entry[$i] = template("ENTRY_EMAIL", "", $page_entry[$i]);
				$page_entry[$i] = template("ENTRY_DOMAIN", "", $page_entry[$i]);
				$page_entry[$i] = template("ENTRY_MATCHES", $entry[$i]['matches'], $page_entry[$i]);
				$page_entry[$i] = template("ENTRY_TIMESTAMP", $entry_timestamp, $page_entry[$i]);
				$page_entry[$i] = template("DELETE", "<a href=\"admin.php?action=banlist_ips&amp;id=".$entry[$i]['id']."&amp;spam_action=delete".$add_page_nr.$sid."\" onClick=\"return confirm('".$entry[$i]['id'].", ".$entry[$i]['banned_ip'].":&nbsp;{LANG_CONFIRM_DELETE}'); submit();\"><img class=\"icon\" src=\"templates/default/images/delete.png\" title=\"".$lang['delete_entry']."\" alt=\"".$lang['delete_entry']."\"></a>", $page_entry[$i]);

				if(!isset($page_include)) { $page_include = NULL; }
				$page_include .= $page_entry[$i];
				}
			}
		else
			{
			$page_include = "<span class=\"admin\">".$lang['errormessage'][4]."</span>";
			$content_scrolling_function = "<br>";
			}
		}
?>