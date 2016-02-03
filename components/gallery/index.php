<?PHP
	session_start();
	require_once('../../class/class.users.php');
	require_once('../../class/class.include.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
	//backup class
	require_once($dest.'class/class.backup.php');
	//gallery class
	require_once($dest.'class/class.gallery.php');
	//stats
	require_once($dest.'shadow/scraper/index.php');
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
	 $head_tag->insertHeader('<script src="'.$dest.'js/jquery-ui-1.10.2.custom.js"></script>'); //jqueryui
	 $head_tag->insertHeader('<script src="'.$dest.'components/gallery/assats/js/gallery.js"></script>'); //tree js
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
                     גלריות
                    </div>
                  </div>
                  <div class="widget-body">
                    <ul class="thumbnails">
					<?include 'assats/table.php';?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            

            
          </div>
          
          <div class="right-sidebar">
            
                       
			<div class="wrapper">
              <button id="add_new_gal" class="btn btn-block btn-info" type="button">
                הוסף גלריה חדשה <span class="fs1" aria-hidden="true" data-icon=""></span>
              </button>
            </div>


            


            
          </div>
        </div>
      </div>
      <!--/.fluid-container-->
    </div>
	<!--footer -->
	<?require_once($dest.'shadow/footer/footer.php');?>
	
	<!-- promt box -->
<div id="promt" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">מחיקת גלריה</h3>
  </div>
  <div class="modal-body">
   <p>&nbsp;&#1492;&#1504;&#1498; &#1506;&#1493;&#1502;&#1491; &#1500;&#1502;&#1495;&#1493;&#1511; &#1488;&#1514;
<span lang="he">&#1492;&#1490;&#1500;&#1512;&#1497;&#1492; &#1493;&#1488;&#1514; &#1499;&#1500; &#1492;&#1514;&#1502;&#1493;&#1504;&#1493;&#1514; &#1513;&#1489;&#1514;&#1493;&#1499;&#1492;, &#1508;&#1506;&#1493;&#1500;&#1492; &#1494;&#1493; &#1489;&#1500;&#1514;&#1497; &#1492;&#1508;&#1497;&#1499;&#1492;!</span><br>
<span lang="he">&nbsp;&#1500;&#1492;&#1502;&#1513;&#1498; &#1492;&#1499;&#1504;&#1505; &#1505;&#1497;&#1505;&#1502;&#1514;&#1498;</span>
<input type="password" id="password_check" size="9" class="admin_pass"></p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">ביטול</button>
    <button id="del_gal" class="btn btn-danger">מחק</button>
  </div>
</div>
	
	
	
	      <!--add +edit gal form -->   
        <?include 'assats/form.php';?>    
 
	
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