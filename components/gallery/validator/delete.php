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
			//delete all photos from server
			$query = mysql_query("SELECT id,father,fname FROM photos WHERE father='$duid'  ") or die(mysql_error());;
			while($row = mysql_fetch_array($query)) 
				{
					if (unlink($dest.'gallery/'.$row["father"].'/'.$row["fname"])){
						$sql = "DELETE FROM photos WHERE id='".$row["id"]."'";
						$connection->query($sql);
					}
				}
			//remove gallery
			rmdir($dest.'gallery/'.$duid);
			$sql = "DELETE FROM gallery WHERE id='$duid'";
			$connection->query($sql);
			
			//log this action
			$log = new Log($connection);
			$log->LogInsert("Gallery ".$duid." was Deleted By:".$user->username."",$connection,0,$user->id);
			echo 1;
		}else{
			echo 0;	
		}
	
?>
