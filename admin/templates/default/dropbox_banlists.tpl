<form action="admin.php?action={ACTION_BANLISTS}&amp;option=dropbox{PAGE_NR}{SID}" method="post">
<table class="dropbox" summary="dropbox" cellspacing="0" cellpadding="0">
	<tr>
		<td class="dropbox_l">
		<select class="option_very_long" name="dropbox" size="1">
		<option value="0">{LANG_DO_NOTHING}</option>
		<option value="1">{LANG_DELETE_ALL_ENTRIES}</option>
		{OPTION_PUT_ALL_IPS_ON_BANLIST}
		{OPTION_PUT_ALL_EMAILS_ON_BANLIST}
		{OPTION_PUT_ALL_DOMAINS_ON_BANLIST}
		{OPTION_PUT_ALL_ON_BANLISTS_AND_DELETE_EVERYTHING}
		{OPTION_SHOW_BANNED_BY_IP_ONLY}
		{OPTION_SHOW_BANNED_BY_EMAIL_ONLY}
		{OPTION_SHOW_BANNED_BY_DOMAIN_ONLY}
		{OPTION_SHOW_BANNED_BY_KEYSTROKE_ONLY}
		{OPTION_SHOW_BANNED_BY_CAPTCHA_ONLY}
		</select>
		</td>
		<td class="dropbox_r">
		<input type="submit" class="button" name="{LANG_GO}" value="{LANG_GO}" onClick="return confirm('{LANG_CONFIRM_GENERAL}'); submit();">
		</td>
	</tr>
</table>
</form>
<br>