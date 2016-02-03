<?PHP
session_start();
	require_once('../../class/class.users.php');
	require_once('../../class/class.include.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
	//services
	require_once($dest.'class/class.services.php');
	$services = new Services($connection);
	$services->setService();
	
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
	 $head_tag->insertHeader('<script src="'.$dest.'components/services/assats/js/services.js"></script>'); //services
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
          <div class="left-sidebar no-margin">
            
          
            <div class="row-fluid">
              <div class="span6">
                <div class="widget">
                  <div class="widget-header">
                    <span class="tools">
                      <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
                    </span>
                    <div class="title">
                     גוגל אנליטיקס
                    </div>
                  </div>
                  <div class="widget-body">

                    <div class="tab-content" id="myTabContent">
                     <textarea id="google" class="slog2"><?=stripslashes($services->googleAnalytics);?></textarea>
					<button id="save_servicess" class="btn btn-block btn-info" type="button">
					שמור <span class="fs1" aria-hidden="true" data-icon=""></span>
					</button>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="span6">
                <div class="widget">
                  <div class="widget-header">
				    <span class="tools">
                      <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
                    </span>
                    <div class="title">
                      Facebook Connect
                    </div>
                  </div>
                  <div class="widget-body">
						<div class="control-group rtl">
						<label class="control-label">
                               App ID/API Key
                              </label>
                        <div class="controls">
                          <input id="fb1" class="totalw" type="text" placeholder="App ID/API Key" value="<?=$services->fb1;?>">

                        </div>
                      </div>	
						<div class="control-group rtl">
						<label class="control-label">
                               App Secret
                              </label>
                        <div class="controls">
                          <input id="fb2" class="totalw" type="text" placeholder="App Secret" value="<?=$services->fb2;?>">

                        </div>
                      </div>	
				  
				  
					<button id="save_services" class="btn btn-block btn-info" type="button">
					שמור <span class="fs1" aria-hidden="true" data-icon=""></span>
                </div>
              </div>
              
            </div>
               <div class="span6">
                <div class="widget">
                  <div class="widget-header">
				    <span class="tools">
                      <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
                    </span>
                    <div class="title">
                      Icount
                    </div>
                  </div>
                  <div class="widget-body">
						<div class="control-group rtl">
						<label class="control-label">
                               שם משתמש: 
                              </label>
                        <div class="controls">
                          <input id="icount_user" class="totalw" type="text" placeholder="UserName" value="<?=$services->icount_user;?>">

                        </div>
                      </div>	
						<div class="control-group rtl">
						<label class="control-label">
                               סיסמא: 
                              </label>
                        <div class="controls">
                          <input id="icount_pass" class="totalw" type="password" placeholder="Password" value="<?= $services->icount_pass;?>">

                        </div>
                      </div>	
				  
				  
					<button id="save_services" class="btn btn-block btn-info" type="button">
					שמור <span class="fs1" aria-hidden="true" data-icon=""></span>
                </div>
              </div>
              
            </div>           

            
          </div>
          

        </div>
      </div>
      <!--/.fluid-container-->
    </div>
	<!--footer -->
	<?require_once($dest.'shadow/footer/footer.php');?>
	
		<div id="loading" ><h3>שומר...</h3><img src="<?=$dest.'img/ajax-loader.gif';?>" /></div>
	
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