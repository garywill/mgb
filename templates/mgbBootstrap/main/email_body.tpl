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
{TEMPLATE_ERRORMESSAGE}
					<form class="form-horizontal" action="{FORM_ACTION}" method="post">
						<input type="hidden" name="sent" value="1">
						 <div class="control-group">
							<label class="control-label" for="inputName">{LANG_EMAIL_NAME} *</label>
							<div class="controls">
								<input type="text" id="inputName" name="{FORM_ELEMENT_NAME}" value="{POST_NAME}" placeholder="Max Muster" required="required" autofocus="autofocus">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputEmail">{LANG_EMAIL_EMAIL} *</label>
							<div class="controls">
								<input type="email" id="inputEmail" name="{FORM_ELEMENT_EMAIL}" value="{POST_EMAIL}" placeholder="max@muster.com" required="required">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputText">{LANG_EMAIL_MESSAGE} *</label>
							<div class="controls">
								<textarea id="inputText" class="span4" name="{FORM_ELEMENT_MESSAGE}" rows="10" style="resize:vertical" required="required">{POST_MESSAGE}</textarea>
							</div>
						</div>
							<p class="text-info">{LANG_NECESSARY_FIELDS}</p>
							<p>{LANG_EMAIL_SENT_TO}&nbsp;<strong>{EMAIL_RECEIVER}</strong></p>
							<div class="control-group">
								<label class="checkbox">{LANG_EMAIL_SENDCOPYTOME}
									<input type="checkbox" name="user_sendcopytome" value="1"{CHECKED}>
								</label>
							</div>
{TEMPLATE_USER_ACCEPT_AKISMET_SERVICE}
{TEMPLATE_CAPTCHA}
						<div class="form-actions">
							<input class="btn btn-primary" type="submit" name="send_mail_button" value="{LANG_SEND}"/>
							<input type="reset" class="btn"/>
						</div>
					</form>
					<hr>
{TEMPLATE_COPYRIGHT}
{TEMPLATE_FOOTER}