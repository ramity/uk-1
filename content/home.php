<div id="top_wrapper">
	<div id="top_wrapper_inner">
		<div id="feed_top">
			<form id="feed_top_input" action="http://ramity.com/" method="post">
				<textarea id="feed_text" name="home_post_text"></textarea>
				<div id="feed_top_input_bottom">
					<div id="feed_selection">
						<div id="feed_top_input_bottom_tags">tags</div>
						<input type="text" id="feed_post_tags">
					</div>
					<input type="submit" id="feed_post_sub" value="post" name="home_post_sub">
				</div>
			</form>
			<div id="feed_top_user">
				<div id="user_header">
					<img src="<?php echo $userData[0]['imageUrl'];?>">
					<a id="user_header_inr" href="http://ramity.com/u/<?php echo $secure_username;?>/"><?php echo $secure_username;?></a>
				</div>
				<div id="user_notif">
					<div class="user_notif_item">posts</div>
					<div class="user_notif_item">followers</div>
					<div class="user_notif_item">following</div>
				</div>
				<div id="user_info">
					<div id="user_info_data_bl"><?php echo $userData[0]['posts'];?></div>
					<div class="user_info_data"><?php echo $userData[0]['followers'];?></div>
					<div class="user_info_data"><?php echo $userData[0]['following'];?></div>
				</div>
				<div id="user_footer"></div>
			</div>
		</div>
	</div>
</div>
<div id="feed_holder">
	<div id="feed_post_holder">
		<div id="feed_post_holder_inner">
			<div id="feed_post_holder_inner_top">Feed</div>
			<?php
			try{
				$main=new PDO("mysql:dbname=db2_feed;host=localhost;charset=utf8",'db2_admin','E-0&ZVd]TsHS');
				$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$query = $main->prepare("SELECT * FROM $secure_username ORDER BY id DESC");
				$query->execute();
				$data = $query->fetchAll();
			}catch(PDOException $e){print "Error!: " . $e->getMessage() . "<br/>";die();}
			if(empty($data)){
			echo "
			<div class='feed_post'>
				<div class='feed_post_top'>New to ramity?</div>
				<div class='feed_post_content'>
					Your feed doesn't seem to have anything in it.<br>
					<div class='feed_post_content_inner_quote' style='font-weight:bold;font-size:13px;'>
						You can add posts to your feed by friending/following someone.<br><br>
						OR<br><br>
						You can add your own posts and content.
					</div>
					Just keep in mind that ramity is still in development and is bound to break at times, but other than that, enjoy what ramity has to offer and feel free to add sugestions.<br><br>
					~cheers, lewis
				</div>
			</div>
			";
			
			}else
			{
				foreach($data as $row)
				{
					$feedPostUsername=$row['username'];
					$feedPostId=$row['postid'];
					try{
						$main=new PDO("mysql:dbname=db2_content;host=localhost;charset=utf8",'db2_admin','E-0&ZVd]TsHS');
						$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
						$query = $main->prepare("SELECT * FROM $feedPostUsername WHERE postid=$feedPostId");
						$query->execute();
						$data = $query->fetchAll();
					}catch(PDOException $e){print "Error!: " . $e->getMessage() . "<br/>";die();}
					echo'
					<div class="feed_post">
						<div class="feed_post_top">'.$data[0]['username'].'</div>
						<div class="feed_post_content">'.$data[0]['text'].'</div>
					</div>';
				}
			}
			?>
		</div>
		<div id="feed_side_bar">
			<div id="feed_side_bar_follow">
				<div id="feed_side_bar_follow_header">Follow (in dev.)</div>
				<?php
				if(isset($_POST['follow_search_submit'])){
					if(isset($_POST['follow_search_input'])){
						if(!empty($_POST['follow_search_input'])){
							echo '<div id="feed_side_bar_follow_results">';
							$startQueryTime=microtime(true);
							try{
								$main=new PDO("mysql:dbname=db2_main;host=localhost;charset=utf8",'db2_admin','E-0&ZVd]TsHS');
								$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
								$query = $main->prepare("SELECT * FROM users WHERE username=:username");
								$query->bindValue("username",$_POST['follow_search_input']);
								$query->execute();
								$data = $query->fetchAll();
							}catch(PDOException $e){print "Error!: " . $e->getMessage() . "<br/>";die();}
							$endQueryTime=microtime(true);
							$queryTime=round($endQueryTime-$startQueryTime,3);
							if(empty($data)){
								echo "<div id='feed_side_bar_follow_results_header'>Results ($queryTime seconds)</div>";
								echo '<div class="feed_side_bar_follow_results_item">No results found</div></div>';
							}else{
								echo "<div id='feed_side_bar_follow_results_header'>Results ($queryTime seconds)</div>";
								foreach($data as $row)
								{
									$username=$row['username'];
									echo "<div class='feed_side_bar_follow_results_item'><a href='http://ramity.com/u/$username'>$username</a></div>";	
								}
								echo '</div>';
							}
						}
					}
				}
				?>
				<form id="feed_side_bar_follow_content" action="http://ramity.com" method="post">
					<input class="feed_side_bar_follow_input" type="text" name="follow_search_input" autocomplete="off">
					<input class="feed_side_bar_follow_submit" type="submit" name="follow_search_submit" value="Search Users">
				</form>
			</div>
			<div id="feed_side_bar_news">
				<div id="feed_side_bar_news_header">News</div>
				<div id="feed_side_bar_news_content">
					<div class=""></div>
				</div>
			</div>
		</div>
	</div>
</div>