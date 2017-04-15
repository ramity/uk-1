<?php
if($secure_login_status==true){//SAFE AND CHECKED DATA
	echo '
	<div class="topbar">
		<div class="topbarinr">
			<a id="small-item" href="">R</a>
			<form method="post" id="searchbox" action="/search">
				<input id="search" type="text" placeholder="...In development...">
				<input id="searchsubmit" type="submit" value="search">
			</form>
			<div id="item-drop">+
				<div id="item-list" data-status="closed">
					<div id="list-break"></div>
					<div id="list-inner">
						<div id="top-list-item">
							<img src="'.$userData[0]['imageUrl'].'">
							<div>
								<a style="color:#000;">'.$secure_username.'</a>
								<a>Edit</a>
							</div>
						</div>
						<div class="list-item">
							<a href="/function/report" class="list-button">report</a>
						</div>
						<div class="list-item">
							<a href="/function/settings" class="list-button">settings</a>
						</div>
						<div class="list-item">
							<a href="/function/logout" class="list-button">logout</a>
						</div>
					</div>
				</div>
			</div>
			<a id="item" href="/u/'.$secure_username.'">'.$secure_username.'</a>
		</div>
	</div>
	<script>
	document.getElementById("item-drop").addEventListener("click",openExtras,false,false);
	function openExtras(){
		if(document.getElementById("item-list").dataset.status=="closed"){
			document.getElementById("item-list").dataset.status="open";
			document.getElementById("item-list").style.display="block";
		}
		else{
			document.getElementById("item-list").dataset.status="closed";
			document.getElementById("item-list").style.display="none";
		}
	}
	</script>
	';
}if($secure_login_status==false){
	echo '
	<div class="topbar">
		<div class="topbarinr">
			<a id="small-item" href="">R</a>
			<form method="post" id="searchbox" action="/search">
				<input id="search" type="text" placeholder="...In development...">
				<input id="searchsubmit" type="submit" value="search">
			</form>
			<a id="item" href="/function/register">register</a>
			<a id="item" href="/function/login">login</a>
		</div>
	</div>
	';
}
?>