{HEADER}
		<div class="container container-main">
			<div class="span6">
				<header>
					<h3>{TITLE}</h3>
				</header>
				<div class="announcement">
				{TEMPLATE_ANNOUNCEMENT_MESSAGE}
				</div>
				<div class="text-center">
					<ul class="inline">
						<li><a href="newentry.php{PARAMLANG_A}" title="{LANG_NEW_ENTRY_DESCR}"><i class="icon-pencil"></i> {LANG_NEW_ENTRY}</a><li>
						<li><a href="email.php?id=admin{PARAMLANG_B}" title="{LANG_CONTACT_DESCR}"><i class="icon-envelope"></i> {LANG_CONTACT}</a></li>
					</ul>
					<p>{LANG_HOW_MANY_ENTRIES}</p>
					<hr>
				</div>
				<div>
					{TEMPLATE_SCROLLING_FUNCTION}
					<div class="entrys">
					{TEMPLATE_ENTRIES}
					</div>
					{TEMPLATE_SCROLLING_FUNCTION}
					<hr>
				</div>
{TEMPLATE_COPYRIGHT}
{TEMPLATE_FOOTER}