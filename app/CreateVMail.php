<?php
	require 'ConnectionSettings.php';
	
	// Check connection
	if ($conn->connect_error) {
		# like return in C#
		# . is to concatenate
		die("Connection failed: " . $conn->connect_error);
	}
	
	// variables submited by user (POST - capitalized!!!)
	$name = $_POST["name"];
	$lastModifiedDesktop = $_POST["lastModifiedDesktop"];
	$lastModifiedMobile = $_POST["lastModifiedMobile"];
	$lastModifiedServer = $_POST["lastModifiedServer"];
	
	// insert it into the table with the posted information
	$sql = "INSERT INTO vmails ";
	$sql .= "(name, lastModifiedDesktop, lastModifiedMobile, lastModifiedServer) ";
	$sql .= " VALUES ('" . $name . "', '" . $lastModifiedDesktop . "', '" . $lastModifiedMobile . "', '" . $lastModifiedServer . "');";
	
	if ($conn->query($sql) === TRUE) {
		echo $conn->insert_id;
	} else {
		exit("Error: " . $sql . "<br>" . $conn->error);
	}
	
	$conn->close();
?>