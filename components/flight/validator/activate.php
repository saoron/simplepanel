<?php
	session_start();
	require_once('../../../class/class.include.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
	require_once($dest.'class/class.users.php');
	//log 
	require_once($dest.'class/class.log.php');
	if(!$user->signed) echo $_SESSION['NoteMsgs'][0];
	

		$connection->connect();
		
		$uid = mysql_real_escape_string($_POST["uid"]);
		$hash = mysql_real_escape_string($_POST["hash"]);

		$sql = "UPDATE users SET activated='1', confirmation='' WHERE confirmation='$hash' AND user_id='$uid'";
		$connection->query($sql);
		echo mysql_affected_rows();
		 
		 
	
	
?>
