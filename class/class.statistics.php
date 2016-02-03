<?
class Statistics
{
	//article credentials
    var $visits;
	
	var $connection;

	private $total= 1;
	
	//constructor
	    public function Statistics($connection)
    {
		$this->visits = array_fill(0, 32, 0);
		$this->connection = $connection->connect();
		$id = mysql_real_escape_string($id);
		$query = mysql_query("SELECT * FROM visitors_table WHERE visitor_date + INTERVAL 7 DAY >= NOW() ") or die(mysql_error());;
		 while($row = mysql_fetch_array($query)) 
			$this->visits[date("d",strtotime($row["visitor_date"]))]++;
		

	}
	//getter
	   public function getData()
    {
		return $this->visits;
	}
	public function GetStatOfBrowser($browser){
	if ($this->total==1){
	$query = mysql_query("SELECT * FROM visitors_table  ") or die(mysql_error());
	$this->total = mysql_num_rows($query);
	}
	
	$query = mysql_query("SELECT * FROM visitors_table WHERE visitor_browser = '$browser' ") or die(mysql_error());
	return  (mysql_num_rows($query)*100)/$this->total;
	}
	

}
?>