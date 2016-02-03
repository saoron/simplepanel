<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolder = '/clients/huji/uploads'; // Relative to the root
$cfile = preg_replace('/^[0-9]+\_ */', '', $_POST['filename']);
if (file_exists($_SERVER['DOCUMENT_ROOT'] . $targetFolder . '/' . $cfile)) {
	echo 1;
} else {
	echo 0;
}
?>