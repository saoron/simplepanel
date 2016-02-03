<?PHP
session_start();
	require_once('../../../class/class.include.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
	require_once($dest.'class/class.users.php');
	//gallery
	require_once($dest.'class/class.gallery.php');
	//log 
	require_once($dest.'class/class.log.php');
	if(!$user->signed) echo $_SESSION['NoteMsgs'][0];
	
	$connection->connect();
	
		parse_str($_POST['pages'], $pageOrder);
	foreach ($pageOrder['page'] as $key => $value) {
		$sql = "UPDATE photos SET sid = '$key' WHERE id = '$value'";
		$connection->query($sql);
	}
	
?>