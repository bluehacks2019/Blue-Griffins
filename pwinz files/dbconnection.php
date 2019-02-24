<?php
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "stride7";

	$mysql_conn = new mysqli($server, $username, $password, $database);
	if($mysql_conn === false)
	{
    	die("ERROR: Could not connect. " . mysqli_connect_error());
	}
?>