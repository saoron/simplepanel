<?PHP
session_start();
	require_once('../../../class/class.include.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
	require_once($dest.'class/class.users.php');
	//article
	require_once($dest.'class/class.article.php');
	//mailer
	require_once($dest.'class/class.mailer.php');
	//log 
	require_once($dest.'class/class.log.php');
	if(!$user->signed) echo $_SESSION['NoteMsgs'][0];
	
	$connection->connect();
		
	$camp = new Mailer($connection);
	$userid =  (int)$_POST["uid"];
	$camp->SetCamp((int)$_POST["cid"]);
	$camp->StripUserFromList($userid);

?>