<div class="loginholder">
	<div class="login">
		<form method="post" action="http://ramity.com/function/login" class="loginform">
			<input type="text" class="logintext" placeholder="Username" name="L_u">
			<input type="password" class="logintext2" placeholder="Password" name="L_p">
			<input type="submit" class="loginsubmit" value="Login" name="L_sub">
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