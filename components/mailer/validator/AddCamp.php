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
	$art = new Article(92,$connection); //default 92 mail template
	
	$camp = new Mailer($connection);
	$title =  $_POST["ttl"];
	$dte =  $_POST["dte"];
	$time =  $_POST["time"];
	
	if (!$title) echo "-2"; 
	else if ($dte && $dte>=date("d/m/Y"))
	echo $camp->AddCamp($title, $dte, $time, $users='', html_entity_decode($art->body));
	else 
	echo "-1";
	
?>