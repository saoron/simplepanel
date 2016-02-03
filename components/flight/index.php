<?PHP
session_start();
	require_once('../../class/class.include.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
	require_once('../../class/class.users.php');
	
	//stats
	require_once($dest.'shadow/scraper/index.php');
	
	//set Imap
	require_once('assats/SetImap.php');
 ?>
<!DOCTYPE html>
    <!-- head meta -->
	 <?include $dest.'shadow/ie/ie_fix_head.php';?>

<html lang="en">
  
  <!--
<![endif]-->
  <head>
    <meta charset="utf-8">
    <!-- head meta -->
	 <?include $dest.'shadow/meta.php';?>
    <!-- head js/css -->
	 <?
	 include $dest."/shadow/head.php";
	 $head_tag->insertHeader('<link rel="stylesheet" type="text/css" media="screen, print" href="'.$dest.'css/jquery-ui-1.10.2.custom.css" />'); //jqury ui css
	 $head_tag->insertHeader('<link rel="stylesheet" type="text/css" media="screen, print" href="'.$dest.'components/flight/app/css/custom.css" />'); //jqury ui css
	 $head_tag->insertHeader('<script src="'.$dest.'js/jquery-ui-1.10.2.custom.js"></script>'); //jqueryui
	 $head_tag->insertHeader('<script src="'.$dest.'components/flight/assats/js/flight.js"></script>'); //flight js
	 $head_tag->insertHeader('<script src="'.$dest.'components/flight/assats/js/purl.js"></script>'); //purl js
	 $head_tag->insertHeader('<script src="'.$dest.'js/bootbox.js"></script>'); //bootbox
	 $head_tag->sendHeader();
	 ?>
  </head>
  <body>
    <header>
     <!-- head  -->
	 <?include $dest.'shadow/header/header.php';?>
    </header>
    <div class="container-fluid">
      <div class="dashboard-container">
        
        <div class="dashboard-wrapper">
          <div class="left-sidebar">
            
          
            <div class="row-fluid">
               <div class="span12">
			    <div class="widget">
                  <div class="widget-header">
				    <span class="tools">
                      <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
                    </span>
                    <div class="title">
                     הודעות
                    </div>
                  </div><br>
				<?include 'assats/flight.php';?>
				</div>
				</div>
            </div>
            
         	
	<!-- promt box -->
<div id="promt" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">מחיקת משתמש</h3>
  </div>
  <div class="modal-body">
   <p>&nbsp;&#1492;&#1504;&#1498; &#1506;&#1493;&#1502;&#1491; &#1500;&#1502;&#1495;&#1493;&#1511; &#1488;&#1514; &#1492;&#1502;&#1513;&#1514;&#1502;&#1513;<span lang="he">. 
&#1500;&#1492;&#1502;&#1513;&#1498; &#1492;&#1499;&#1504;&#1505; &#1505;&#1497;&#1505;&#1502;&#1514;&#1498;? </span>
<input type="password" id="password_check" size="9" class="admin_pass"></p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">ביטול</button>
    <button id="del_user" class="btn btn-danger">מחק</button>
  </div>
</div>

            
          </div>
          
          <div class="right-sidebar">
            
                       
			<div class="wrapper">
					  <div class="sidebar-nav rtl">
						<button id="new_mail" class="btn btn-large btn-warning2 btn-block full" data-toggle="modal" data-target="#promt_send">שלח דואר</button>
						<br><br>

						<ul id="folders" class="nav nav-list">
						  <a href="index.php?q=inbox"> <li class="folder-item <?= letter_en($_GET["q"])=='inbox'?'selected':'';?>" id="inbox"><span class="fs1" aria-hidden="true" data-icon=""></span> דואר נכנס <span id="newInbox"></span></li></a>
						  <a href="index.php?q=sent"> <li class="folder-item <?= letter_en($_GET["q"])=='sent'?'selected':'';?>" id="sent"><span class="fs1" aria-hidden="true" data-icon=""></span> דואר נשלח</li></a>
						  <a href="index.php?q=archive"> <li class="folder-item <?= letter_en($_GET["q"])=='archive'?'selected':'';?>" id="archive"><span class="fs1" aria-hidden="true" data-icon=""></span> ארכיון </li></a>
						  <a href="index.php?q=trash"><li class="folder-item <?= letter_en($_GET["q"])=='trash'?'selected':'';?>" id="trash"><span class="fs1" aria-hidden="true" data-icon=""></span> פח אשפה</li></a>
						</ul>
					  </div>
            </div>
           

            


            
          </div>
        </div>
      </div>
      <!--/.fluid-container-->
    </div>
	<!--footer -->
	<?require_once($dest.'shadow/footer/footer.php');?>
	
				<!-- compose form -->
				<?include 'assats/compose.php';?>
	
	
	
	
	
	
	
	
	
	
	
    <script src="<?=$dest?>js/bootstrap.js">    </script>
    <script src="<?=$dest?>js/jquery.scrollUp.js">    </script>
    <script src="<?=$dest?>js/jquery.dataTables.js">    </script>
    
    <script type="text/javascript">
      //ScrollUp
      $(function () {
        $.scrollUp({
          scrollName: 'scrollUp', // Element ID
          topDistance: '300', // Distance from top before showing element (px)
          topSpeed: 300, // Speed back to top (ms)
          animation: 'fade', // Fade, slide, none
          animationInSpeed: 400, // Animation in speed (ms)
          animationOutSpeed: 400, // Animation out speed (ms)
          scrollText: 'Scroll to top', // Text for element
          activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        });
      });

      //Tooltip
      $('a').tooltip('hide');

      //Data Tables
      $(document).ready(function () {
        $('#data-table').dataTable({
          "sPaginationType": "full_numbers"
        });
      });

      jQuery('.delete-row').click(function () {
        var conf = confirm('Continue delete?');
        if (conf) jQuery(this).parents('tr').fadeOut(function () {
          jQuery(this).remove();
        });
          return false;
        });
      </script>
      
    </body>
    </html>