<?
class Calendar
{
	//Calendar credentials
    var $id = '';
    var $name = '';
    var $day = '';
    var $month = '';
    var $year = '';
	//connection
	private $connection;
	
	//set Calendar 
	    public function Calendar($connection)
    {
		$this->connection = $connection;
	}
	
		public function GetEvents()
    {
		$s = '';
		$this->connection->connect();
		$query = mysql_query("SELECT * FROM log WHERE calander='1' ORDER BY dte DESC LIMIT 100") or die(mysql_error());;
		 while($row = mysql_fetch_array($query)) {
		 $this->day = date("d",strtotime($row["dte"]));
		 $this->month = date("m",strtotime($row["dte"]));
		 $this->year = date("Y",strtotime($row["dte"]));
			$s .="{title: '".$row["msg"]."', start: new Date(".$this->year.", ".((int)$this->month - 1).", ".$this->day.")}, ";
			
		}
		
		return $s;
    }
		

}
?>