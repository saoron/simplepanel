<?
class Article
{
	//article credentials
    var $id = '';
    var $ttl = '';
    var $body = '';
    var $root = '';
    var $father = '';
	//meta tags
    var $meta_ttl = '';
    var $meta_description = '';
    var $meta_keywords = '';

	
	//set article by id 
	    public function Article($id,$connection)
    {
		$connection->connect();
		$id = mysql_real_escape_string($id);
		$query = mysql_query("SELECT * FROM content WHERE id='$id' LIMIT 1 ") or die(mysql_error());;
		 while($row = mysql_fetch_array($query)) 
		$this->setArticle(stripslashes($row["id"]), stripslashes($row["ttl"]), html_entity_decode(stripslashes($row["body"])), stripslashes($row["root"]), stripslashes($row["father"]), stripslashes($row["title"]), stripslashes($row["description"]), stripslashes($row["keyword"]));
	}
	
		private function setArticle($id, $ttl, $body, $root, $father, $meta_ttl, $meta_description, $meta_keywords )
    {
		$this->id = stripslashes($id);
		$this->ttl = stripslashes($ttl);
		$this->body = stripslashes($body);
		$this->root = stripslashes($root);
		$this->father = stripslashes($father);
		$this->meta_ttl = stripslashes($meta_ttl);
		$this->meta_description = stripslashes($meta_description);
		$this->meta_keywords = stripslashes($meta_keywords);
    }
		//add new article to father
		public function editArticle($id, $ttl, $body, $root, $meta_ttl, $meta_description, $meta_keywords, $connection)
    {
		$connection->connect();
		$this->id = mysql_real_escape_string($id);
		$this->ttl = mysql_real_escape_string($ttl);
		$this->body = mysql_real_escape_string($body);
		$this->root = mysql_real_escape_string($root);
		$this->meta_ttl = mysql_real_escape_string($meta_ttl);
		$this->meta_description = mysql_real_escape_string($meta_description);
		$this->meta_keywords = mysql_real_escape_string($meta_keywords);
		$sql = "UPDATE content SET root='$this->root', ttl='$this->ttl', title='$this->meta_ttl', description='$this->meta_description', keyword='$this->meta_keywords', body='$this->body' WHERE id='$this->id'";
		$connection->query($sql);
    }
	
		//get article data
	    public function tag($data)
    {
		return $this->$data;
	
	}
			//get article data
	    public function haveChildern($id)
    {
		$connection = new sqlConncet($dbuser, $dbpass, $dbname, $dbhost);
			$query = mysql_query("SELECT * FROM content WHERE father='$id' LIMIT 1 ") or die(mysql_error());;
		 while($row = mysql_fetch_array($query)) 
			return true;
			
		return false;
	}
	//add actions
		public function addActions($id,$type)
	{
		($type!=2)?$actions =	'<img id="add'.$id.'" class="add" val="'.$id.'" src="../../img/tree/add.png" alt="add" />':'';
		$actions .= '<img id="add'.$id.'" class="del" val="'.$id.'" src="../../img/tree/del.png" alt="delete" />';
		if ($this->haveChildern($id))
			$actions.='<img id="col'.$id.'" class="col" val="'.$id.'" src="../../img/tree/collapse.png" alt="collapse" />';
			
		return $actions;
		
	}
	

}
?>