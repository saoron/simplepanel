<?	
	//stats
	  require_once($dest.'class/class.scraper.php');
	  $statistics = new Scraper($connection); 
	  
	  require_once($dest.'class/class.statistics.php');
	  $stats = new Statistics($connection);
	  $visits = $stats->getData();
	  
?>