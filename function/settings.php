<?php require('/home4/db2/public_html/box/declare.php');?>
<?php
if(!empty($_POST['C_U_sub'])){
if(!empty($_POST['C_U_u'])){
if(!empty($_POST['C_U_p'])){
	if(ctype_alnum($_POST['C_U_u'])){
		if(strlen($_POST['C_U_u'])<=20){
		if(strlen($_POST['R_p'])<=40){
			changeUsername();
		}else{$e_message="Password is too long.";}
		}else{$e_message="Username is too long.";}
	}else{$e_message="Username contains invalid characters.";}
}else{$e_message="Password wouldn't hurt either.";}
}else{$e_message="You should <strong>probaly</strong> supply a username.";}
}
function changeUsername(){
	
}
?>
<!DOCTYPE>
<html>
	<head>
		<?php require('/home4/db2/public_html/box/head.php');?>
	</head>
	<body>
		<?php require('/home4/db2/public_html/box/top-bar.php');?>
		<?php require('/home4/db2/public_html/content/settings.php');?>
	</body>
	<?php require('/home4/db2/public_html/box/end.php');?>
</html>