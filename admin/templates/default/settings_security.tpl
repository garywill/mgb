<form action="{URL_SETTINGS}" method="post">
<input type="hidden" name="sent_settings" value="1">
<center>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
<br>
<br>
<table class="settings" summary="settings" cellspacing="0" cellpadding="2">
	<tr>
		<td colspan="2" class="settings_overall">
		<center><span class="edit_caption">{LANG_EDIT_CAPTION_SECURITY}</span></center>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_DEBUG_MODE}</b></span><br>
		<span>{LANG_EDIT_EXPL_DEBUG_MODE}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="debug_mode" size="1">
			<option{SELECTED_DEBUG_MODE_0} value="0">{LANG_NO}</option>
			<option{SELECTED_DEBUG_MODE_1} value="1">{LANG_MIN}</option>
			<option{SELECTED_DEBUG_MODE_2} value="2">{LANG_MAX}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_SESSION_TIMEOUT}</b></span><br>
		<span>{LANG_EDIT_EXPL_SESSION_TIMEOUT}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="session_timeout" maxlength="4" size="4" value="{EDIT_SESSION_TIMEOUT}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_PASSWORD_MIN_LENGTH}</b></span><br>
		<span>{LANG_EDIT_EXPL_PASSWORD_MIN_LENGTH}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="password_min_length" maxlength="2" size="2" value="{EDIT_PASSWORD_MIN_LENGTH}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_MODERATED}</b></span><br>
		<span>{LANG_EDIT_EXPL_MODERATED}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="moderated" size="1">
			<option{SELECTED_MODERATED_0} value="0">{LANG_NO}</option>
			<option{SELECTED_MODERATED_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_REQUIRE_EMAIL}</b></span><br>
		<span>{LANG_EDIT_EXPL_REQUIRE_EMAIL}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="require_email" size="1">
			<option{SELECTED_REQUIRE_EMAIL_0} value="0">{LANG_NO}</option>
			<option{SELECTED_REQUIRE_EMAIL_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
</table>
<br>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
<br>
<br>
<table class="settings" summary="settings" cellspacing="0" cellpadding="2">
	<tr>
		<td colspan="2" class="settings_overall">
		<center><span class="edit_caption">{LANG_EDIT_CAPTION_ANTISPAM}</span></center>
		</td>
	</tr>
	<!--
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_SPAM_PROTECTION}</b></span><br>
		<span>{LANG_EDIT_EXPL_SPAM_PROTECTION}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="spam_protection" size="1">
			<option{SELECTED_SPAM_PROTECTION_0} value="0">{LANG_NO}</option>
			<option{SELECTED_SPAM_PROTECTION_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	-->
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_BANLIST_IPS}</b></span><br>
		<span>{LANG_EDIT_EXPL_BANLIST_IPS}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="banlist_ips" size="1">
			<option{SELECTED_BANLIST_IPS_0} value="0">{LANG_NO}</option>
			<option{SELECTED_BANLIST_IPS_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_BANLIST_EMAILS}</b></span><br>
		<span>{LANG_EDIT_EXPL_BANLIST_EMAILS}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="banlist_emails" size="1">
			<option{SELECTED_BANLIST_EMAILS_0} value="0">{LANG_NO}</option>
			<option{SELECTED_BANLIST_EMAILS_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_BANLIST_DOMAINS}</b></span><br>
		<span>{LANG_EDIT_EXPL_BANLIST_DOMAINS}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="banlist_domains" size="1">
			<option{SELECTED_BANLIST_DOMAINS_0} value="0">{LANG_NO}</option>
			<option{SELECTED_BANLIST_DOMAINS_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_BANLIST_LOG}</b></span><br>
		<span>{LANG_EDIT_EXPL_BANLIST_LOG}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="banlist_log" size="1">
			<option{SELECTED_BANLIST_LOG_0} value="0">{LANG_NO}</option>
			<option{SELECTED_BANLIST_LOG_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_BLOCKTIME}</b></span><br>
		<span>{LANG_EDIT_EXPL_BLOCKTIME}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="blocktime" size="1">
			<option{SELECTED_BLOCKTIME_0} value="9999999">{LANG_FOREVER}</option>
			<option{SELECTED_BLOCKTIME_1} value="6480000">{LANG_ONE_MONTH}</option>
			<option{SELECTED_BLOCKTIME_2} value="216000">{LANG_ONE_DAY}</option>
			<option{SELECTED_BLOCKTIME_3} value="3600">{LANG_ONE_HOUR}</option>
			<option{SELECTED_BLOCKTIME_4} value="60">{LANG_ONE_MINUTE}</option>
			<option{SELECTED_BLOCKTIME_5} value="0">{LANG_NEVER}</option>
		</select>
		</td>
	</tr>
