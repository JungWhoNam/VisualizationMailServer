<?php
	require 'ConnectionSettings.php';

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	// select the variables from the table
	$sql = "SELECT `ID`, `name`, `lastModifiedDesktop`, `lastModifiedMobile`, `lastModifiedServer` FROM `vmails`";
	
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		// output data of each row
		$rows = array();
		while($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		echo json_encode($rows);
	} else {
		echo "0";
	}
	
	$conn->close();
?>