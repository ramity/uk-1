<?php
require('C:/wamp/www/box/declare.php');
if($secure_login_status==false)
{
	?>
	<!DOCTYPE>
	<html>
		<head>
			<?php
			require('C:/wamp/www/box/head.php');
			$pb = new pageBuilder();
			$pb->head(1,$secure_login_status);
			?>
		</head>
		<body>
			<?php require('C:/wamp/www/box/top-bar.php');?>
			<?php require('C:/wamp/www/content/index.html');?>
		</body>
		<?php require('C:/wamp/www/box/end.php');?>
	</html>
	<?php
}
else
{
	require('C:/wamp/www/creation/home.php');
	?>
	<!DOCTYPE>
	<html>
		<head>
			<?php require('C:/wamp/www/box/head.php');?>
		</head>
		<body>
			<?php require('C:/wamp/www/box/top-bar.php');?>
			<?php require('C:/wamp/www/content/home.php');?>
		</body>
		<?php require('C:/wamp/www/box/end.php');?>
	</html>
<?php
}
?>