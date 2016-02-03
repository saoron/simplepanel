<?
class Log
{
    var $str = '';
    var $calander = '';

    public function Log($connection)
    {
	$connection->connect();
	$sql = "SELECT msg,dte FROM log ORDER BY dte DESC LIMIT 100";
	$query = mysql_query($sql) or die(mysql_error());;
	 while($row = mysql_fetch_array($query))
		$this->str .=$row["dte"]."      ".$row["msg"].'&#13;';
    }
	public function LogInsert($msg, $connection, $calander, $userid)
    {
		$connection->connect();
		$sql = "INSERT INTO log(msg, dte, calander, user) VALUES ('$msg',NOW(), '$calander', '$userid')" ;
		$connection->query($sql);
    }
	 public function __toString()
    {
       return $this->str;
    }

}
?>