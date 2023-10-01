<?php	
	// variables submited by user (POST - capitalized!!!)
	$ID = $_POST["ID"]; // a vmail ID
	$trackingID = $_POST["trackingID"]; // ID within a vmail ID
	
	// 0) check if vmail with ID exists
	$dirPathFrom = "data/" . $ID;
	$subDirPathFrom = $dirPathFrom . "/thumbnails";
	
	if (!file_exists($dirPathFrom)) {
		exit("-1: dirPathFrom does not exist. " . $dirPathFrom);
	}
	if (!file_exists($subDirPathFrom)) {
		exit("-1: subDirPathFrom does not exist. " . $subDirPathFrom);
	}
	
	// 1) create a vmail directory based on ID and trackingID
	$dirPathTo = "data/saved/" . $ID . "_" . $trackingID;
	$subDirPathTo = $dirPathTo . "/thumbnails";
	
	if (!file_exists($dirPathTo)) { 
		if (!mkdir($dirPathTo, 0755, true)) {
			exit("-1: dirPathTo mkdir");
		}
	}
	if (!file_exists($subDirPathTo)) { 
		if (!mkdir($subDirPathTo, 0755, true)) {
			exit("-1: subDirPathTo mkdir");
		}
	}
	
	// 2) copy msg.json to the new vmail directory
	if (!copy($dirPathFrom . "/msg.json", $dirPathTo . "/msg.json")) {
		exit("-1: failed to copy msg.json");
	}
	
	// 3) copy each file in the "thumbnails" directory
	$fileNames = array_diff(scandir($subDirPathFrom), array('..', '.'));
	foreach ($fileNames as &$fileName) {
		copy($subDirPathFrom . "/" . $fileName, $subDirPathTo . "/" . $fileName);
	}
	
	echo $ID;
?>


