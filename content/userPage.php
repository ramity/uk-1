<?php
try{
	$main=new PDO('mysql:dbname=db2_main;host=localhost;charset=utf8','db2_admin','E-0&ZVd]TsHS');
	$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$query = $main->prepare('SELECT * FROM users WHERE username=:username');
	$query->bindValue("username",$userPageName);
	$query->execute();
	$userPageDatabase=$query->fetchAll();
}catch(PDOException $e){print "Error!:".$e->getMessage()."<br/>";die();}
try{
	$main=new PDO('mysql:dbname=db2_main;host=localhost;charset=utf8','db2_admin','E-0&ZVd]TsHS');
	$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$query = $main->prepare('SELECT * FROM userData WHERE id=:id');
	$query->bindValue("id",$userPageDatabase[0]['id']);
	$query->execute();
	$userPageData=$query->fetchAll();
}catch(PDOException $e){print "Error!:".$e->getMessage()."<br/>";die();}
?>
<div id="top_wrapper">
	<div id="top_wrapper_inr">
		<div id="user_cover" style="background-image:url(<?php echo $userPageData[0]['coverUrl'];?>);">
			<div id="user_cover_photo">
				<div id="user_cover_follow">
					<?php
					if($secure_login_status===true){
						if($secure_username===$userPageName){
						}else{
							try{
								$main=new PDO('mysql:dbname=db2_following;host=localhost;charset=utf8','db2_admin','E-0&ZVd]TsHS');
								$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
								$query = $main->prepare("SELECT * FROM $secure_username WHERE username=:username");
								$query->bindValue("username",$userPageName);
								$query->execute();
								$userFollowersResults=$query->fetchAll();
							}catch(PDOException $e){print "Error!:".$e->getMessage()."<br/>";die();}
							if(empty($userFollowersResults)){
								echo '<form id="user_cover_follow_form" action="'.$current_url.'" method="post">
									<input type="submit" id="user_cover_follow_form_button" name="FollowMe" value="Follow">
								</form>';
							}else{
								echo '<form id="user_cover_follow_form" action="'.$current_url.'" method="post">
									<input type="submit" id="user_cover_unfollow_form_button" name="UnFollowMe" value="Unfollow">
								</form>';
							}
						}
					}else{
						echo 'login to follow this person';
					}
					?>
					</form>
				</div>
				<div id="user_cover_photo_profile_picture">
					<img src="<?php echo $userPageData[0]['imageUrl'];?>">
				</div>
				<div id="user_cover_photo_profile_name"><?php echo $userPageName;?></div>
			</div>
			<div id="user_cover_function_bar">
				<a class="user_cover_function_bar_item">Content</a>
				<a class="user_cover_function_bar_item">Feed</a>
				<a class="user_cover_function_bar_item">Activity</a>
				<a class="user_cover_function_bar_item">Photos</a><!--
				<a class="user_cover_function_bar_item">About</a>
				<a class="user_cover_function_bar_item">Followers</a>
				<a class="user_cover_function_bar_item">Following</a>-->
			</div>
		</div>
	</div>
	<div id="post_holder">
		<div id="post_holder_inr"></div>
	</div>
</div>