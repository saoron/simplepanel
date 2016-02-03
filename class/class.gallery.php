<?
class Gallery
{
	//article credentials
    var $id = '';
    var $ttl = '';
    var $pic = '';
    var $father = '';
	//meta tags
    var $meta_ttl = '';
    var $meta_description = '';
    var $meta_keywords = '';

	private $connection;
	
	//set gallery object
	    public function Gallery($connection)
    {
		$this->connection = $connection;
		
	}
	
		public function setGallery($id)
    {
		$query = mysql_query("SELECT * FROM gallery WHERE id='$id' LIMIT 1 ") or die(mysql_error());;
		 while($row = mysql_fetch_array($query)) {
			$this->id = stripslashes($row["id"]);
			$this->ttl = stripslashes($row["ttl"]);
			$this->pic = $this->randPhoto();
			$this->father = stripslashes($row["father"]);
			$this->meta_ttl = stripslashes($row["meta_title"]);
			$this->meta_description = stripslashes($row["meta_description"]);
			$this->meta_keywords = stripslashes($row["meta_keyword"]);
		}
			
    }
		//edit gallery full
		public function editGallery($id, $ttl, $pic, $meta_ttl, $meta_description, $meta_keywords)
    {
		$this->connection->connect();
		$this->id = mysql_real_escape_string($id);
		$this->ttl = mysql_real_escape_string($ttl);
		$this->pic = mysql_real_escape_string($pic);
		$this->meta_ttl = mysql_real_escape_string($meta_ttl);
		$this->meta_description = mysql_real_escape_string($meta_description);
		$this->meta_keywords = mysql_real_escape_string($meta_keywords);
		$sql = "UPDATE gallery SET ttl='$this->ttl', meta_title='$this->meta_ttl', meta_description='$this->meta_description', meta_keywords='$this->meta_keywords', pic='$this->pic' WHERE id='$this->id'";
		$this->connection->query($sql);
    }
		//edit gallery full
		public function editGalleryTxt($id, $ttl, $meta_description, $meta_keywords)
    {
		$this->connection->connect();
		$this->id = mysql_real_escape_string($id);
		$this->ttl = mysql_real_escape_string($ttl);
		$this->meta_description = mysql_real_escape_string($meta_description);
		$this->meta_keywords = mysql_real_escape_string($meta_keywords);
		$sql = "UPDATE gallery SET ttl='$this->ttl', meta_description='$this->meta_description', meta_keyword='$this->meta_keywords' WHERE id='$this->id'";
		$this->connection->query($sql);
    }	
		//get random pic of father
		private function randPhoto()
    {
		$this->connection->connect();
		$query = mysql_query("SELECT * FROM photos WHERE father='$this->id' ORDER BY RAND() LIMIT 1 ") or die(mysql_error());;
			while($row = mysql_fetch_array($query)) 
			{
				return $this->pic = stripslashes($row["fname"]);
			}
    }	
	

}
?>