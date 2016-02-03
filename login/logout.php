<?php
	require_once('../class/class.include.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'/config.php');
	include($dest."login/core.php");
	
	$user->logout();
	
	$_SESSION["NoteMsgs"][] = "ההתנתקות בוצעה בהצלחה.";
	
	redirect("../");	
?>
