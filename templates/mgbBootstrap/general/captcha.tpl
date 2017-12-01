							<div class="captcha text-center">
								<img src="includes/captcha.inc.php?{CAPTCHA_UNIQUE_ID}" title="{LANG_SECURITY_CODE}" alt="{LANG_SECURITY_CODE}"><br><br>
								<input class="span2" type="text" name="{FORM_ELEMENT_CAPTCHA}" value="" autocomplete="off">
								<input type="image" src='images/iconsets/{ICONSET_PATH}/refresh.png' alt='{LANG_CAPTCHA_REFRESH}' title='{LANG_CAPTCHA_REFRESH}'>
							</div>
							<input type="hidden" name="refresh_captcha" value="1">