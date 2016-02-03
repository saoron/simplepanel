<?
class Backup
{
	//Backup credentials
	var $connection='';
	var $id;
	var $name;
	var $dte;
	var $sug;
	var $hash;
	
	//set Backup connection
	    public function Backup($connection)
    {
		$this->connection = $connection->connect();
	}
	
		public function setBackup($id)
    {
		$this->id = mysql_real_escape_string($id);
		$query = mysql_query("SELECT * FROM backup WHERE id='$this->id' LIMIT 1 ") or die(mysql_error());;
		 while($row = mysql_fetch_array($query)) {
		$this->id = stripslashes($row["id"]);
		$this->name = stripslashes($row["fname"]);
		$this->dte = stripslashes($row["dte"]);
		$this->sug = stripslashes($row["sug"]);
		$this->hash = stripslashes($row["hash"]);
		}

    }
	
		
	
	
	

}
?>