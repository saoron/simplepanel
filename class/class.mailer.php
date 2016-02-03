<?
class Mailer
{
	//Mailer credentials
    var $id = '';
    var $group_id = '';
    var $title = '';
    var $body = '';
    var $dte ;
    var $users ;
	
	//connection
	private $connection;
	
	//set article by id 
	    public function Mailer($connection)
    {
		$this->connection = $connection;
	}
	
		public function AddCamp($title, $dte, $time, $users='', $body)
    {
		$this->connection->connect();
		
		$this->users = preg_replace("/[^0-9;]/", '',mysql_real_escape_string($users));
		$this->title = mysql_real_escape_string($title);
		$this->body = mysql_real_escape_string($body);
		//date
		$d = date('Y-m-d', strtotime($dte));
		$t = date('H:i:s', strtotime($time));
		$this->dte = date('Y-m-d H:i:s', $d . ' ' . $t);
		//add photo
		$sql = "INSERT INTO mailer (users, title, body, dte) VALUES ('$this->users', '$this->title', '$this->body', '$this->dte' )";
		$this->connection->query($sql);
		return mysql_insert_id();

    }
			
		public function SetCamp($id)
    {
		$this->connection->connect();
		$this->id = mysql_real_escape_string($id);
				$query = mysql_query("SELECT * FROM mailer WHERE id = '$this->id'  LIMIT 1 ") or die(mysql_error());;
			while($row = mysql_fetch_array($query)) {
		 
				$this->users = $this->Prep($row["users"]);
				$this->title = $this->Prep($row["title"]);
				$this->body = $this->Prep($row["body"]);
				$this->dte = $row["dte"];
		
			}

    }	
		public function RemoveCamp($id)
    {
		$this->connection->connect();
		$sql = "DELETE FROM mailer WHERE id='$id'";
		$this->connection->query($sql);

    }	

		private function Prep($str)
	{
		return stripslashes(htmlspecialchars($str));
		
	}
		//append new group to campign
		public function appendGroup($gid, $cid)
    {
		$this->connection->connect();
		$this->SetCamp($cid);
		$gid = (int)mysql_real_escape_string($gid);
		$cid = (int)mysql_real_escape_string($cid);
		$this->users = $this->users.$this->GetGroupDelimited($gid);
		$this->users = $this->uniqueusers($this->users);
		$sql = "UPDATE mailer SET users='$this->users' WHERE id='$cid'";
		$this->connection->query($sql);
    }
		//return group users dlimited by ;
		public function GetGroupDelimited($gid)
    {
		$this->connection->connect();
		$gid = (int)mysql_real_escape_string($gid);

			switch($gid){
			case ($gid==1):
			$query = mysql_query("SELECT * FROM users WHERE group_id = '1'  ") or die(mysql_error());
			break;
			case ($gid==2):
			$query = mysql_query("SELECT * FROM users WHERE activated = '1' AND group_id!='1' ") or die(mysql_error());
			break;
			case ($gid==3):
			$query = mysql_query("SELECT * FROM users WHERE activated = '0' AND group_id!='1'  ") or die(mysql_error());
			break;
			}
			$s='';
			while($row = mysql_fetch_array($query)) {
				$s .=';'.$row["user_id"];
			}
			return $s.';';
    }
	//parse sting return user id'set
	public function ParseUsers($users){
		$s='<div id="group_5" style="float:right;text-align:left;">';
		$users = explode(";",$users);
			foreach($users as &$value)
				$s .= $this->RetLable($value);
		return $s."</div>";
	}
	
	
	//return beutiful logo of users in mailing list
	public function RetLable($userId){
		$query = mysql_query("SELECT * FROM users WHERE user_id = '$userId' LIMIT 1 ") or die(mysql_error());
			while($row = mysql_fetch_array($query)) {

				if ($row["group_id"]==1)
				$type= "info";
				else if ($row["activated"] == 1 && $row["group_id"]!=1)
				$type= "warning";
				else if ($row["activated"] == 0 && $row["group_id"]!=1)
				$type= "danger";
				
				return '<span class="label label-'.$type.'"><span value="'.$row["user_id"].'" class="fss1 fs1 left" aria-hidden="true" data-icon=""></span><label>'.$row["email"].'</label></span>';
			}

	}
		public function uniqueusers($users)
	{
		$s = '';
		$tmp_arr = explode(";",$users);
		$tmp_arr = array_unique($tmp_arr);
			foreach($tmp_arr as &$value)
				$s .=";".$value;
		return $s.';';
	}
	//remove user from object list of recivers
		public function StripUserFromList($userid)
	{
		$s = '';
		$tmp_arr = explode(";",$this->users);
			foreach($tmp_arr as &$value)
				if ($value && $value!=$userid)
					$s .=";".$value;
			$this->users = $s.';';
		$sql = "UPDATE mailer SET users='$this->users' WHERE id='$this->id'";
		$this->connection->query($sql);
	
	}
	

}
?>