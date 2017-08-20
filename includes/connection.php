<?php
	require("constants.php");
	//1. connection to database
	$connection = mysql_connect(DB_SERVER,DB_USER, DB_PASSWORD);
	if(!$connection)
	{
		die('Database can\'t connect successfully'.mysql_error());
	}
	
	$connect_i = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
	
	//2. selecting the database
	$db_select  = mysql_select_db(DB_NAME,$connection);
	if(!$db_select)
	{
		die('Database can\'t select'.mysql_error());
	}
	
?>