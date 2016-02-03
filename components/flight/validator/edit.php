<?php
	session_start();
	require_once('../../../class/class.include.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
	require_once($dest.'class/class.users.php');

	if(!$user->signed) echo $_SESSION['NoteMsgs'][0];
	
	//Proccess Update
	if(count($_POST)){
		$userdata = new Users($connection);
		$userdata->setUser(mysql_real_escape_string($_POST["id"]));
		if (!trim($_POST["password"])) unset($_POST["password"]);
		
		if(count($_POST)){
			//Update info
			if($user->updatedata($_POST,$connection, $userdata->id)) $_SESSION['NoteMsgs'][0] = "המידע עודכן בהצלחה!";
			//clead unnessey fields
			foreach($_POST as $name=>$val){
					if( $name != "email" &&
						$name != "username" &&
						$name != "password")
						unset($_POST[$name]);
			}
			
			$c=0;
			if (mysql_real_escape_string($_POST["email"])==$userdata->email) {unset($_POST["email"]);$c++;}
			if (mysql_real_escape_string($_POST["username"])==$userdata->username) {unset($_POST["username"]);$c++;}
			if (!mysql_real_escape_string($_POST["password"])) {unset($_POST["password"]);$c++;}
			if ($c<3)
			$user->update($_POST, $userdata->id);
		}else{
			//Nothing has changed
			$_SESSION['NoteMsgs'][0] = "No need to update!";
		}
		
		//If there are errors
		if($user->has_error()){
			//There were errors while updating information
			$_SESSION['NoteMsgs'] = $user->error();
		}elseif(count($_POST)){
			//Updates have been saved successfully!
			$_SESSION['NoteMsgs'][0] = "המידע עודכן בהצלחה!";
		}
	}
	echo $_SESSION['NoteMsgs'][0];
	//print_r($user->console);
?>
