<?php
	require 'ConnectionSettings.php';
	
	// Check connection
	if ($conn->connect_error) {
		exit("-1");
	}
	
	// variables submited by user (POST - capitalized!!!)
	$name = $_POST["name"];
	$lastModifiedDesktop = $_POST["lastModifiedDesktop"];
	$lastModifiedMobile = $_POST["lastModifiedMobile"];
	$lastModifiedServer = $_POST["lastModifiedServer"];
	
	// insert it into the table with the posted information
	$query = "INSERT INTO vmails (name, lastModifiedDesktop, lastModifiedMobile, lastModifiedServer) VALUES (?,?,?,?);";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("ssss", $name, $lastModifiedDesktop, $lastModifiedMobile, $lastModifiedServer);
	$stmt->execute();

	echo $conn->insert_id;
	
	$conn->close();
?>