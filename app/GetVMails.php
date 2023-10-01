<?php
	require 'ConnectionSettings.php';

	// check connection
	if ($conn->connect_error) {
		exit("-1");
	}

	// select the variables from the table
	$sql = "SELECT ID, name, lastModifiedDesktop, lastModifiedMobile, lastModifiedServer FROM vmails";
	$result = $conn->query($sql);

	$rows = array();
	while($row = $result->fetch_assoc()) {
		$rows[] = $row;
	}
	echo json_encode($rows);

	$conn->close();
?>