<?

class Services
{
	
	//DB
	private $connection;
	//user credentials
	
	//raugh data
    var $googleAnalytics = '';
    var $fb1 = '';
    var $fb2 = '';
	
	//icount
	var $icount_user;
	var $icount_pass;

	//***********************************//
	//****add more custom fileds here****//
	//*** DO NOT TOUCH ANY OTHER LINES***//
	//***********************************//
	


	
	//set new service
	    public function Services($connection)
    {
		$this->connection = $connection->connect();
	}
	//constructor
		public function setService()
    {
		$query = mysql_query("SELECT * FROM inc  WHERE id=1") or die(mysql_error());;
		 while($row = mysql_fetch_array($query)) 
		 $this->googleAnalytics = $row["code"];

		$query = mysql_query("SELECT * FROM inc  WHERE id=2") or die(mysql_error());;
		 while($row = mysql_fetch_array($query)) 
		 $this->fb1 = $row["code"];

		$query = mysql_query("SELECT * FROM inc  WHERE id=3") or die(mysql_error());;
		 while($row = mysql_fetch_array($query)) 
		 $this->fb2 = $row["code"];		 
 
 		$query = mysql_query("SELECT * FROM inc  WHERE id=4") or die(mysql_error());;
		 while($row = mysql_fetch_array($query)) 
		 $this->icount_user = $row["code"];		
		 
		$query = mysql_query("SELECT * FROM inc  WHERE id=5") or die(mysql_error());;
		 while($row = mysql_fetch_array($query)) 
		 $this->icount_pass = $row["code"];		

    }
		
}
?>