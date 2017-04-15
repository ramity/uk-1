<?php
$current_url = $_SERVER['REQUEST_URI'];
$cur_ip = $_SERVER['REMOTE_ADDR'];
if(!empty($_COOKIE['X'])){
	if(isset($_COOKIE['X'])){
		$boom=explode('.',$_COOKIE['X']);
		$current_uid=$boom['0'];
		$current_password=$boom['1'];
		try{
			$main=new PDO('mysql:dbname=db2_main;host=localhost;charset=utf8','db2_admin','E-0&ZVd]TsHS');
			$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$query = $main->prepare('SELECT * FROM users WHERE id=:id AND password=:password');
			$query->bindValue("id",$current_uid);
			$query->bindValue("password",$current_password);
			$query->execute();
			$dec_array = $query->fetchAll();
			if(empty($dec_array)){setcookie("X","",time() - 3600,"/",".ramity.com",false,true);header('Location:http://ramity.com/function/login');die();}
			else{//dump variables
				$secure_login_status=true;
				$secure_uid=$dec_array[0]['id'];
				$secure_username=$dec_array[0]['username'];
				if($dec_array[0]['update']==="0.7 foxy"){
					try{
						$main=new PDO("mysql:dbname=db2_main;host=localhost;charset=utf8",'db2_admin','E-0&ZVd]TsHS');
						$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
						$query = $main->prepare("SELECT * FROM userData WHERE uid=$secure_uid");
						$query->execute();
						$userData = $query->fetchAll();
					}catch(PDOException $e){print "Error!: " . $e->getMessage() . "<br/>";die();}
				}else{
					require('C:/Wamp/www/function/update.php');
					update($secure_username,"0.7 foxy");
					header("Location:$current_url");die();
				}
			}
		}
		catch(PDOException $e){print "Error!:".$e->getMessage()."<br/>";die();}
	}else{$secure_login_status=false;}
}else{$secure_login_status=false;}
if($current_url=="http://ramity.com/function/login" || $current_url=="http://ramity.com/function/register" || $current_url=="http://ramity.com/function/validate")
{
	if($secure_login_status==true){header('Location:http://ramity.com');die();}else{}
}
?>