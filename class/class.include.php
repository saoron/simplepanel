<?
class getDestination
{
    private $current = '';
	private $panelFolder =""; // change this by the simplepanel folder name

    public function getDestination($file)
    {
		$delim = '';
		$s= explode("/",$file);
		$arr_cout = count($s);
		for ($i=0;$i<$arr_cout;$i++)
			if ($s[$i]==$panelFolder)
				break;
		
	
		for ($c=$i;$c<$arr_cout-2;$c++)
			$delim .='../';
        $this->current = $delim;
    }
	 public function __toString()
    {
       return $this->current;
    }

}
?>