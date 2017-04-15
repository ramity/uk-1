<div class="validateholder">
	<div class="validate">
		<form method="post" action="http://ramity.com/function/validate" class="validateform">
			<input type="email" class="validatetext" placeholder="Email" name="V_e">
			<input type="text" class="validatetext2" placeholder="Code" name="V_c">
			<input type="submit" class="validatesubmit" value="Validate" name="V_sub">
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