</table>
<br>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
<br>
<br>
<table class="settings" summary="settings" cellspacing="0" cellpadding="2">
	<tr>
		<td colspan="2" class="settings_overall">
		<center><span class="edit_caption">{LANG_EDIT_CAPTION_CAPTCHA}</span></center>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_CAPTCHA}</b></span><br>
		<span>{LANG_EDIT_EXPL_CAPTCHA}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="captcha" size="1">
			<option{SELECTED_CAPTCHA_0} value="0">{LANG_NO}</option>
			<option{SELECTED_CAPTCHA_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_CAPTCHA_METHOD}</b></span><br>
		<span>{LANG_EDIT_EXPL_CAPTCHA_METHOD}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="captcha_method" size="1">
			<option{SELECTED_CAPTCHA_METHOD_0} value="0">{LANG_CAPTCHA_METHOD_CODE}</option>
			<option{SELECTED_CAPTCHA_METHOD_1} value="1">{LANG_CAPTCHA_METHOD_MATH}</option>
			<option{SELECTED_CAPTCHA_METHOD_2} value="2">{LANG_CAPTCHA_METHOD_RECAPTCHA}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_CAPTCHA_LENGTH}</b></span><br>
		<span>{LANG_EDIT_EXPL_CAPTCHA_LENGTH}</span>
		</td>
		<td class="settings_r">
		<span>{LANG_MIN}&nbsp;</span><input class="textbox_nr_short" name="captcha_length" maxlength="1" size="6" value="{EDIT_CAPTCHA_LENGTH}"><br><br>
		<span>{LANG_MAX}&nbsp;</span><input class="textbox_nr_short" name="captcha_max_length" maxlength="1" size="6" value="{EDIT_CAPTCHA_MAX_LENGTH}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_CAPTCHA_SALT}</b></span><br>
		<span>{LANG_EDIT_EXPL_CAPTCHA_SALT}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="captcha_salt" maxlength="12" size="6" value="{EDIT_CAPTCHA_SALT}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_CAPTCHA_HASH_METHOD}</b></span><br>
		<span>{LANG_EDIT_EXPL_CAPTCHA_HASH_METHOD}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="captcha_hash_method" size="1">
			<option{SELECTED_CAPTCHA_HASH_METHOD_0} value="md2">md2 (32-Bit)</option>
			<option{SELECTED_CAPTCHA_HASH_METHOD_1} value="md4">md4 (32-Bit)</option>
			<option{SELECTED_CAPTCHA_HASH_METHOD_2} value="md5">md5 (32-Bit)</option>
			<option{SELECTED_CAPTCHA_HASH_METHOD_3} value="sha1">sha1 (40-Bit)</option>
			<option{SELECTED_CAPTCHA_HASH_METHOD_4} value="sha256">sha256 (64-Bit)</option>
			<option{SELECTED_CAPTCHA_HASH_METHOD_5} value="sha384">sha384 (96-Bit)</option>
			<option{SELECTED_CAPTCHA_HASH_METHOD_6} value="sha512">sha512 (128-Bit)</option>
			<option{SELECTED_CAPTCHA_HASH_METHOD_7} value="whirlpool">whirlpool (128-Bit)</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_CAPTCHA_DOUBLE_HASH}</b></span><br>
		<span>{LANG_EDIT_EXPL_CAPTCHA_DOUBLE_HASH}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="captcha_double_hash" size="1">
			<option{SELECTED_CAPTCHA_DOUBLE_HASH_0} value="0">{LANG_NO}</option>
			<option{SELECTED_CAPTCHA_DOUBLE_HASH_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_CAPTCHA_COORDS}</b></span><br>
		<span>{LANG_EDIT_EXPL_CAPTCHA_COORDS}</span>
		</td>
		<td class="settings_r">
		<span>X&nbsp;</span><input class="textbox_nr_short" name="captcha_coords_x" maxlength="3" size="3" value="{EDIT_CAPTCHA_COORDS_X}">&nbsp;&nbsp;
		<span>Y&nbsp;</span><input class="textbox_nr_short" name="captcha_coords_y" maxlength="3" size="3" value="{EDIT_CAPTCHA_COORDS_Y}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_CAPTCHA_COLOR}</b></span><br>
		<span>{LANG_EDIT_EXPL_CAPTCHA_COLOR}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="captcha_color" maxlength="6" size="6" value="{EDIT_CAPTCHA_COLOR}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_CAPTCHA_ANGLE}</b></span><br>
		<span>{LANG_EDIT_EXPL_CAPTCHA_ANGLE}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr_short" name="captcha_angle_1" maxlength="4" size="4" value="{EDIT_CAPTCHA_ANGLE_1}">&nbsp;
		<input class="textbox_nr_short" name="captcha_angle_2" maxlength="4" size="4" value="{EDIT_CAPTCHA_ANGLE_2}">
		</td>
	</tr>
	<tr>
		<td colspan="2" class="settings_overall">
		<center><span class="edit_caption">{LANG_EDIT_CAPTION_RECAPTCHA}</span></center>
		</td>
	</tr>
   <tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_RECAPTCHA_PUB_KEY}</b></span><br>
		<span>{LANG_EDIT_EXPL_RECAPTCHA_PUB_KEY}</span>
		</td>
		<td class="settings_r">
		<input class="textbox" name="recaptcha_pub_key" maxlength="255" size="12" value="{EDIT_RECAPTCHA_PUB_KEY}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_RECAPTCHA_PRIVATE_KEY}</b></span><br>
		<span>{LANG_EDIT_EXPL_RECAPTCHA_PRIVATE_KEY}</span>
		</td>
		<td class="settings_r">
		<input class="textbox" name="recaptcha_private_key" maxlength="255" size="12" value="{EDIT_RECAPTCHA_PRIVATE_KEY}">
		</td>
	</tr>
   	<!-- <tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_RECAPTCHA_STYLE}</b></span><br>
		<span>{LANG_EDIT_EXPL_RECAPTCHA_STYLE}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="recaptcha_style" size="1">
			<option{SELECTED_RECAPTCHA_STYLE_0} value="red">{LANG_RECAPTCHA_STYLE_0}</option>
			<option{SELECTED_RECAPTCHA_STYLE_1} value="white">{LANG_RECAPTCHA_STYLE_1}</option>
			<option{SELECTED_RECAPTCHA_STYLE_2} value="blackglass">{LANG_RECAPTCHA_STYLE_2}</option>
			<option{SELECTED_RECAPTCHA_STYLE_3} value="clean">{LANG_RECAPTCHA_STYLE_3}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_WRONG_CAPTCHA_COUNT}</b></span><br>
		<span>{LANG_EDIT_EXPL_WRONG_CAPTCHA_COUNT}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="wrong_captcha_count" maxlength="2" size="6" value="{EDIT_WRONG_CAPTCHA_COUNT}">
		</td>
	</tr>
	-->
