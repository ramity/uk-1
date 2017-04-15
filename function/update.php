<?php
if($url=="http://ramity.com/function/update"){
}else{
	function update($tempUsername,$newVersion)
	{
		if(file_exists("/home4/db2/public_html/u/".$tempUsername."/")){
		}else{
			mkdir("/home4/db2/public_html/u/".$tempUsername."/");
		}
		if(file_exists("/home4/db2/public_html/u/".$tempUsername."/index.php")){
			$templateFile=file_get_contents("/home4/db2/public_html/template/userhomepage.php");
			$userFile=file_get_contents("/home4/db2/public_html/u/".$tempUsername."/index.php");
			if($userFile===$templateFile){
			}else{
				$tempFileName="/home4/db2/public_html/u/".$tempUsername."/index.php";
				$tempUserWriteHandle=fopen($tempFileName,'w') or die("can't open file");
				fwrite($tempUserWriteHandle,$templateFile);
				fclose($tempUserWriteHandle);
			}
		}else{
			$tempFileName="/home4/db2/public_html/u/".$tempUsername."/index.php";
			$tempUserHandle=fopen($tempFileName,'w') or die("can't open file");
			$tempUserData=fgets($tempUserHandle);
			$tempTemplateHandle=fopen("/home4/db2/public_html/template/userhomepage.php", 'r') or die("can't open file");
			$tempTemplateData=fgets($tempTemplateHandle);
			fwrite($tempUserHandle,$tempTemplateData);
			fclose($tempUserHandle);
			fclose($tempTemplateHandle);
		}
		$tempUsername=$tempUsername;
		
		pdoNoReturn("db2_content","CREATE TABLE IF NOT EXISTS $tempUsername (
		id INT(22) AUTO_INCREMENT PRIMARY KEY,
		uid INT(22),
		postid INT(22),
		username VARCHAR(20),
		date VARCHAR(20),
		votes INT(22) DEFAULT '0',
		comments INT(22) DEFAULT '0',
		shares INT(22) DEFAULT '0',
		text TEXT(50000));");
		
		pdoNoReturn("db2_feed","CREATE TABLE IF NOT EXISTS $tempUsername (
		id INT(22) AUTO_INCREMENT PRIMARY KEY,
		uid INT(22),
		postid INT(22),
		username VARCHAR(20));");
		
		pdoNoReturn("db2_following","CREATE TABLE IF NOT EXISTS $tempUsername (
		id INT(22) AUTO_INCREMENT PRIMARY KEY,
		uid INT(22),
		username VARCHAR(20),
		date VARCHAR(20));");
		
		pdoNoReturn("db2_followers","CREATE TABLE IF NOT EXISTS $tempUsername (
		id INT(22) AUTO_INCREMENT PRIMARY KEY,
		uid INT(22),
		username VARCHAR(20),
		date VARCHAR(20));");
		
		//UPDATE : GET USER DATA
		try{
			$main=new PDO("mysql:dbname=db2_main;host=localhost;charset=utf8",'db2_admin','E-0&ZVd]TsHS');
			$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$query = $main->prepare("SELECT * FROM users WHERE username=:username");
			$query->bindValue("username",$tempUsername);
			$query->execute();
			$updateUserData=$query->fetchAll();
			$tempId=$updateUserData[0]['id'];
		}catch(PDOException $e){print "Error!: " . $e->getMessage() . "<br/>";die();}
		
		try{
			$main=new PDO("mysql:dbname=db2_main;host=localhost;charset=utf8",'db2_admin','E-0&ZVd]TsHS');
			$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$query = $main->prepare("SELECT * FROM userData WHERE uid=:uid");
			$query->bindValue("uid",$tempId);
			$query->execute();
			$updateUserData=$query->fetchAll();
			if(empty($updateUserData)){
				$main=new PDO("mysql:dbname=db2_main;host=localhost;charset=utf8",'db2_admin','E-0&ZVd]TsHS');
				$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$query = $main->prepare("INSERT INTO userData (id,uid,posts,followers,following,imageUrl) VALUES('',$tempId,'0','0','0','http://ramity.com/image/default/profile.png','http://ramity.com/image/default/cover.jpg')");
				$query->execute();
			}
		}catch(PDOException $e){print "Error!: " . $e->getMessage() . "<br/>";die();}
		
		try{
			$main=new PDO("mysql:dbname=db2_main;host=localhost;charset=utf8",'db2_admin','E-0&ZVd]TsHS');
			$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$query = $main->prepare("UPDATE users SET `update`='$newVersion' WHERE username='$tempUsername'");
			$query->execute();
		}catch(PDOException $e){print "Error!: " . $e->getMessage() . "<br/>";die();}
		
		
	}
}
function pdoNoReturn($db,$sql)
{
	try{
		$main=new PDO("mysql:dbname=$db;host=localhost;charset=utf8",'db2_admin','E-0&ZVd]TsHS');
		$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$query = $main->prepare($sql);
		$query->execute();
	}catch(PDOException $e){print "Error!: " . $e->getMessage() . "<br/>";die();}
}
?>