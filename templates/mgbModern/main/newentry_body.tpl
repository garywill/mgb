{HEADER}
<br>
<table class="border_newentry" summary="border_newentry">
	<tr>
		<td class="border_newentry_title">
		<center>
		<div class="gap">
		<span class="title">{TITLE}</span></div>
		</center>
		</td>
	</tr>
	<tr>
		<td class="border_newentry_entry">
		<center>
		{TEMPLATE_PREVIEW}
		{TEMPLATE_ERRORMESSAGE}
		<form name="formular" id="formular" action="{FORM_ACTION}" method="post">
		<input type="hidden" name="sent" value="1">
		<table summary="newentry" class="signin" cellspacing="0" cellpadding="0">
			<tr>
				<td class="signin_l" align="left">
				<span>{LANG_NEW_ENTRY_NAME}</span>
				</td>
				<td class="signin_m" align="center">
				<input class="main_textbox" type="text" name="{FORM_ELEMENT_NAME}" size="30" value="{POST_NAME}">
				</td>
				<td class="signin_r" align="center">
				<span>*</span>
				</td>
			</tr>
			<tr>
				<td class="signin_l" align="left">
				<span>{LANG_NEW_ENTRY_CITY}</span>
				</td>
				<td class="signin_m" align="center">
				<input class="main_textbox" type="text" name="{FORM_ELEMENT_CITY}" size="30" value="{POST_CITY}">
				</td>
				<td class="signin_r" align="center">
				<span>&nbsp;</span>
				</td>
			</tr>
			<tr>
				<td class="signin_l" align="left">
				<span>{LANG_NEW_ENTRY_EMAIL}</span>
				</td>
				<td class="signin_m" align="center">
				<input class="main_textbox" type="text" name="{FORM_ELEMENT_EMAIL}" size="30" value="{POST_EMAIL}">
				</td>
				<td class="signin_r" align="center">
				<span>{EMAIL_NECESSARY}</span>
				</td>
			</tr>
			<tr>
				<td class="signin_l" align="left">
				<span>{LANG_NEW_ENTRY_ICQ}</span>
				</td>
				<td class="signin_m" align="center">
				<input class="main_textbox" type="text" name="{FORM_ELEMENT_ICQ}" size="30" value="{POST_ICQ}">
				</td>
				<td class="signin_r" align="center">
				<span>&nbsp;</span>
				</td>
			</tr>
			<tr>
				<td class="signin_l" align="left">
				<span>{LANG_NEW_ENTRY_AIM}</span>
				</td>
				<td class="signin_m" align="center">
				<input class="main_textbox" type="text" name="{FORM_ELEMENT_AIM}" size="30" value="{POST_AIM}">
				</td>
				<td class="signin_r" align="center">
				<span>&nbsp;</span>
				</td>
			</tr>
			<tr>
				<td class="signin_l" align="left">
				<span>{LANG_NEW_ENTRY_FB}</span>
				</td>
				<td class="signin_m" align="center">
				<input class="main_textbox" type="text" name="{FORM_ELEMENT_FB}" size="30" value="{POST_FB}">
				</td>
				<td class="signin_r" align="center">
				<span>&nbsp;</span>
				</td>
			</tr>
			<tr>
				<td class="signin_l" align="left">
				<span>{LANG_NEW_ENTRY_TWITTER}</span>
				</td>
				<td class="signin_m" align="center">
				<input class="main_textbox" type="text" name="{FORM_ELEMENT_TWITTER}" size="30" value="{POST_TWITTER}">
				</td>
				<td class="signin_r" align="center">
				<span>&nbsp;</span>
				</td>
			</tr>
			<!-- <tr>
				<td class="signin_l" align="left">
				<span>{LANG_NEW_ENTRY_MSN}</span>
				</td>
				<td class="signin_m" align="center">
				<input class="main_textbox" type="text" name="{FORM_ELEMENT_MSN}" size="30" value="{POST_MSN}">
				</td>
				<td class="signin_r" align="center">
				<span>&nbsp;</span>
				</td>
			</tr> -->
			<tr>
				<td class="signin_l" align="left">
				<span>{LANG_NEW_ENTRY_HP}</span>
				</td>
				<td class="signin_m" align="center">
				<input class="main_textbox" type="text" name="{FORM_ELEMENT_HP}" size="30" value="{POST_HP}">
				</td>
				<td class="signin_r" align="center">
				<span>&nbsp;</span>
				</td>
			</tr>
			<tr>
				<td class="signin_l" align="left">
				<span>{LANG_NEW_ENTRY_MESSAGE}</span>
				</td>
				<td class="signin_m" align="center">
				<textarea name="message" rows="5" cols="25">{POST_MESSAGE}</textarea>
				</td>
				<td class="signin_r" align="center">
				<span>*</span>
				</td>
			</tr>
			<tr>
				<td class="signin_overall" colspan="3" align="center">
				<div class="gap">
				<span>{LANG_NECESSARY_FIELDS}</span></div>
				</td>
			</tr>
			{TEMPLATE_SMILEYS}
			{TEMPLATE_BBCODES}
			{TEMPLATE_USER_NOTIFICATION}
			{TEMPLATE_USER_SHOW_EMAIL}
			{TEMPLATE_USER_ACCEPT_AKISMET_SERVICE}
			</table>
			{TEMPLATE_CAPTCHA}
			<div class="gap">
			<input class="main_button" type="submit" name="preview" value="{LANG_PREVIEW}">&nbsp;<input class="main_button" type="submit" name="send" value="{LANG_SEND}"></div>
			</form>
			</center>
			</td>
		</tr>
</table>
<br>
<span><a href="index.php{PARAMLANG_A}" title="{LANG_BACK}">{LANG_BACK_TO_MAINPAGE}</a></span>
<br>
<br>
<span class="copyright">-- <a href="admin/admin.php" target="_blank" title="{LANG_ADMINPANEL_DESCR}">{LANG_ADMINPANEL}</a> --</span><br>
{TEMPLATE_COPYRIGHT}
{TEMPLATE_FOOTER}