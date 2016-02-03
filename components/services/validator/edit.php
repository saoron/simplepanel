<?PHP
session_start();

	require_once('../../../class/class.include.php');
	require_once('../../../class/class.log.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
	require_once($dest.'class/class.article.php');
	
	$connection->connect();
	require_once($dest.'class/class.services.php');
	$services = new Services($connection);
	$services->setService();
	
		$services->googleAnalytics = mysql_real_escape_string($_REQUEST["google"]);
		$services->fb1 	= 			 mysql_real_escape_string($_REQUEST["fb1"]);
		$services->fb2 	= 			 mysql_real_escape_string($_REQUEST["fb2"]);
		$services->icount_user 	= 			 mysql_real_escape_string($_REQUEST["icount_user"]);
		$services->icount_pass 	= 			 base64_encode(mysql_real_escape_string($_REQUEST["icount_pass"]));
	

				$sql = "UPDATE inc SET code='$services->googleAnalytics' WHERE id=1";
		$connection->query($sql);
				$sql = "UPDATE inc SET code='$services->fb1' WHERE id=2";
		$connection->query($sql);
				$sql = "UPDATE inc SET code='$services->fb2' WHERE id=3";
		$connection->query($sql);
				$sql = "UPDATE inc SET code='$services->icount_user' WHERE id=4";
		$connection->query($sql);
				$sql = "UPDATE inc SET code='$services->icount_pass' WHERE id=5";
		$connection->query($sql);
		//log this action
		$log = new Log($connection);
		$log->LogInsert("Services Updated !",$connection,1,$user->id);
		


?>