<?PHP
session_start();

	require_once('../../../class/class.include.php');
	require_once('../../../class/class.log.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
	require_once($dest.'class/class.article.php');
	$connection->connect();
	
		$ttl = mysql_real_escape_string($_REQUEST["ttl"]);
		$root = mysql_real_escape_string($_REQUEST["root"]);
		$father = mysql_real_escape_string($_REQUEST["father"]);
		$sug = 0;// 0-article  1-gallery
	if ($ttl && $root && $father) {
			
		$sql = "INSERT INTO content(ttl,root,father,sug) VALUES ('$ttl','$root','$father','$sug')" or die("Error in $qry");
		$connection->query($sql);
		//return ajax last inserted id
		echo mysql_insert_id();
		//log this action
		$log = new Log($connection);
		$log->LogInsert("New article was added - $ttl ",$connection,1,$user->id);
	}
?>