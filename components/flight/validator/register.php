<?php
	session_start();
	require_once('../../../class/class.include.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
	require_once($dest.'class/class.users.php');
	//log 
	require_once($dest.'class/class.log.php');
		
	if(!$user->signed) echo $_SESSION['NoteMsgs'][0];
	
	//Proccess Registration
	if(count($_POST)){
	
		//Register User
		$registered = $user->register($_POST);
		if(!$registered){
			$_SESSION['NoteMsgs'] = $user->error();
			$_SESSION["regData"] = $_POST;
			echo $_SESSION['NoteMsgs'][0];
		}else{
			//populate data field
			$connection->connect();

			$user->insertdata($_POST,$connection,usertoid($_POST["username"]));
			$_SESSION['NoteMsgs'][] = "User Registered Successfully";
			$_SESSION['NoteMsgs'][] = "You may login now!";
				echo 1;
				
		//log this action
		$log = new Log($connection);
		$log->LogInsert("new User ".$_POST["username"]." was registered",$connection,0,$user->id);
		}
	}else{
		echo $_SESSION['NoteMsgs'][0];
	}
	
?>
