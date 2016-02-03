<?
class Header
{
    private $header;
	
    public function Header()
    {
        $this->header = '';
    }
    public function insertHeader($tag)
    {
        $this->header .= $tag;
    }
	 public function sendHeader()
    {
       echo $this->header;
    }


}
?>