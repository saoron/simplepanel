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
session_start();
 require_once('class/class.include.php');
 $dest = new getDestination($_SERVER['REQUEST_URI']);
	
	require_once($dest.'config.php');
	require_once($dest.'login/core.php');
	//If user is not signed in refirect
	if(!$user->signed) redirect($dest."login.php");
	
	 require_once($dest.'class/class.log.php');
	 $log = new Log($connection);

	  //stats
	  require_once($dest.'shadow/scraper/index.php');
	
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
	 //custom header goes here $head_tag->insertHeader('...');
	 $head_tag->sendHeader();
	 ?>
  </head>
  <body>
    <header>
     <!-- head  -->
	 <?require_once(dirname(__FILE__) . "/shadow/header/header.php"); ?>
    </header>
    <div class="container-fluid">
      <div class="dashboard-container">
        <div class="dashboard-wrapper">
          
          <div class="left-sidebar no-margin">
          					<!-- menu -->
					<?require_once(dirname(__FILE__) . "/shadow/quick_menu/menu.php");?>
            
            
                      		<!-- statistics widget -->
					<?require_once(dirname(__FILE__) . "/shadow/statistics/home_widget/widget.php");?>

            
            <div class="row-fluid">
              <div class="span12">
                      		<!-- wait list widget -->
					<?require_once(dirname(__FILE__) . "/shadow/widgets/unactive_user_widget.php");?>
			  
              </div>
              
              
            </div>
            
            
            
            <div class="row-fluid">
              
              <div class="span6">
                <div class="widget">
                  <div class="widget-header">
				    <span class="tools">
                      <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
                    </span>
                    <div class="title">
                     Simple Log
                    </div>

                  </div>
                  <div class="widget-body">
                    <div class="todo-container">
                      <ul class="todo-list">
                        <li class="new">
                          <textarea name="slog" class="slog"><?=$log;?></textarea>
                        </li>
                       
                      </ul>
     
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
                      פעולות אחרונות
                    </div>
                  </div>

				  
				  	<?require_once($dest.'shadow/widgets/changes_widget.php');?>
				  
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

    
    <script src="js/wysiwyg/wysihtml5-0.3.0.js">
    </script>
    <script src="js/jquery.min.js">
    </script>
    <script src="js/bootstrap.js">
    </script>
    <script src="js/wysiwyg/bootstrap-wysihtml5.js">
    </script>
    <script src="js/jquery.scrollUp.js">
    </script>
    
    
    <!-- Google Visualization JS -->
    <script type="text/javascript" src="https://www.google.com/jsapi">    </script>
    
    <!-- Easy Pie Chart JS -->
    <script src="js/jquery.easy-pie-chart.js">    </script>
    
    <!-- Sparkline JS -->
    <script src="js/jquery.sparkline.js">
    </script>
    
    <!-- Tiny Scrollbar JS -->
    <script src="js/tiny-scrollbar.js">
    </script>
    
    
    
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

      //Google Visualiations
      google.load("visualization", "1", {
        packages: ["corechart"]
      });
      google.setOnLoadCallback(drawChart);




      //Tooltip
      $('a').tooltip('hide');
      $('i').tooltip('hide');


      //Tiny Scrollbar
      $('#scrollbar').tinyscrollbar();
      $('#scrollbar-one').tinyscrollbar();
      $('#scrollbar-two').tinyscrollbar();
      $('#scrollbar-three').tinyscrollbar();



      //Tabs
      $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
      })

      // SparkLine Graphs-Charts
      $(function () {
        $('#unique-visitors').sparkline('html', {
          type: 'bar',
          barColor: '#ed6d49',
          barWidth: 6,
          height: 30,
        });
        $('#monthly-sales').sparkline('html', {
          type: 'bar',
          barColor: '#74b749',
          barWidth: 6,
          height: 30,
        });
        $('#current-balance').sparkline('html', {
          type: 'bar',
          barColor: '#ffb400',
          barWidth: 6,
          height: 30,
        });
        $('#registrations').sparkline('html', {
          type: 'bar',
          barColor: '#0daed3',
          barWidth: 6,
          height: 30,
        });
        $('#site-visits').sparkline('html', {
          type: 'bar',
          barColor: '#f63131',
          barWidth: 6,
          height: 30,
        });
      });

      //wysihtml5
      $('#wysiwyg').wysihtml5();
    </script>
    
    
  </body>
</html>