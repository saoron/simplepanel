<?
class sqlConncet
{
    public $dbuser = "";
	public $dbpass = "";
	public $dbname = "";
	public $dbhost = "localhost"; //default
	public $db;

    public function sqlConncet($dbuser, $dbpass, $dbname, $dbhost)
    {
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
        $this->dbname = $dbname;
        $this->dbhost = $dbhost;
    }
	
	//open connection
	 public function connect()
    {
		$msconn = mysql_connect($this->dbhost, $this->dbuser, $this->dbpass) or die(mysql_error());
		$this->db = mysql_select_db($this->dbname, $msconn);
		mysql_query("SET character_set_client=utf8"); 
		mysql_query("SET character_set_connection=utf8"); 
		mysql_query("SET character_set_database=utf8"); 
		mysql_query("SET character_set_results=utf8"); 
		mysql_query("SET character_set_server=utf8"); 
	}
	
	//close connection
	public function close(){
	mysql_close($this->db);
	}
	//return query result
	public function query($sql){
		 mysql_query($sql) or die(mysql_error());
	}
	
}
?>