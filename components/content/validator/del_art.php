<?PHP
session_start();

	require_once('../../../class/class.include.php');
	require_once('../../../class/class.log.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
	require_once($dest.'class/class.article.php');
	$connection->connect();
	
		$aid = mysql_real_escape_string($_REQUEST["aid"]);

	if ($aid) {
		$sql = "DELETE FROM content WHERE id='$aid'  ";
		$connection->query($sql);	
		$sql = "DELETE FROM content WHERE father='$aid'  ";
		$connection->query($sql);
		echo $aid;
		//log this action
		$log = new Log($connection);
		$log->LogInsert("Article was just deleted id - $aid ",$connection,1,$user->id);
	}
	
?>