<?PHP
# ad88888ba  88                                88            88888888ba                                     88
#d8"     "8b ""                                88            88      "8b                                    88  
#Y8,                                           88            88      ,8P                                    88  
#`Y8aaaaa,   88 88,dPYba,,adPYba,  8b,dPPYba,  88  ,adPPYba, 88aaaaaa8P'  ,adPPYYba, 8b,dPPYba,   ,adPPYba, 88   
#  `"""""8b, 88 88P'   "88"    "8a 88P'    "8a 88 a8P_____88 88""""""'    ""     `Y8 88P'   `"8a a8P_____88 88
#        `8b 88 88      88      88 88       d8 88 8PP""""""" 88           ,adPPPPP88 88       88 8PP""""""" 88 
#Y8a     a8P 88 88      88      88 88b,   ,a8" 88 "8b,   ,aa 88           88,    ,88 88       88 "8b,   ,aa 88   
# "Y88888P"  88 88      88      88 88`YbbdP"'  88  `"Ybbd8"' 88           `"8bbdP"Y8 88       88  `"Ybbd8"' 88
#                                  88                                      
#                                  88                                     										
	
	# Simple content management.
	
	# @author     Yossi Neiman <saoron@gmail.com>
	# @version    2.0 1-3-2013
	# TO USE ON XX DOMAIN ONLY!!!
	
	
 require_once('class/class.include.php');
 $dest = new getDestination($_SERVER['REQUEST_URI']);
 require_once($dest.'login/core.php');
 if($user->signed) redirect("index.php");

 ?>
<!DOCTYPE html>
    <!-- head meta -->
	 <?require_once(dirname(__FILE__) . "/shadow/ie/ie_fix_head.php");?>

<html lang="en">
  
  <!--
<![endif]-->
  <head>
    <!-- head meta -->
	 <?require_once(dirname(__FILE__) . "/shadow/meta.php");?>
    <!-- head js/css -->
	 <?
	 require_once(dirname(__FILE__) . "/shadow/head.php");
	 	 $head_tag->insertHeader('<script src="'.$dest.'js/bootstrap.js"></script>'); //bootstrap
	 	 $head_tag->insertHeader('<script src="'.$dest.'js/bootbox.js"></script>'); //bootbox
	 //custom header goes here $head_tag->insertHeader('...');
	 $head_tag->sendHeader();
	 ?>
	 <script>	 </script>
  </head>

 <body style="background-image:url('img/background_linen.png');">

<?php
$msg = showMsg();
	if($msg){
	?>
	<script>
	$(function () {
	bootbox.alert('<?=$msg;?>');
	});
	</script>
	<?
	}
	?>
	<div class="login">
	 <a href="index.php" class="logo">
        <img src="img/logo.png" alt="logo" class="login_logo">
      </a>
		<h1>כניסה למערכת</h1>
		<hr class="hr-stylish-1">
		<form method="post" action="login/login.php">
		<div class="login_input">
		<div class="input-prepend">
			<span class="add-on"><span class="fs1" aria-hidden="true" data-icon=""></span></span>
			<input class="span2" name="username" value="guest" id="prependedInput" type="text" placeholder="Username">
		</div>
		<div class="input-prepend">
			<span class="add-on"> <span class="fs1" aria-hidden="true" data-icon=""></span></span>
			<input class="span2" name="password" value="123" id="prependedInput" type="password" placeholder="Password">
		</div>
		<div class="input-prepend">
			<span class="add-on"><img src="img/yubiright.gif" alt="yubikey"></span>
		<input class="span2" name="otp" id="prependedInput" type="password" placeholder="Insert YubiKey">
		</div>
		<div class="form-actions no-margin">
                        <button type="submit" class="btn btn-info bigbttn">
                        הכנס
                        </button>
                        <div class="clearfix">
                        </div>
                      </div>
		
		<h5 class="by_sml"><a target="_BLANK" href="http://simple-webs.co.il"/><img src="img/simple.png" alt="simple"/> by Simple</a></h5>
		</div>
		</form>
	</div>
  
  
  
  
</body>
</html>