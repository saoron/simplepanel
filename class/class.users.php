<?

class Users
{
	
	//DB
	private $connection;
	//user credentials
	
	//ragh data
    var $id = '';
    var $username = '';
    var $password = '';
    var $email = '';
    var $activated = '';
    var $regdate = '';
    var $lastlogin = '';
    var $groupid = '';
	var $confirmation='';
	//user data
	var $name='';
	var $faname='';
	var $address='';
	var $phone='';
	var $web='';
	var $img='';
	//key
	var $yubiotp='';
	
	//***********************************//
	//****add more custom fileds here****//
	//*** DO NOT TOUCH ANY OTHER LINES***//
	//***********************************//
	


	
	//set new user
	    public function Users($connection)
    {
		$this->connection = $connection->connect();
		
	}
	//constructor
		public function setUser($id)
    {
		
		$this->id = mysql_real_escape_string($id);
		$query = mysql_query("SELECT * FROM users,usersdat WHERE users.user_id = usersdat.id   AND users.user_id='$this->id' LIMIT 1 ") or die(mysql_error());;
		 while($row = mysql_fetch_array($query)) {
			//raugh data
		 $this->username = $row["username"];
		 $this->password = $row["password"];
		 $this->email = $row["email"];
		 $this->activated = $row["activated"];
		 $this->regdate = $row["reg_date"];
		 $this->lastlogin = $row["last_login"];
		 $this->groupid = $row["group_id"];
		 $this->name = $this->Prep($row["name"]);
		 $this->faname = $this->Prep($row["faname"]);
		 $this->address = $this->Prep($row["adress"]);
		 $this->phone = $this->Prep($row["phone"]);
		 $this->web = $this->Prep($row["web"]);
		 $this->img = $row["img"];
		 $this->yubiotp = $row["yubiId"];
		 
		 }
		 
		 

    }
		//add new article to father
		public function editUser($id, $username, $password, $name, $faname, $address, $phone, $web, $img, $yubi)
    {
		
		 $this->id = mysql_real_escape_string($id);
		 $this->username = mysql_real_escape_string($username);
		 $this->password = mysql_real_escape_string($password);
		 $this->email =    mysql_real_escape_string($email);
		 $this->name = 	   mysql_real_escape_string($name);
		 $this->faname =   mysql_real_escape_string($faname);
		 $this->address =  mysql_real_escape_string($address);
		 $this->phone =    mysql_real_escape_string($phone);
		 $this->web = 	   mysql_real_escape_string($web);
		 $this->img =      mysql_real_escape_string($img);
		 $this->yubiotp =      mysql_real_escape_string($yubi);
	
		$sql = "UPDATE usersdat SET name='$this->name', faname='$this->faname', adress='$this->address', phone='$this->phone', web='$this->web', img='$this->img', yubiId='$this->yubiotp' WHERE id='$this->id'";
		$connection->query($sql);
    }
	
		//converts userName to userID
		public function usertoid($uname)
	{
		
		$q = mysql_query("SELECT user_id,username FROM users WHERE username='$uname' LIMIT 1") or die(mysql_error());;
		   while($row = mysql_fetch_array($q)) 
				RETURN $row["user_id"];
		RETURN $uname;
	}
		private function Prep($str)
	{
		return stripslashes(htmlspecialchars($str));
		
	}

}
?>