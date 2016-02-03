<?php
	session_start();
	require_once('../../../class/class.include.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
	require_once($dest.'class/class.users.php');
	//log 
	require_once($dest.'class/class.log.php');
	//photo
	require_once($dest.'class/class.photo.php');	
	
	if(!$user->signed) echo $_SESSION['NoteMsgs'][0];
	

			$photo = new Photo($connection);
			$pid = (int)($_POST["pid"]);
			$photo->SetPhoto($pid);
			if (unlink($dest.'gallery/'.$photo->father.'/'.$photo->fname)){
			$sql = "DELETE FROM photos WHERE id='$photo->id'";
			$connection->query($sql);
			//log this action
			$log = new Log($connection);
			$log->LogInsert("Photo ".$pid." was Deleted By:".$user->username."",$connection,0,$user->id);
			echo 1;
			
			}else{
			echo 0;	
		}
	
?>