</table>
<br>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
<br>
<br>
<table class="settings" summary="settings" cellspacing="0" cellpadding="2">
	<tr>
		<td colspan="2" class="settings_overall">
		<center><span class="edit_caption">{LANG_EDIT_CAPTION_DYNAMIC_FIELDNAMES}</span></center>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_DYNAMIC_FIELDNAMES}</b></span><br>
		<span>{LANG_EDIT_EXPL_DYNAMIC_FIELDNAMES}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="dynamic_fieldnames" size="1">
			<option{SELECTED_DYNAMIC_FIELDNAMES_0} value="0">{LANG_NO}</option>
			<option{SELECTED_DYNAMIC_FIELDNAMES_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_DYNAMIC_FIELDNAMES_METHOD}</b></span><br>
		<span>{LANG_EDIT_EXPL_DYNAMIC_FIELDNAMES_METHOD}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="dynamic_fieldnames_method" size="1">
			<option{SELECTED_DYNAMIC_FIELDNAMES_METHOD_0} value="0">mt_rand()</option>
			<option{SELECTED_DYNAMIC_FIELDNAMES_METHOD_1} value="1">generate_key_and_pw()</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_DYNAMIC_FIELDNAMES_LENGTH}</b></span><br>
		<span>{LANG_EDIT_EXPL_DYNAMIC_FIELDNAMES_LENGTH}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="dynamic_fieldnames_length" maxlength="3" size="50" value="{EDIT_DYNAMIC_FIELDNAMES_LENGTH}">
		</td>
	</tr>
