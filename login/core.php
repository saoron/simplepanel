<?

	//Instanciate the uFlex object
	include($dest.'class/class.uFlex.php');
	$user = new uFlex(false);

	//login system pupulate
	$user->db['host'] = $dbhost;
	$user->db['user'] = $dbuser;
	$user->db['pass'] = $dbpass;
	$user->db['name'] = $dbname; //Database name
	
	$user->start();
	include($dest."functions.php");
?>