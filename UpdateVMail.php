<?php
	require 'ConnectionSettings.php';
	
	// Check connection
	if ($conn->connect_error) {
		# like return in C#
		# . is to concatenate
		die("Connection failed: " . $conn->connect_error);
	}
	
	// variables submited by user (POST - capitalized!!!)
	$ID = $_POST["ID"];
	$name = $_POST["name"];
	$lastModifiedDesktop = $_POST["lastModifiedDesktop"];
	$lastModifiedMobile = $_POST["lastModifiedMobile"];
	$lastModifiedServer = $_POST["lastModifiedServer"];
	
	// 1) check if the vmail exists in the table
	$sql = "SELECT `name` FROM `vmails` WHERE `ID` = '" . $ID . "'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) { // 2.1) if exists, update the date and time
		$sql2 = "UPDATE vmails SET ";
		$sql2 .= "name = '" . $name . "', ";
		$sql2 .= "lastModifiedDesktop = '" . $lastModifiedDesktop . "', ";
		$sql2 .= "lastModifiedMobile = '" . $lastModifiedMobile . "', ";
		$sql2 .= "lastModifiedServer = '" . $lastModifiedServer . "' ";
		$sql2 .= "WHERE ID = '" . $ID . "'";
		
		if ($conn->query($sql2) === TRUE) {
			echo $ID;
		} else {
			exit("Error: " . $sql2 . "<br>" . $conn->error);
		}
	} else { // 2.2) if does not exists
		exit("Error: no row with the ID");
	}
	
	$conn->close();
?>