<?
class Scraper
{
	//user data
    var $visitor_browser = '';
    var $visitor_hour = '';
    var $visitor_minute = '';
    var $visitor_date = '';
    var $visitor_refferer = '';
    var $visitor_page = '';


	//constructor
	    public function Scraper($connection)
    {
		$connection->connect();
		$this->visitor_ip = $this->getRealIpAddr();
		$this->visitor_browser = $this->agentToStr($this->agentToStr(mysql_real_escape_string($_SERVER['HTTP_USER_AGENT'])));
		$this->visitor_hour = date("H");
		$this->visitor_minute = date("i");
		$this->visitor_date = date("Y-m-d H:i:s");
		$this->visitor_refferer = mysql_real_escape_string($_SERVER['HTTP_REFERER']);
		$this->visitor_page = mysql_real_escape_string($_SERVER["REQUEST_URI"]);
		$sql = "INSERT INTO visitors_table (visitor_ip, visitor_browser, visitor_hour, visitor_minute, visitor_date, visitor_refferer, visitor_page)
									VALUES ('$this->visitor_ip', '$this->visitor_browser', '$this->visitor_hour', '$this->visitor_minute', '$this->visitor_date', '$this->visitor_refferer', '$this->visitor_page')";
		if ($this->visitor_page!='/favicon.ico')
		$connection->query($sql);
	}
	private function getRealIpAddr()
	{
	  if (!empty($_SERVER['HTTP_CLIENT_IP']))
	  //check ip from share internet
	  {
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	  }
	  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	  //to check ip is pass from proxy
	  {
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	  }
	  else
	  {
		$ip=$_SERVER['REMOTE_ADDR'];
	  }
	  return $ip;
	}
		private function agentToStr($str) 
	{

        $u_agent = $str;
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version= "";

        //First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        }
        elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        }
        elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }

        // Next get the name of the useragent yes separately and for good reason.
        if (preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        }
        elseif (preg_match('/Firefox/i',$u_agent))
        {
            $bname = 'Mozilla Firefox';
            $ub = "Firefox";
        }
        elseif (preg_match('/Chrome/i',$u_agent))
        {
            $bname = 'Google Chrome';
            $ub = "Chrome";
        }
        elseif (preg_match('/Safari/i',$u_agent))
        {
            $bname = 'Apple Safari';
            $ub = "Safari";
        }
        elseif (preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Opera';
            $ub = "Opera";
        }
        elseif (preg_match('/Netscape/i',$u_agent))
        {
            $bname = 'Netscape';
            $ub = "Netscape";
        }

        // Finally get the correct version number.
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }

        // See how many we have.
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
                $version= $matches['version'][0];
            }
            else {
                $version= $matches['version'][1];
            }
        }
        else {
            $version= $matches['version'][0];
        }

        // Check if we have a number.
        if ($version==null || $version=="") {$version="?";}

        $a =  array(
            'userAgent' => $u_agent,
            'name'      => $ub,
            'version'   => $version,
            'platform'  => $platform,
            'pattern'    => $pattern
        );
		return $a["name"];
    }

	
	
	
}
?>