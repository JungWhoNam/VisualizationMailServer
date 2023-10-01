<?php
	require 'ConnectionSettings.php';
	
	// check connection
	if ($conn->connect_error) {
		$conn->close();
		exit("-1");
	}
	
	// variables submited by user (POST - capitalized!!!)
	$ID = $_POST["ID"];
	$name = $_POST["name"];
	$lastModifiedDesktop = $_POST["lastModifiedDesktop"];
	$lastModifiedMobile = $_POST["lastModifiedMobile"];
	$lastModifiedServer = $_POST["lastModifiedServer"];
	
	// exits, if the vmail does not exist in the table
	$query = "SELECT name FROM vmails WHERE ID=?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("s", $ID);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
	if ($row == null) {
		$conn->close();
		exit("-1");
	}

	// otherwise, update the table
	$query = "UPDATE vmails SET name=?, lastModifiedDesktop=?, lastModifiedMobile=?, lastModifiedServer=? WHERE ID = ?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("sssss", $name, $lastModifiedDesktop, $lastModifiedMobile, $lastModifiedServer, $ID);
	$stmt->execute();
	
	echo $ID;

	$conn->close();
?>