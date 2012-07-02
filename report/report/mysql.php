<?php
	//read configuration
	$ini_array = parse_ini_file("configuration/database1.php");

	if(!$ini_array)
	{
		die('FATAL ERROR: Configuration File Not Found !!');
	}
	//setup connection parameters
	if(isset($ini_array['DB_NAME']))
		$db_name=$ini_array['DB_NAME'];
	else
		$db_name='test';
	
	if(isset($ini_array['DB_PASSWORD']))
		$db_password=$ini_array['DB_PASSWORD'];
	else
		$db_password='';
	
	if(isset($ini_array['DB_USER']))
		$db_username=$ini_array['DB_USER'];
	else
		$db_username='root';
	
	if(isset($ini_array['DB_HOST']))
		$hostname=$ini_array['DB_HOST'];
	else
		$hostname='localhost';
	
	if(isset($ini_array['DB_PORT']))
		$port=$ini_array['DB_PORT'];
	else
		$port=3306;

	$con=mysql_connect("$hostname:$port",$db_username,$db_password) or die(mysql_error());
	//echo "connected\n";
	
	mysql_select_db($db_name) or die(mysql_error());
	//echo "db selected\n";
?>
