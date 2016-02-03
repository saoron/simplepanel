<?PHP
session_start();

	require_once('../../../class/class.include.php');
	require_once('../../../class/class.log.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
	require_once($dest.'class/class.gallery.php');
	$connection->connect();
	
		$ttl = mysql_real_escape_string($_POST["ttl"]);
		$desc = mysql_real_escape_string($_POST["desc"]);
		$keywords = mysql_real_escape_string($_POST["keyw"]);

	if ($ttl) {
			
		$sql = "INSERT INTO gallery(ttl, meta_description, meta_keyword) VALUES ('$ttl','$desc', '$keywords')" or die("Error in $qry");
		$connection->query($sql);
		//return ajax last inserted id
		echo mysql_insert_id();
		//log this action
		$log = new Log($connection);
		$log->LogInsert("New gallery was added - $ttl ",$connection,1,$user->id);

	}
?>