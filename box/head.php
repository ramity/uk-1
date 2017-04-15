<?php
class pageBuilder
{
	function head($version,$secure)
	{
		echo'
		<link rel="icon" href="/image/icon/favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" href="/image/icon/favicon.ico" type="image/x-icon">
		<meta charset="utf-8">
		<meta name="author" content="Lewis Brown">
		<meta name="keywords" content="web, social, friends, ramity, development, new, commuinity, openbuild, updates, media, lewis brown">
		<meta name="description" content="Ramity is a new kind of social website built around a slowly progressing commuinity. Updates are pushed out daily and is constantly changing around users.">
		<link rel="stylesheet" type="text/css" href="/css/topbar.css">
		';
		if($version===1 && $secure===false)//index.php
		{
			echo '
			<link rel="stylesheet" type="text/css" href="/css/index.css">
			<title>Something New - Ramity.com</title>
			';
		}
		if($version===1 && $secure===true)//index.php
		{
			echo '
			<link rel="stylesheet" type="text/css" href="/css/home.css">
			<title>Something New - Home</title>
			';
		}
		if($version===2 && $secure===false)//login.php
		{
			echo '
			<link rel="stylesheet" type="text/css" href="/css/login.css">
			<title>Log in - Ramity</title>
			';
		}
		if($version===2 && $secure===true)//login.php
		{
			die();
		}
		if($version===3 && $secure===false)//register.php
		{
			echo '
			<link rel="stylesheet" type="text/css" href="/css/register.css">
			<title>Register for - Ramity</title>
			';
		}
		if($version===3 && $secure===true)//register.php
		{
			die();
		}
		if($version===4 && $secure===false)//validate.php
		{
			echo '
			<link rel="stylesheet" type="text/css" href="/css/validate.css">
			<title>Validatation Code - Ramity</title>
			';
		}
		if($version===4 && $secure===true)//validate.php
		{
			die();
		}
		if($version===5 && $secure===false)//settings.php
		{
			die();
		}
		if($version===5 && $secure===true)//settings.php
		{
			echo '
			<link rel="stylesheet" type="text/css" href="/css/settings.css">
			<title>Change your settings</title>
			';
		}
	}
}
?>