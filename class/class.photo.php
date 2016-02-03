<?
class Photo
{
	//Photo credentials
    var $id = '';
    var $sid = '';
    var $alt = '';
    var $fname = '';
    var $father = '';
	//connection
	private $connection;
	
	//set article by id 
	    public function Photo($connection)
    {
		$this->connection = $connection;
	}
	
		public function AddPhoto($fname, $alt, $father)
    {
		$this->connection->connect();
		$this->fname = stripslashes($fname);
		$this->alt = stripslashes($alt);
		$this->father = stripslashes($father);
		$this->sid = $this->getNextSid();
		//add photo
		$sql = "INSERT INTO photos (sid, fname, alt, father) VALUES ('$this->sid', '$this->fname', '$this->alt', '$this->father')";
		$this->connection->query($sql);
		$this->id = mysql_insert_id();
		return $this->id;
    }
	//init photo
		public function SetPhoto($pid)
    {
	$this->connection->connect();
	$this->id  = $pid;
	
	$query = mysql_query("SELECT * FROM photos WHERE id='$this->id'") or die(mysql_error());;
		 while($row = mysql_fetch_array($query))
		 {
		 $this->sid = $row["sid"];
		 $this->alt = $row["alt"];
		 $this->fname = $row["fname"];
		 $this->father = $row["father"];
		 }
	}
		private function getNextSid()
    {
		$query = mysql_query("SELECT sid,father FROM photos WHERE father='$this->father' ORDER BY sid DESC  ") or die(mysql_error());;
		 while($row = mysql_fetch_array($query))
		 {
			return $row["sid"]+1;
		 }
		return 0;
    }

}
?>