<?PHP
session_start();

	require_once('../../../class/class.include.php');
	require_once('../../../class/class.log.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
	require_once($dest.'class/class.article.php');
	$connection->connect();
	
		$aid = mysql_real_escape_string($_REQUEST["aid"]);
		$ttl = mysql_real_escape_string($_REQUEST["ttl"]);
		$root = mysql_real_escape_string($_REQUEST["root"]);
		$body = htmlspecialchars($_REQUEST["bdy"]);
		$meta_ttl = mysql_real_escape_string($_REQUEST["meta_ttl"]);
		$meta_description = mysql_real_escape_string($_REQUEST["meta_description"]);
		$meta_keywords = mysql_real_escape_string($_REQUEST["meta_keywords"]);
	
	if ($aid) {
		$art  = new Article($aid,$connection);
		$art->editArticle($aid, $ttl, $body, $root, $meta_ttl, $meta_description, $meta_keywords, $connection );
				//log this action
		$log = new Log($connection);
		$log->LogInsert("Article -$ttl - was edited",$connection,0,$user->id);
	}

?>