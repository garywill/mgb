				<div class="bbcodes">
					<div class="btn-toolbar">
						<div class="btn-group">
							<button class="btn btn-small" title="{LANG_BBCODE_HELP_BOLD}" onClick="insert('[b]', '[/b]')"><i class="icon-bold"></i></button>
							<button class="btn btn-small" title="{LANG_BBCODE_HELP_ITALIC}" onClick="insert('[i]', '[/i]')"><i class="icon-italic"></i></button>
							<button class="btn btn-small" title="{LANG_BBCODE_HELP_QUOTE}" onClick="insert('[quote]', '[/quote]')"><i class="icon-quote-left"></i></button>
						</div>
						<div class="btn-group">
							<button class="btn btn-small" title="{LANG_BBCODE_HELP_URL}" onClick="insert('[url]', '[/url]')"><i class="icon-link"></i></button>
{TEMPLATE_BBCODE_IMG}
{TEMPLATE_BBCODE_FLASH}
						</div>
					</div>
						<div class="selects">
							<select class="span2" name="textsize" onchange="insert('[size=' + this.form.textsize.options[this.form.textsize.selectedIndex].value + ']','[/size]','message');this.selectedIndex=0">
								<option value="">{LANG_BBCODE_TEXTSIZE}</option>
								<option value="8">{LANG_BBCODE_EXTRASMALL}</option>
								<option value="10">{LANG_BBCODE_SMALL}</option>
								<option value="12">{LANG_BBCODE_DEFAULT}</option>
								<option value="16">{LANG_BBCODE_BIG}</option>
								<option value="24">{LANG_BBCODE_EXTRABIG}</option>
							</select>
							<select class="span2" name="textcolor" onchange="insert('[color=' + this.form.textcolor.options[this.form.textcolor.selectedIndex].value + ']','[/color]','message');this.selectedIndex=0">
								<option value="">{LANG_BBCODE_TEXTCOLOR}</option>
								<option value="#800000" style="color: #800000;">Maroon</option>
								<option value="#B22222" style="color: #B22222;">Firebrick</option>
								<option value="#FF0000" style="color: #FF0000;">Red</option>
								<option value="#FFA07A" style="color: #FFA07A;">Lightsalmon</option>
								<option value="#C71585" style="color: #C71585;">Mediumvioletred</option>
								<option value="#FF00FF" style="color: #FF00FF;">Fuchsia</option>
								<option value="#FFC0CB" style="color: #FFC0CB;">Pink</option>
								<option value="#9400D3" style="color: #9400D3;">Darkviolet</option>
								<option value="#000080" style="color: #000080;">Navy</option>
								<option value="#0000FF" style="color: #0000FF;">Blue</option>
								<option value="#87CEEB" style="color: #87CEEB;">Skyblue</option>
								<option value="#00FFFF" style="color: #00FFFF;">Aqua</option>
								<option value="#008000" style="color: #008000;">Green</option>
								<option value="#00FF00" style="color: #00FF00;">Lime</option>
								<option value="#FFFF00" style="color: #FFFF00;">Yellow</option>
								<option value="#FFA500" style="color: #FFA500;">Orange</option>
								<option value="#8B4513" style="color: #8B4513;">Saddlebrown</option>
								<option value="#D2B48C" style="color: #D2B48C;">Tan</option>
								<option value="#E6E6FA" style="color: #E6E6FA;">Lavender</option>
								<option value="#FFFFFF" style="color: #FFFFFF;">White</option>
								<option value="#C0C0C0" style="color: #C0C0C0;">Silver</option>
								<option value="#808080" style="color: #808080;">Gray</option>
								<option value="#000000" style="color: #000000;">Black</option>
							</select>
						</div>
				</div>