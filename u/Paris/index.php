<?php require('/home4/db2/public_html/box/declare.php');?>
<?php if($current_url=="http://ramity.com/template/userhomepage.php" || $current_url=="http://ramity.com/template/userhomepage"){header('Location:http://ramity.com');die();}?>
<?php require('/home4/db2/public_html/handle/follow.php');?>
<!DOCTYPE>
<html>
	<head>
		<?php require('/home4/db2/public_html/box/userHead.php');?>
	</head>
	<body>
		<?php require('/home4/db2/public_html/box/top-bar.php');?>
		<?php require('/home4/db2/public_html/content/userPage.php');?>
	</body>
	<?php require('/home4/db2/public_html/box/end.php');?>
</html>