<?php
echo '
<link rel="icon" href="http://ramity.com/image/icon/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="http://ramity.com/image/icon/favicon.ico" type="image/x-icon">
<meta charset="UTF-8">
<meta name="author" content="Lewis Brown">
<meta name="keywords" content="web, social, friends, ramity, development, new, commuinity, openbuild, updates, media, lewis brown">
<meta name="description" content="Ramity is a new kind of social website built around a slowly progressing commuinity. Updates are pushed out daily and is constantly changing around users.">
<link rel="stylesheet" type="text/css" href="http://ramity.com/css/topbar.css">
';
$boom=explode("/",$current_url);
$userPageName=$boom[4];
//USE THE ABOVE CODE FOR USER SPECIFIC CODE, BUT FOR NOW USE A DEFAULT CSS DOCUMENT
echo '<link rel="stylesheet" type="text/css" href="http://ramity.com/css/userPage.css">';
?>