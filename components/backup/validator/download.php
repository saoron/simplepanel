<?php
	require_once('../../../class/class.include.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
	require_once($dest.'class/class.users.php');
	
	
	$connection->connect();
	$hash = mysql_real_escape_string($_GET["id"]);
	$query = mysql_query("SELECT * FROM backup WHERE hash='$hash' LIMIT 1") or die(mysql_error());;
								while($row = mysql_fetch_array($query))
								{
								$file = '../backup/'.$row["fname"];
								}
	
	



if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
}

?>