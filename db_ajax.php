<?php
require "dbconnection.php";
if (isset($_POST['exec_ajax'])) {
	$firstword 		= $_POST['firstword'];
	$secondword 	= $_POST['secondword'];
	$star 			= $_POST['star'];

	$sql = "INSERT INTO words(word,stars)";
	$sql = $sql."VALUES('$firstword', '$star')";
	if($mysql_conn->query($sql)){
		 //echo "YOU ADDED A TASK";
	}
	else {
		 //echo "AN ERROR OCCURED";
	}

	$sql = "INSERT INTO words(word,stars)";
	$sql = $sql."VALUES('$secondword', '$star')";
	
	if($mysql_conn->query($sql)) {
		echo "YOU ADDED A TASK";
	}
	else
	{
		echo "AN ERROR OCCURED";
	}
}
?>