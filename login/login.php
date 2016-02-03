<?php
	require_once('../class/class.include.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'/config.php');
	include($dest."login/core.php");
	//yubikey
	include($dest."class/class.yubikey.php");
	//users
	include($dest."class/class.users.php");
	//yubi api credantials
	$apiID = 7908;
	$signatureKey = "t8xIHJoE9BU9QMnHh/GB7g2JdE8=";
	
	
	//Proccess Login
	if(count($_POST)){
		//get data
		$username = isset($_POST['username']) ? $_POST['username'] : false;
		$password = isset($_POST['password']) ? $_POST['password'] : false;
		$otp = preg_replace("/[^a-z0-9]/", '',strtolower($_POST['otp']));
		
		$tmp_user_data = new Users($connection);
		$tmp_user_data->setUser($tmp_user_data->usertoid($username));
		
		$token = new Yubikey($apiID, $signatureKey);

		$token->setCurlTimeout(20);
		$token->setTimestampTolerance(500);

		if (($tmp_user_data->yubiotp == substr ($otp, 0, 12) &&  $token->verify($otp) || !$tmp_user_data->yubiotp) )
		{
			$user->login($username,$password,false);
			if($user->has_error()){
				$_SESSION['NoteMsgs'] = $user->error();
			}
		}
		else
		{

			$_SESSION['NoteMsgs'] = array("כרטיס ההצפנה לא אישר מעבר לדף הבא , אנא וודא שהכרטיס שבבעלותך הינו הכרטיס הנכון.");
		}
		
		
		
	}

	redirect();
?>
