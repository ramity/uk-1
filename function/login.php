<?php require('C:/Wamp/www/box/declare.php');?>
<?php
if(!empty($_POST['L_sub'])){
if(!empty($_POST['L_u'])){
if(!empty($_POST['L_p'])){
	if(strlen($_POST['L_u'])<=20){
	if(strlen($_POST['L_p'])<=64){
		trylogin();
	}else{$GLOBALS['e_message']="Your username is a bit too big...";}
	}else{$GLOBALS['e_message']="Your password is a bit too big...";}
}else{$GLOBALS['e_message']="Probally help to put a password.";}
}else{$GLOBALS['e_message']="Email wouldn't hurt.<br>Would it?";}
}

function trylogin(){
	try{
		$main=new PDO('mysql:dbname=db2_main;host=localhost;charset=utf8','db2_admin','E-0&ZVd]TsHS');
		$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		
		$data = $main->prepare('SELECT * FROM users WHERE username=:username AND password=:password');
		
		$data->bindValue("username",$_POST['L_u']);
		$data->bindValue("password",hash('whirlpool',$_POST['L_p']));
		
		$data->execute();
		$end = $data->fetchAll();
		
		if(empty($end)){$GLOBALS['e_message']="Something seems fishy..<br><br>The username or password may be invalid";}
		else
		{
			$value = $end[0]['id'].'.'.$end[0]['password'];
			setcookie("X",$value,time() + 60 * 60 * 24,"/",".ramity.com",false,true);
			$GLOBALS['e_message']="Logging in...<meta http-equiv='refresh' content='2;url=http://ramity.com'/>";
		}
	}catch(PDOException $e){print "Error!: " . $e->getMessage() . "<br/>";die();}
}
?>
<!DOCTYPE>
<html>
	<head>
		<?php
		require('C:/Wamp/www/box/head.php');
		$pb = new pageBuilder();
		$pb->head(2,$secure_login_status);
		?>
	</head>
	<body>
		<?php require('C:/Wamp/www/box/top-bar.php');?>
		<?php require('C:/Wamp/www/content/login.php');?>
		<?php
		require('C:/Wamp/www/extra/randimage.php');
		$ri = new randomImage();
		$ri->generate(1);
		?>
	</body>
	<?php require('C:/Wamp/www/box/end.php');?>
</html>