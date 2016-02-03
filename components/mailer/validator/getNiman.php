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
	$sug = (int)$_POST["mid"];
	
	$mail = new Mailer($connection);
	$mail->SetCamp((int)$_POST["cid"]);
	
	$s='<div id="group_'.$sug.'" style="float:right;text-align:left;">';
	
	switch($sug){
		case ($sug==1):
		$query = mysql_query("SELECT * FROM users WHERE group_id = '1'  ") or die(mysql_error());
		$type= "info";
		break;
		case ($sug==2):
		$query = mysql_query("SELECT * FROM users WHERE activated = '1' AND group_id!='1' ") or die(mysql_error());
		$type= "warning";
		break;
		case ($sug==3):
		$query = mysql_query("SELECT * FROM users WHERE activated = '0' AND group_id!='1'  ") or die(mysql_error());
		$type= "danger";
		break;
	}
		
			while($row = mysql_fetch_array($query)) {
				$tmp_users = explode(";",$mail->users);		
				if(!in_array($row["user_id"], $tmp_users))
					$s.=  '<span class="label label-'.$type.'"><span value="'.$row["user_id"].'" class="fss1 fs1 left" aria-hidden="true" data-icon=""></span><label>'.$row["email"].'</label></span>';
			}	
				echo $s."</div>";
	
?>