<?php
if(isset($_POST['home_post_sub'])){
	if(isset($_POST['home_post_text'])){
		if(!empty($_POST['home_post_text'])){
			
			$text=nl2br(htmlspecialchars($_POST['home_post_text']));
			
			try{
				$main=new PDO("mysql:dbname=db2_main;host=localhost;charset=utf8",'db2_admin','E-0&ZVd]TsHS');
				$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$query = $main->prepare("SELECT * FROM count");
				$query->execute();
				$countArray = $query->fetchAll();
			}catch(PDOException $e){print "Error!: " . $e->getMessage() . "<br/>";die();}
			
			$postId = $countArray[0]['post'] + 1;
			pdoNoReturn("db2_main","UPDATE count SET post=$postId WHERE 1");
			
			try{
				$main=new PDO("mysql:dbname=db2_main;host=localhost;charset=utf8",'db2_admin','E-0&ZVd]TsHS');
				$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$query = $main->prepare("SELECT * FROM userData WHERE uid='$current_uid'");
				$query->execute();
				$userPostArray = $query->fetchAll();
			}catch(PDOException $e){print "Error!: " . $e->getMessage() . "<br/>";die();}
			
			$newUserPosts = $userPostArray[0]['posts'] + 1;
			
			pdoNoReturn("db2_main","UPDATE userData SET posts=$newUserPosts WHERE uid=$current_uid");
			
			try{
				$main=new PDO("mysql:dbname=db2_content;host=localhost;charset=utf8",'db2_admin','E-0&ZVd]TsHS');
				$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$query = $main->prepare("INSERT INTO $secure_username (id,uid,postid,username,date,votes,comments,shares,text) VALUES ('',:uid,'$postId',:username,:time,'0','0','0',:text);");
				$query->bindValue("uid",$current_uid);
				$query->bindValue("username",$secure_username);
				$query->bindValue("time",microtime(true));
				$query->bindValue("text",$text);
				$query->execute();
			}catch(PDOException $e){print "Error!: " . $e->getMessage() . "<br/>";die();}
			
			pdoNoReturn("db2_votes","CREATE TABLE IF NOT EXISTS `$postId` (
			id INT(22) AUTO_INCREMENT PRIMARY KEY,
			uid INT(22),
			postid INT(22),
			username VARCHAR(20),
			date VARCHAR(20),
			value VARCHAR(2),
			result INT(22));");
			
			pdoNoReturn("db2_comments","CREATE TABLE IF NOT EXISTS `$postId` (
			id INT(22) AUTO_INCREMENT PRIMARY KEY,
			uid INT(22),
			postid INT(22),
			username VARCHAR(20),
			date VARCHAR(20),
			text TEXT(50000),
			result INT(22));");
			
			pdoNoReturn("db2_shares","CREATE TABLE IF NOT EXISTS `$postId` (
			id INT(22) AUTO_INCREMENT PRIMARY KEY,
			uid INT(22),
			postid INT(22),
			username VARCHAR(20),
			date VARCHAR(20),
			result INT(22));");
			
			pdoNoReturn("db2_feed","INSERT INTO $secure_username (id,uid,postid,username) VALUES ('','$current_uid','$postId','$secure_username')");
			
			try{
				$main=new PDO("mysql:dbname=db2_followers;host=localhost;charset=utf8",'db2_admin','E-0&ZVd]TsHS');
				$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$query = $main->prepare("SELECT * FROM $secure_username");
				$query->execute();
				$friendsArray = $query->fetchAll();
			}catch(PDOException $e){print "Error!: " . $e->getMessage() . "<br/>";die();}
			
			if(empty($friendsArray)){
			}else{
				foreach($friendsArray as $row){
					$friendUsername = $row['username'];
					pdoNoReturn("db2_feed","INSER INTO $friendUsername (id,uid,postid,username) VALUES ('','$current_uid','$postId','$secure_username')");
				}
			}
			echo '<meta http-equiv="refresh" content="0"/>';
		}
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