</table>
<br>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
<br>
<br>
<table class="settings" summary="settings" cellspacing="0" cellpadding="2">
	<tr>
		<td colspan="2" class="settings_overall">
		<center><span class="edit_caption">{LANG_EDIT_CAPTION_AKISMET}</span></center>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_AKISMET_PLUGIN}</b></span><br>
		<span>{LANG_EDIT_EXPL_AKISMET_PLUGIN}<br><br>{EDIT_AKISMET_CHECK_IMAGE}{LANG_EDIT_EXPL_AKISMET_CHECK}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="akismet_plugin" size="1">
			<option{SELECTED_AKISMET_PLUGIN_0} value="0">{LANG_NO}</option>
			<option{SELECTED_AKISMET_PLUGIN_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_AKISMET_API}</b></span><br>
		<span>{LANG_EDIT_EXPL_AKISMET_API}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="akismet_api" maxlength="50" size="50" value="{EDIT_AKISMET_API}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_AKISMET_MARK_AS_SPAM}</b></span><br>
		<span>{LANG_EDIT_EXPL_AKISMET_MARK_AS_SPAM}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="akismet_mark_as_spam" size="1">
			<option{SELECTED_AKISMET_MARK_AS_SPAM_0} value="0">{LANG_NO}</option>
			<option{SELECTED_AKISMET_MARK_AS_SPAM_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
</table>
<br>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
<br>
<br>
<table class="settings" summary="settings" cellspacing="0" cellpadding="2">
	<tr>
		<td colspan="2" class="settings_overall">
		<center><span class="edit_caption">{LANG_EDIT_CAPTION_TIME_LOCK}</span></center>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_TIME_LOCK}</b></span><br>
		<span>{LANG_EDIT_EXPL_TIME_LOCK}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="time_lock" size="1">
			<option{SELECTED_TIME_LOCK_0} value="0">{LANG_NO}</option>
			<option{SELECTED_TIME_LOCK_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_TIME_LOCK_VALUE}</b></span><br>
		<span>{LANG_EDIT_EXPL_TIME_LOCK_VALUE}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="time_lock_value" maxlength="3" size="50" value="{EDIT_TIME_LOCK_VALUE}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_TIME_LOCK_MAXTIME}</b></span><br>
		<span>{LANG_EDIT_EXPL_TIME_LOCK_MAXTIME}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="time_lock_maxtime" maxlength="11" size="50" value="{EDIT_TIME_LOCK_MAXTIME}">
		</td>
	</tr>
	<!-- <tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_TIME_LOCK_SPAM_COUNT}</b></span><br>
		<span>{LANG_EDIT_EXPL_TIME_LOCK_SPAM_COUNT}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="time_lock_spam_count" maxlength="2" size="50" value="{EDIT_TIME_LOCK_SPAM_COUNT}">
		</td>
	</tr> -->
</table>
<br>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
<br>
<br>
<table class="settings" summary="settings" cellspacing="0" cellpadding="2">
	<tr>
		<td colspan="2" class="settings_overall">
		<center><span class="edit_caption">{LANG_EDIT_CAPTION_KEYSTROKE}</span></center>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_KEYSTROKE}</b></span><br>
		<span>{LANG_EDIT_EXPL_KEYSTROKE}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="keystroke" size="1">
			<option{SELECTED_KEYSTROKE_0} value="0">{LANG_NO}</option>
			<option{SELECTED_KEYSTROKE_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_KEYSTROKE_MAX_CPS}</b></span><br>
		<span>{LANG_EDIT_EXPL_KEYSTROKE_MAX_CPS}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="keystroke_max_cps" maxlength="2" size="50" value="{EDIT_KEYSTROKE_MAX_CPS}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_KEYSTROKE_BAN_TIME}</b></span><br>
		<span>{LANG_EDIT_EXPL_KEYSTROKE_BAN_TIME}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="keystroke_ban_time" maxlength="6" size="50" value="{EDIT_KEYSTROKE_BAN_TIME}">
		</td>
	</tr>
	<!-- <tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_TIME_LOCK_SPAM_COUNT}</b></span><br>
		<span>{LANG_EDIT_EXPL_TIME_LOCK_SPAM_COUNT}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="time_lock_spam_count" maxlength="2" size="50" value="{EDIT_TIME_LOCK_SPAM_COUNT}">
		</td>
	</tr> -->
</table>
<br>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
</center>
</form>