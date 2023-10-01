<?php
	// variables submited by user (FILES - capitalized!!!)
	$file = $_FILES["file"];
	$dirPath = $_POST["dirPath"];
	
	if(isset($file))
	{
		// create the folders, if not existed
		if (!file_exists($dirPath)) { 
			if (!mkdir($dirPath, 0755, true)) {
				exit("-1: mkdir");
			}
		}

		if (!move_uploaded_file($file['tmp_name'], $dirPath . "/" . $file['name'])) {
			exit("-1: upload");
		}
	} else {
		exit("-1: isset");
	}
	
	echo "0";
?>