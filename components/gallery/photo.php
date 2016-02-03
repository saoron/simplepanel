<?PHP
session_start();
	require_once('../../class/class.users.php');
	require_once('../../class/class.include.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
	//backup class
	require_once($dest.'class/class.backup.php');
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
	 $head_tag->insertHeader('<script src="'.$dest.'js/bootstrap.js"></script>'); //tree js
	 $head_tag->insertHeader('<script src="'.$dest.'js/load-image.min.js"></script>'); //gallery js
	 $head_tag->insertHeader('<script src="'.$dest.'js/bootstrap-image-gallery.js"></script>'); //gallery js
	 $head_tag->insertHeader('<script src="'.$dest.'js/bootstrap-image-gallery-main.js"></script>'); //gallery js
	 $head_tag->insertHeader('<script src="'.$dest.'js/drag.js"></script>'); //draggable handle
	 $head_tag->insertHeader('<link rel="stylesheet" type="text/css" media="screen, print" href="'.$dest.'assats/uploadify/css/uploadify.css" />');//uploadify css
	 $head_tag->insertHeader('<script src="'.$dest.'assats/uploadify/js/jquery.uploadify-3.1.js"></script>'); //uploadify js

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
                      תמונות
                    </div>
                  </div>
                  <div class="widget-body">
                    <div id="gallery" data-toggle="modal-gallery" data-target="#modal-gallery">

						   <ul id="sortable">
								<?
								$gal = mysql_real_escape_string($_GET["id"]);
								$query = mysql_query("SELECT * FROM photos WHERE father='$gal' ORDER BY sid ") or die(mysql_error());;
										while($row = mysql_fetch_array($query)) {?>
												<li id="page_<?=$row["id"];?>" value="<?=$row["id"];?>" class="ui-state-default"> 
													<a class="thumbnail-img"  value="<?=$row["father"];?>"> 
														<img  src="<?=$dest.'gallery/'.$gal.'/'.$row["fname"];?>" alt="<?$row["alt"];?>" />   
													</a>
												</li>
											<?}?>
							</ul>

                    </div>
                    
                    <!-- modal-gallery is the modal dialog used for the image gallery -->
                    <div id="modal-gallery" >

					
				  <a href="#" class="btn btn-inverse">
                    <i class="icon-white icon-trash">
                    </i>
                  </a>
					
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
                  
            

            
          </div>
          
          <div class="right-sidebar">
            
                       

				<?include $dest.'block/images_upload/index.php';?>
				<?include $dest.'block/images_upload/trash.php';?>

		

            


            
          </div>
        </div>
      </div>
      <!--/.fluid-container-->
    </div>
	<!--footer -->
	<?require_once($dest.'shadow/footer/footer.php');?>
	
		
	
	<script src="<?=$dest?>js/jquery.scrollUp.js">    </script>
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

     
      </script>
      
    </body>
    </html>