<?php
function pdoReturn($db,$sql)
{
	try{
		$main=new PDO("mysql:dbname=$db;host=localhost;charset=utf8",'db2_admin','E-0&ZVd]TsHS');
		$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$query = $main->query($sql);
		$update = $query->fetchAll();
		if(!empty($update)){return true;}else{return false;}
	}catch(PDOException $e){print "Error!:".$e->getMessage()."<br/>";die();}
}
if(pdoReturn("db2_main","SHOW TABLES FROM db2_main LIKE 'users'")===false)
{
	echo 'flop';
}
else
{
	echo 'flop times 22222222222222';
}
?>