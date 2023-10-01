<?php
	// variables submited by user (POST - capitalized!!!)
	$ID = $_POST["ID"];
  
	$cnt = 0;
    while ($cnt < 100) {
        $filePath = dirname(__FILE__) . '/data/' . $ID . '/' . $cnt . '.png';
        
        if (!file_exists($filePath)) {
          break;
        }
        
        $cnt += 1;
    }
    
    echo $cnt;
?>