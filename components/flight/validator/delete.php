<?php
	session_start();
	require_once('../../../class/class.include.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
	require_once($dest.'class/class.users.php');
	//log 
	require_once($dest.'class/class.log.php');
	if(!$user->signed) echo $_SESSION['NoteMsgs'][0];
	
	$tmp_hash = new uFlex();
	if($tmp_hash->hash_pass($_POST["pass"])==$user->pass){
			$connection->connect();
			$duid = mysql_real_escape_string($_POST["duid"]);
			$sql = "DELETE FROM users WHERE user_id='$duid'";
			//$connection->query($sql);
			$sql = "DELETE FROM usersdat WHERE id='$duid'";
			//$connection->query($sql);
			//log this action
			$log = new Log($connection);
			$log->LogInsert("User ".$duid." was Deleted By:".$user->username."",$connection,0,$user->id);
			echo 1;
		}else{
			echo 0;	
		}
	
?>
