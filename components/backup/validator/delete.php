<?php
	require_once('../../../class/class.include.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
	require_once($dest.'class/class.users.php');
	require_once($dest.'class/class.log.php');
	
	
	$connection->connect();
	$hash = mysql_real_escape_string($_POST["id"]);
	$query = mysql_query("SELECT * FROM backup WHERE hash='$hash' LIMIT 1") or die(mysql_error());;
								while($row = mysql_fetch_array($query))
								{
								$file = '../backup/'.$row["fname"];
								unlink($file);
								$id = $row["id"];
								$sql = "DELETE FROM backup WHERE id='$id'";
								$connection->query($sql);
											//log this action
								$log = new Log($connection);
								$log->LogInsert("Backup from  ".$row["dte"]."-deleted By:".$user->username."",$connection,0,$user->id);
								
								}
	return mysql_affected_rows();

?>