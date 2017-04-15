<div class="settingsholder">
	<div class="settingssidebar">
		<div class="settingssidebaritem activetab">General</div>
		<div class="settingssidebaritem">Security</div>
		<div class="settingssidebarbreak"></div>
		<div class="settingssidebaritem">Privacy</div>
		<div class="settingssidebaritem">Feed</div>
		<div class="settingssidebaritem">Blocking</div>
		<div class="settingssidebarbreak"></div>
		<div class="settingssidebaritem">Notifications</div>
		<div class="settingssidebaritem">Peasants</div>
		<div class="settingssidebarbreak"></div>
		<div class="settingssidebaritem">Donate</div>
	</div>
	<div class="settingscontent">
		<div class="settingscontentform">
			<div class="settingscontentformheading">General</div>
			<form class="settings" action="http://ramity.com/function/settings" method="post">
				<div class="changeusernametext">Change Username</div>
				<input type="text" class="changeusernametext" placeholder="Username">
				<input type="password" class="changeusernametext" placeholder="Password">
				<input type="submit"class="changeusernamesubmit" value="Change">
				<?php
				if(isset($e_message))
				{
					echo '
					<div class="errormessagebreak"></div>
					<div class="errormessage">'.$e_message.'</div>';
				}
				?>
			</form>
			<form class="settings" action="http://ramity.com/function/settings" method="post" enctype="multipart/form-data">
				<div class="changeusernametext">Change Image</div>
				<input type="file" name="file" id="file">
				<input type="submit" class="changeusernamesubmit" value="Change">
				<?php
				if(isset($e_message2))
				{
					echo '
					<div class="errormessagebreak"></div>
					<div class="errormessage">'.$e_message2.'</div>';
				}
				?>
			</form>
		</div>
	</div>
</div>