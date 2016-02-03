<?PHP
	require_once($dest.'/config.php');
	require_once($dest.'login/core.php');
	//If user is not signed in refirect
	if(!$user->signed) redirect($dest."login.php");
?>