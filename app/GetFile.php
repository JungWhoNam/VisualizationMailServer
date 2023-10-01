<?php
	// variables submited by user (POST - capitalized!!!)
	$filePath = $_POST["filePath"];
	
	if (file_exists($filePath)) {
		echo file_get_contents($filePath);
	}
	else {
	    echo "-1";
	}
?>