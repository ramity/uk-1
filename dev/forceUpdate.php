<?php
require('/home4/db2/public_html/function/update.php');
try{
	$main=new PDO("mysql:dbname=db2_main;host=localhost;charset=utf8",'db2_admin','E-0&ZVd]TsHS');
	$main->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$main->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$query = $main->prepare("SELECT * FROM users");
	$query->execute();
	$updateData = $query->fetchAll();
}catch(PDOException $e){print "Error!: " . $e->getMessage() . "<br/>";die();}

foreach($updateData as $row)
{
	echo "updating ".$row['username']." to 0.7 foxy<br>";
	update($row['username'],"0.7 foxy");
}
?>