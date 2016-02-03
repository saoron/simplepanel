<?php
	function aPrint($a){	
		echo "<pre>";
		print_r($a);
		echo "</pre>";
	}
	
	function p($txt,$s=3){
		if(is_array($txt)){
			aPrint($txt);
			return;
		}
		echo "<h{$s}>{$txt}</h{$s}>";
	}
	
	function redirect($url=false, $time = 0){
		$url = $url ? $url : $_SERVER['HTTP_REFERER'];
		
		if(!headers_sent()){
			if(!$time){
				header("Location: {$url}"); 
			}else{
				header("refresh: $time; {$url}");
			}
		}else{
			echo "<script> setTimeout(function(){ window.location = '{$url}' },". ($time*1000) . ")</script>";	
		}
	}
	
	function getVar($index){
		$tree = explode("/",@$_GET['path']);
		$tree = array_filter($tree);
		
		if(is_int($index)){
			$res = @$tree[$index-1];
		}else{
			$res = @$_GET[$index];
		}
		return $res;
	}
	
	function showMsg($index="NoteMsgs"){
		if(isset($_SESSION[$index])){
			if(!is_array($_SESSION[$index])) return;
			
			$res = "<ul>";
			foreach($_SESSION[$index] as $i=>$x){
				$res .= "<li>$x</li>";
			}
			$res .= "</ul>";
			
			unset($_SESSION[$index]);
			
			return $x;
		}
	}
	
	function maxArg($num){
		$tree = explode("/",@$_GET['path']);
		$tree = array_filter($tree);
		
		if(count($tree) > $num){
			send404();
		}
	}
	
	function send404(){
		if(!headers_sent()){			
			header("HTTP/1.0 404 Not Found");
			include("404.html");
			die();
		}else{
			redirect("404.html");
		}
	}
	//count time ago in nice way
	function time_elapsed_string($ptime) {
    $etime = time() - $ptime;
    
    if ($etime < 1) {
        return '0 seconds';
    }
    
    $a = array( 12 * 30 * 24 * 60 * 60  =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
                );
    
    foreach ($a as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . ' ' . $str . ($r > 1 ? 's' : '');
        }
    }
}
//converts userID to userName
function idtouser($id) {

$q = mysql_query("SELECT user_id,username FROM users WHERE user_id='$id' LIMIT 1") or die(mysql_error());;
       while($row = mysql_fetch_array($q)) 
		RETURN $row["username"];
RETURN $id;
	}
//converts userName to userID
function usertoid($uname) {

$q = mysql_query("SELECT user_id,username FROM users WHERE username='$uname' LIMIT 1") or die(mysql_error());;
       while($row = mysql_fetch_array($q)) 
		RETURN $row["user_id"];
RETURN $uname;
	}
	
function translate($str){

if ($str=='Sunday') return 'ראשון';
if ($str=='Monday') return 'שני';
if ($str=='Saturday') return 'שבת';
if ($str=='Friday') return 'שישי';
if ($str=='Thursday') return 'חמישי';
if ($str=='Wednesday') return 'רביעי';
if ($str=='Tuesday') return 'שלישי';

return $str;



}	
	//mssg system mail functions
Function divur ($to,$subject,$message) {

// subject
$subject = '=?UTF-8?B?'.base64_encode($subject).'?=';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";


$headers .= 'From: Support <admin@simple-webs.co.il>' . "\r\n";



// Mail it

if (!mail($to, $subject, stripslashes($message), $headers) ) 
	return false;
	else
	return true;

}	
//word wrap with cut
function Cut($string, $max_length){
    if (strlen($string) > $max_length){
        $string = substr($string, 0, $max_length);
        $pos = strrpos($string, " ");
        if($pos === false) {
                return substr($string, 0, $max_length)."...";
        }
            return substr($string, 0, $pos)."...";
    }else{
        return $string;
    }
}
function num($num){
	return  preg_replace("/[^0-9]/", '', $num);
}
function letter_en($str){
	return  preg_replace("/[^a-zA-Z]/", '', $str);
}

?>