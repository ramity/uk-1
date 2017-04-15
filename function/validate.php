<?php require('/home4/db2/public_html/box/declare.php');?>
<?php
if(!empty($_POST['V_sub'])){
if(!empty($_POST['V_e'])){
if(!empty($_POST['V_c'])){
	if(ctype_alnum($_POST['V_c'])){
		if(strlen($_POST['V_e'])<=254){
		if(strlen($_POST['V_c'])<=12){
			tryvalidate();
		}else{$GLOBALS['e_message']="Your email is a bit too big...";}
		}else{$GLOBALS['e_message']="Your code is a bit too big...";}
	}else{$GLOBALS['e_message']="Your code seems to have invalid characters...";}
}
else{$GLOBALS['e_message']="Probally help to input a code.";}
}else{$GLOBALS['e_message']="Email wouldn't hurt.<br>Would it?";}
}
function tryvalidate()
{
	try
	{
		$main = new PDO('mysql:dbname=db2_main;host=localhost;charset=utf8','db2_admin','E-0&ZVd]TsHS');
		$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		
		$data = $main->prepare('SELECT * FROM register WHERE email=:email AND code=:code');
		
		$data->bindValue("email",$_POST['V_e']);
		$data->bindValue("code",$_POST['V_c']);
		
		$data->execute();
		
		$end = $data->fetchAll();
		
		if(empty($end))
		{
			$GLOBALS['e_message']="Something seems fishy..<br><br>Make sure you are using the correct email and code.";
		}
		else
		{
			//UPDATE REGISTER COMPLETION
			$main2 = new PDO('mysql:dbname=db2_main;host=localhost;charset=utf8','db2_admin','E-0&ZVd]TsHS');
			$main2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$main2->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$data2 = $main2->prepare("UPDATE register SET status='1' WHERE email=:email AND code=:code");
			$data2->bindValue("email",$_POST['V_e']);
			$data2->bindValue("code",$_POST['V_c']);
			$data2->execute();
			
			//SELECT FROM REGISTERED USERS TABLE
			$main3 = new PDO('mysql:dbname=db2_main;host=localhost;charset=utf8','db2_admin','E-0&ZVd]TsHS');
			$main3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$main3->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$data3 = $main3->prepare("SELECT username FROM users WHERE username=:username");
			$data3->bindValue("username",$getusername);
			$data3->execute();
			$end3 = $data3->fetchAll();
			
			//CHECK IF THE USER HAS VALIDATED HIS/HER ACCOUNT ALREADY
			if(empty($end3))
			{
				$main4 = new PDO('mysql:dbname=db2_main;host=localhost;charset=utf8','db2_admin','E-0&ZVd]TsHS');
				$main4->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$main4->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$data4 = $main4->prepare("INSERT INTO users (id,username,password,lastactive) VALUES('',:username,:password,:lastactive)");
				$data4->bindValue("username",$end[0]['username']);
				$data4->bindValue("password",$end[0]['password']);
				$data4->bindValue("lastactive",microtime(true));
				$data4->execute();
				$GLOBALS['e_message']="Success, rediricting you to login.<meta http-equiv='refresh' content='3;url=http://ramity.com/function/login'/>";
			}
			else
			{
				$GLOBALS['e_message']="Seems like you've validated your account already..<br>Rediricting you to login.<meta http-equiv='refresh' content='3;url=http://ramity.com/function/login'/>";
			}
		}
	}
	catch(PDOException $e){print "Error!: " . $e->getMessage() . "<br/>";die();}
}
?>
<!DOCTYPE>
<html>
	<head>
		<?php require('/home4/db2/public_html/box/head.php');?>
	</head>
	<body>
		<?php require('/home4/db2/public_html/box/top-bar.php');?>
		<?php require('/home4/db2/public_html/content/validate.php');?>
		<?php require('/home4/db2/public_html/extra/randimage.php');?>
	</body>
	<?php require('/home4/db2/public_html/box/end.php');?>
</html>