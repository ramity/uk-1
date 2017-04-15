<?php require('/home4/db2/public_html/box/declare.php');?>
<?php
if(!empty($_POST['R_sub'])){
if(!empty($_POST['R_u'])){
if(!empty($_POST['R_e'])){
if(!empty($_POST['R_p'])){
	if(ctype_alnum($_POST['R_u'])){
		if(strlen($_POST['R_u'])<=20){
		if(strlen($_POST['R_e'])<=254){
		if(strlen($_POST['R_p'])<=40){
			tryregister();
		}else{$e_message="Password is too long.";}
		}else{$e_message="Email is too long.";}
		}else{$e_message="Username is too long.";}
	}else{$e_message="Username contains invalid characters.";}
}else{$e_message="Password wouldn't hurt either.";}
}else{$e_message="Emails are sorta required too.";}
}else{$e_message="You should <strong>probaly</strong> supply a username.";}
}

function tryregister(){
	try{
		$main = new PDO('mysql:dbname=db2_main;host=localhost;charset=utf8','db2_admin','E-0&ZVd]TsHS');
		$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		
		$data = $main->prepare('SELECT * FROM register WHERE username=:username OR email=:email OR ip=:ip');
		
		$data->bindValue("username",$_POST['R_u']);
		$data->bindValue("email",$_POST['R_e']);
		$data->bindValue("ip",$cur_ip);
		
		$data->execute();
		
		$end = $data->fetchAll();
		
		if(empty($end))
		{
			$code = generateRandomString(12);
			$unsafe_email=$_POST['R_e'];
			$unsafe_username=$_POST['R_u'];
			$time = microtime(true);
			$time_string = date("l jS F \@ g:i a",$time);
			$data = $main->prepare('INSERT INTO register (id,username,email,password,code,ip,time,status) VALUES("",:username,:email,:password,:code,:ip,:time,:status)');
			
			$data->bindValue("username",$_POST['R_u']);
			$data->bindValue("email",$_POST['R_e']);
			$data->bindValue("password",hash('whirlpool',$_POST['R_p']));
			$data->bindValue("code",$code);
			$data->bindValue("ip",$_SERVER['REMOTE_ADDR']);
			$data->bindValue("time",$time);
			$data->bindValue("status","0");
			
			$data->execute();
			
			$to=$_POST['R_e'];
			$subject='Email validation notice';
			$message="
			<!DOCTYPE>
			<html>
				<head>
					<style>
						html
						{
						font-family:'Raleway', sans-serif;
						}
						body
						{
						width:500px;
						height:519px;
						margin:20px auto;
						border:1px solid #aaa;
						}
						div#holder
						{
						width:500px;
						height:500px;
						float:left;
						background-color:#aaa;
						}
						div#top
						{
						width:460px;
						height:34px;
						line-height:34px;
						padding:20px;
						background-color:#fff;
						border-bottom:1px solid #bbb;
						font-size:13px;
						float:left;
						color:#666;
						margin-bottom:10px;
						}
						div#topitem,div#topitem2
						{
						height:34px;
						float:left;
						color:#fff;
						padding:0 18px;
						cursor:pointer;
						background-color:#6646AC;
						}
						div#topitem2
						{
						float:right;
						background-color:#aaa;
						}
						div.linepos
						{
						width:500px;
						float:left;
						margin-left:20px;
						}
						div.line
						{
						color:#000;
						padding:10px;
						background-color:#fff;
						float:left;
						border-bottom:1px solid #bbb;
						}
						div.linebreak
						{
						width:0;
						height:0;
						float:left;
						margin-left:32px;
						border-left:0px solid transparent;
						border-right:5px solid transparent;
						border-top:10px solid #bbb;
						margin-bottom:10px;
						}
						div#footer
						{
						width:500px;
						height:19px;
						float:left;
						background-color:#fff;
						color:#aaa;
						text-align:center;
						}
					</style>
				</head>
				<body>
					<div id='holder'>
						<div id='top'><div id='topitem'>VALIDATION EMAIL</div><div id='topitem2'>$unsafe_username</div></div>
						<div class='linepos'><div class='line'>This notice is for an account confirmation to validate your email.</div></div>
						<div class='linebreak'></div>
						<div class='linepos'><div class='line'>Copy and paste the following code to activate your account</div></div>
						<div class='linebreak'></div>
						<div class='linepos'><div class='line' style='background-color:#6646AC;color:#fff;'>$code</div></div>
						<div class='linebreak'></div>
						<div class='linepos'><div class='line'>Visit <a href='http://ramity.com/function/validate'>here</a> and insert it there.</div></div>
						<div class='linebreak'></div>
						<div class='linepos'><div class='line'>Oh, and thanks for registering :)</div></div>
						<div class='linebreak'></div>
					</div>
					<div id='footer'>
						Sent at $time_string.
					</div>
				</body>
			</html>
			";
			$from = "validate";
			
			
			
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= "To: $unsafe_email\r\n";
			$headers .= "From: validate <validate@ramity.com>\r\n";
			
			mail($to,$subject,$message,$headers);
			
			$GLOBALS['e_message']="An email was sent to the account for validation.<br><br>Copy and paste the code <a href='http://ramity.com/function/validate'>here</a> or the link provided";
		}
		else
		{
			$GLOBALS['e_message']="Seems as if you or someone else has registered before.";
		}
	}
	catch(PDOException $e)
	{
		print "Error!: " . $e->getMessage() . "<br/>";die();
	}
}
function generateRandomString($length) 
{
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomString = '';
	for ($i = 0; $i < $length; $i++)
	{
		$randomString .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $randomString;
}
?>
<!DOCTYPE>
<html>
	<head>
		<?php require('/home4/db2/public_html/box/head.php');?>
	</head>
	<body>
		<?php require('/home4/db2/public_html/box/top-bar.php');?>
		<?php require('/home4/db2/public_html/content/register.php');?>
		<?php require('/home4/db2/public_html/extra/randimage.php');?>
	</body>
	<?php require('/home4/db2/public_html/box/end.php');?>
</html>