<?php
	// variables submited by user (POST - capitalized!!!)
	$dirPath = $_POST["dirPath"];
	
	if (!file_exists($dirPath) || !is_dir($dirPath)) {
		echo "";
	}
	else {
		// get the list of files in the directory
		$files = scandir($dirPath);
		// remove the current and the parent directories from the array
		$files = array_diff($files, array('.', '..'));
		//print_r($files);
		
		$results = "";
		foreach ($files as &$file) {
			$results .= $file . ',';
		}
		if (!empty($results)) {
			$results = rtrim($results, ',');
		}
		
		echo $results;
	}
?>