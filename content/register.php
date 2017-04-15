<div class="registerholder">
	<div class="register">
		<form method="post" action="http://ramity.com/function/register" class="registerform">
			<input type="text" class="registertext" placeholder="Username" name="R_u" max-length="20">
			<input type="email" class="registertext2" placeholder="Email" name="R_e" max-length="254">
			<input type="password" class="registertext2" placeholder="Password" name="R_p" max-length="20">
			<input type="submit" class="registersubmit" value="Register" name="R_sub">
			<?php
			if(isset($e_message))
			{
				echo '
				<div class="errormessagebreak"></div>
				<div class="errormessage">'.$e_message.'</div>';
			}
			?>
		</form>
	</div>
</div>