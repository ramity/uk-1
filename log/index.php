<?php require('/home4/db2/public_html/box/declare.php');?>
<!DOCTYPE>
<html>
	<head>
		<title>Update Log - Ramity.com</title>
		<style>
			div#updateListHolder
			{
				width:944px;
				margin:0px auto;
			}
			div#updateListHolderInr
			{
				width:904px;
				min-height:1000px;
				margin:0px 20px;
				float:left;
				background-color:#fff;
			}
			div.updateListHolderInrItem
			{
				width:864px;
				float:left;
				margin:20px 20px 0px 20px;
				background-color:#f9f9f9;
			}
			div.updateListHolderInrItemHeader
			{
				width:864px;
				height:65px;
				float:left;
				border-bottom:2px solid #ddd;
			}
			img.updateListHolderInrItemHeaderImage
			{
				width:45px;
				height:45px;
				padding:5px;
				margin:5px;
				background-color:#ddd;
				float:left;
			}
			div.updateListHolderInrItemHeaderText
			{
				width:759px;
				padding:20px;
				height:25px;
				line-height:25px;
				float:left;
			}
			div.updateListHolderInrItemContent
			{
				width:774px;
				border-left:solid 5px #ddd;
				border-bottom:solid 5px #ddd;
				background-color:#fff;
				padding:20px;
				margin:20px;
				float:left;
			}
		</style>
		<link rel="icon" href="http://ramity.com/image/icon/favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" href="http://ramity.com/image/icon/favicon.ico" type="image/x-icon">
		<meta charset="UTF-8">
		<meta name="author" content="Lewis Brown">
		<meta name="keywords" content="web, social, friends, ramity, development, new, commuinity, openbuild, updates, media, lewis brown">
		<meta name="description" content="Ramity is a new kind of social website built around a slowly progressing commuinity. Updates are pushed out daily and is constantly changing around users.">
		<link rel="stylesheet" type="text/css" href="http://ramity.com/css/topbar.css">
	</head>
	<body>
		<?php require('/home4/db2/public_html/box/top-bar.php');?>
		<div id="updateListHolder">
			<div id="updateListHolderInr">
				<div class="updateListHolderInrItem">
					<div class="updateListHolderInrItemHeader">
						<img class="updateListHolderInrItemHeaderImage" src="http://ramity.com/log/fox.png">
						<div class="updateListHolderInrItemHeaderText">
							Foxy 0.7 - <i>Date Released: January 25 @ 11:57am</i>
						</div>
					</div>
					<div class="updateListHolderInrItemcontent">
						<i>Update?</i><br>
						<ul>
							<li>Moved around some variables to a better scope - <i>updated to finish following function</i></li>
							<li>UPDATE - Follow script is in the making <abbr title="As we speak">AWS</abbr> - <i>January 25 @ 5:22pm</i></li>
							<li>UPDATE - COVER PHOTOS! - <i>January 25 @ 6:12pm</i></li>
						</ul>
						<img src="http://ramity.com/image/default/cover.jpg" width="774">
					</div>
				</div>
				<div class="updateListHolderInrItem">
					<div class="updateListHolderInrItemHeader">
						<img class="updateListHolderInrItemHeaderImage" src="http://ramity.com/log/fox.png">
						<div class="updateListHolderInrItemHeaderText">
							Foxy 0.6 - <i>Date Released: January 25 @ 10:57am</i>
						</div>
					</div>
					<div class="updateListHolderInrItemcontent">
						<i>Incident?</i><br>
						<ul>
							<li>Removal of a database query resulted in some information not showing [ <i>Fixed @ 1-25-14 : 10:57am</i> ]</li>
							<li>Update queries breaking - <i>preventitive measures stopped the query from happening again</i></li>
						</ul>
						<i>New?</i><br>
						<ul>
							<li>Beginnings of following and unfollowing buttons have been implemented - <i>should be finished by 0.7 foxy</i></li>
							<li>Followers automatically get posts in feed [ <i>implemented in circa 0.3 and finished in 0.6</i> ]</li>
						</ul>
						<i>Things to come?</i><br>
						<ul>
							<li>Security - <i>once all the basic functions are nailed down</i></li>
							<li>Photo upload and directories in (for example:) u/[name]/photos/</li>
						</ul>
						<i>Notice!</i>
						<ul>
							<li>Small update due to fixes needing to be made</li>
							<li>Posts may be cleared in later updates unless I can update database table structures on the fly</li>
						</ul>
					</div>
				</div>
				<div class="updateListHolderInrItem">
					<div class="updateListHolderInrItemHeader">
						<img class="updateListHolderInrItemHeaderImage" src="http://ramity.com/log/fox.png">
						<div class="updateListHolderInrItemHeaderText">
							Foxy 0.5 - Previous update information not recorded <i>- Date Released: January 23 @ 8:14pm</i>
						</div>
					</div>
					<div class="updateListHolderInrItemcontent">
						<i>Databases?</i><br>
						<ul>
							<li>Comments</li>
							<li>Content</li>
							<li>Feed</li>
							<li>Followers</li>
							<li>Following</li>
							<li>Main</li>
							<li>Shares</li>
							<li>Votes</li>
						</ul>
						<i>Changes?</i><br>
						<ul>
							<li>Comments tables auto created upon post submission</li>
							<li>Comments tables layout</li>
							<li>Main database scheme</li>
							<li>Count table to store count of content and asign values</li>
							<li>Update versions now listed in Main database with user values</li>
							<li>Progress on settings</li>
							<li>Progress on profile pictures</li>
							<li>Thinking about inroling ajax to list of features</li>
							<li>User search in side bar (alpha)</li>
							<li>Search bar at top of the page still does nothing</li>
							<li>Slider in content/index.html is still buggy as crap (made that myself) - <i>too busy to fix, might work on it later</i></li>
						</ul>
						<i>Commuinity?</i><br>
						<ul>
							<li>lewis (myself)</li>
							<li>bot (myself) <i>used for debugging purposes</i></li>
							<li>deadjs</li>
							<li>sigma</li>
							<li>Drew</li>
							<li>ProfessorK</li>
						</ul>
						<i>Interesting solutions?</i><br>
						<ul>
							<li>Update if update version is out of date - <i>upon refreshing right after a update or logging on</i></li>
							<li>CREATE TABLE IF NOT EXISTS - <i>I actually did not know about this SQL statement</i></li>
							<li>Block paging - <i>personal method of creating pages with the use of php</i></li>
							<li>Pdo introduced - <i>tired of mysql for database</i></li>
							<li>semicolons, lots and lots of semicolons</li>
							<li>P != NP</li>
						</ul>
						<i>Future changes?</i><br>
						<ul>
							<li>Custom backgrounds/color schemes/profile images</li>
							<li>MOAR easter eggs [more to come]</li>
							<li>User profiles [in progress]</li>
							<li>Mode for screenshoting random acts of stupidity and junk (rather than just printscreening it)</li>
							<li>Wallpaper for profile</li>
							<li>Add followers (could eventually change to peasants)</li>
							<li>Ideas to keep in mind - focus on multitude of audiences</li>
							<li>Apps? (photo editor, calender, notes, games, etc)</li>
							<li>About me bio in profile tabs</li>
							<li>User security (public, private, friends only, etc)</li>
							<li>Ramity reminder?</li>
							<li>Blocking users</li>
							<li>Real time messaging</li>
							<li>Ask box messaging</li>
							<li>Wall conversations</li>
							<li>Comment pictures</li>
							<li>Emoticons</li>
							<li>Censor settings</li>
							<li>Spotify intergration</li>
							<li>Youtube intergration</li>
							<li>Blacklist unsafe tags. I mean, unless you are into that sorta thing.</li>
							<li>Twitch intergration</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>