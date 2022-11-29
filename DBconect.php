<?php
$db_host="bkz2tw6wxfbhaosjddch-mysql.services.clever-cloud.com"; //localhost server 
$db_user="u4pj4wzxqh29t3h2";	//database username
$db_password="AiU9DaoAWJVMrrhYyIWu";	//database password   
$db_name="bkz2tw6wxfbhaosjddch";	//database name

try
{
	$db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $e)
{
	$e->getMessage();
}

?>



