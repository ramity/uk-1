<?php
if(isset($_POST['FollowMe'])){
	if(!empty($_POST['FollowMe'])){
		$boom=explode("/",$current_url);
		$userPageName=$boom[4];
		
		if(isset($secure_username) && isset($userPageName))
		{
			//GET USERPAGENAME'S USERNAME AND UID
			try{
				$main=new PDO('mysql:dbname=db2_main;host=localhost;charset=utf8','db2_admin','E-0&ZVd]TsHS');
				$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$query = $main->prepare("SELECT * FROM users WHERE username='$userPageName'");
				$query->execute();
				$userPageDatabase=$query->fetchAll();
			}catch(PDOException $e){print "Error!:".$e->getMessage()."<br/>";die();}
			
			//START ACTUAL FOLLOWING/FOLLOWER SCRIPT
			//CHECK AND SEE IF THE USER HAS ALREADY FOLLOWED SAID PERSON
			try{
				$main=new PDO('mysql:dbname=db2_following;host=localhost;charset=utf8','db2_admin','E-0&ZVd]TsHS');
				$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$query = $main->prepare("SELECT * FROM $secure_username WHERE username='$userPageName'");
				$query->execute();
				$getQueryData=$query->fetchAll();
			}catch(PDOException $e){print "Error!:".$e->getMessage()."<br/>";die();}
			//IF THE QUERY BRINGS BACK RESULTS: DO NOTHING, AND IF IT DOES: INSERT THE VALUES INTO THE USER'S FOLLOWING TABLE
			if(empty($getQueryData)){
				try{
					$main=new PDO('mysql:dbname=db2_following;host=localhost;charset=utf8','db2_admin','E-0&ZVd]TsHS');
					$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
					$query = $main->prepare("INSERT INTO $secure_username (id,uid,username,date) VALUES ('',:id,:username,:date) ");
					$query->bindValue("id",$userPageDatabase[0]['id']);
					$query->bindValue("username",$userPageDatabase[0]['username']);
					$query->bindValue("date",microtime(true));
					$query->execute();
				}catch(PDOException $e){print "Error!:".$e->getMessage()."<br/>";die();}
				
				try{
					$main=new PDO('mysql:dbname=db2_main;host=localhost;charset=utf8','db2_admin','E-0&ZVd]TsHS');
					$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
					$query = $main->prepare("SELECT * FROM userData WHERE uid=:uid");
					$query->bindValue("uid",$secure_uid);
					$query->execute();
					$getQueryData3=$query->fetchAll();
				}catch(PDOException $e){print "Error!:".$e->getMessage()."<br/>";die();}
				
				$newFollowing=intval($getQueryData3[0]['following']+1);
				
				try{
					$main=new PDO('mysql:dbname=db2_main;host=localhost;charset=utf8','db2_admin','E-0&ZVd]TsHS');
					$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
					$query = $main->prepare("UPDATE `userData` SET following='$newFollowing' WHERE uid=':uid'");
					$query->bindValue("uid",$secure_uid);
					$query->execute();
				}catch(PDOException $e){print "Error!:".$e->getMessage()."<br/>";die();}
			}
			//CHECK AND SEE IF THE USERPAGENAME HAS ALREADY BEEN FOLLOWED BY SAID USER
			try{
				$main=new PDO('mysql:dbname=db2_followers;host=localhost;charset=utf8','db2_admin','E-0&ZVd]TsHS');
				$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$query = $main->prepare("SELECT * FROM $userPageName WHERE username='$secure_username'");
				$query->execute();
				$getQueryData2=$query->fetchAll();
			}catch(PDOException $e){print "Error!:".$e->getMessage()."<br/>";die();}
			//IF THE QUERY BRINGS BACK RESULTS: DO NOTHING, AND IF IT DOES: INSERT THE VALUES INTO THE USERPAGENAME'S FOLLOWERS TABLE
			if(empty($getQueryData2)){
				try{
					$main=new PDO('mysql:dbname=db2_followers;host=localhost;charset=utf8','db2_admin','E-0&ZVd]TsHS');
					$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
					$query = $main->prepare("INSERT INTO $userPageName (id,uid,username,date) VALUES ('',:id,:username,:date)");
					$query->bindValue("id",$secure_uid);
					$query->bindValue("username",$secure_username);
					$query->bindValue("date",microtime(true));
					$query->execute();
				}catch(PDOException $e){print "Error!:".$e->getMessage()."<br/>";die();}
				
				try{
					$main=new PDO('mysql:dbname=db2_main;host=localhost;charset=utf8','db2_admin','E-0&ZVd]TsHS');
					$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
					$query = $main->prepare("SELECT * FROM userData WHERE uid=:uid");
					$query->bindValue("uid",$userPageDatabase[0]['id']);
					$query->execute();
					$getQueryData3=$query->fetchAll();
				}catch(PDOException $e){print "Error!:".$e->getMessage()."<br/>";die();}
				
				$newFollowers=intval($getQueryData3[0]['followers']+1);
				
				try{
					$main=new PDO('mysql:dbname=db2_main;host=localhost;charset=utf8','db2_admin','E-0&ZVd]TsHS');
					$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
					$query = $main->prepare("UPDATE `userData` SET followers='$newFollowers' WHERE uid=':uid'");
					$query->bindValue("uid",$userPageDatabase[0]['id']);
					$query->execute();
				}catch(PDOException $e){print "Error!:".$e->getMessage()."<br/>";die();}
			}
			echo '<meta http-equiv="refresh" content="0">';die();
		}
	}
}
if(isset($_POST['UnFollowMe'])){
	if(!empty($_POST['UnFollowMe'])){
		$boom=explode("/",$current_url);
		$userPageName=$boom[4];
		
		echo 'have not gotten around to make a unfollow script yet... derp.';
	}
}
?>