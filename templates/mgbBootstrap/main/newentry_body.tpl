{HEADER}
		<div class="container container-main">
			<div class="span6">
				<header>
					<h3>{TITLE}</h3>
				</header>
				<div class="text-center">
					<ul class="inline">
						<li><a href="index.php{PARAMLANG_A}" title="{LANG_BACK}"><i class="icon-home"></i> {LANG_BACK_TO_MAINPAGE}</a><li>
					</ul>
					<hr>
				</div>
		{TEMPLATE_PREVIEW}
		{TEMPLATE_ERRORMESSAGE}
				<div>
					<form class="form-horizontal" name="formular" action="{FORM_ACTION}" method="post">
						<input type="hidden" name="sent" value="1">
						<div class="control-group">
							<label class="control-label" for="inputName">{LANG_NEW_ENTRY_NAME} *</label>
							<div class="controls">
								<input id="inputName" type="text" name="{FORM_ELEMENT_NAME}" value="{POST_NAME}" required="required" autofocus="autofocus">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputCity">{LANG_NEW_ENTRY_CITY} </label>
							<div class="controls">
								<input id="inputCity" type="text" name="{FORM_ELEMENT_CITY}" value="{POST_CITY}">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputEmail">{LANG_NEW_ENTRY_EMAIL} {EMAIL_NECESSARY}</label>
							<div class="controls">
								<input id="inputEmail" type="email" name="{FORM_ELEMENT_EMAIL}" value="{POST_EMAIL}"{EMAIL_REQUIRED}>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputIcq">{LANG_NEW_ENTRY_ICQ}</label>
							<div class="controls">
								<input id="inputIcq" type="text" name="{FORM_ELEMENT_ICQ}" value="{POST_ICQ}">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputAim">{LANG_NEW_ENTRY_AIM}</label>
							<div class="controls">
								<input id="inputAim" type="text" name="{FORM_ELEMENT_AIM}" value="{POST_AIM}">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputFb">{LANG_NEW_ENTRY_FB}</label>
							<div class="controls">
								<input id="inputFb" type="text" name="{FORM_ELEMENT_FB}" value="{POST_FB}">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputTwitter">{LANG_NEW_ENTRY_TWITTER}</label>
							<div class="controls">
								<input id="inputTwitter" type="text" name="{FORM_ELEMENT_TWITTER}" value="{POST_TWITTER}">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputHp">{LANG_NEW_ENTRY_HP}</label>
							<div class="controls">
								<input id="inputHp" type="url" name="{FORM_ELEMENT_HP}" value="{POST_HP}">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputText">{LANG_NEW_ENTRY_MESSAGE} *</label>
							<div class="controls">
{TEMPLATE_BBCODES}
								<textarea id="inputText" class="span4" name="message" rows="10" style="resize:vertical" required="required">{POST_MESSAGE}</textarea>
{TEMPLATE_SMILEYS}
							</div>
						</div>
						<p class="text-info">{LANG_NECESSARY_FIELDS}</p>
{TEMPLATE_USER_NOTIFICATION}
{TEMPLATE_USER_SHOW_EMAIL}
{TEMPLATE_USER_ACCEPT_AKISMET_SERVICE}
{TEMPLATE_CAPTCHA}
						<div class="form-actions">
							<input class="btn btn-primary" type="submit" name="preview" value="{LANG_PREVIEW}">
							<input class="btn btn-primary" type="submit" name="send" value="{LANG_SEND}">
							<input type="reset" class="btn">
						</div>
					</form>
					<hr>
				</div>
{TEMPLATE_COPYRIGHT}
{TEMPLATE_FOOTER}

