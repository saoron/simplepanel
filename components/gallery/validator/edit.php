<?php
	session_start();
	require_once('../../../class/class.include.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
	require_once($dest.'class/class.users.php');
	//gallery
	require_once($dest.'class/class.gallery.php');
	//log 
	require_once($dest.'class/class.log.php');
	if(!$user->signed) echo $_SESSION['NoteMsgs'][0];
	

			$connection->connect();
						
			$gal = new Gallery($connection);
			$gal->editGalleryTxt($_POST["id"], $_POST["ttl"], $_POST["desc"], $_POST["keyw"]);
		
			//log this action
			$log = new Log($connection);
			$log->LogInsert("Gallery ".$duid." text  was Updated By:".$user->username."",$connection,0,$user->id);
			
			
			echo mysql_affected_rows();
		
	
?>
