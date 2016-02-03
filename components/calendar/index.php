<?PHP
session_start();
	require_once('../../class/class.include.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
	require_once('../../class/class.users.php');
	
	//stats
	require_once($dest.'shadow/scraper/index.php');
	//Calendar
	require_once($dest.'class/class.calendar.php');
	$cal = new Calendar($connection);
	
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
	 //custom header goes here $head_tag->insertHeader('...');
	 $head_tag->insertHeader('<link href="'.$dest.'css/fullcalendar.css" rel="stylesheet">');
	 $head_tag->insertHeader("<link rel='stylesheet' type='text/css' href='".$dest."css/theme.css' />");
	 $head_tag->insertHeader('<script src="'.$dest.'js/jquery-ui-1.8.23.custom.min.js">    </script>');
	 $head_tag->insertHeader('<script src="'.$dest.'js/bootstrap.js">    </script>');
	 $head_tag->insertHeader('<script src="'.$dest.'js/fullcalendar.js">    </script>');
	 $head_tag->insertHeader('<script src="'.$dest.'js/jquery.scrollUp.js">    </script>');
	 $head_tag->insertHeader('<script src="'.$dest.'js/jquery.sparkline.js">    </script>');
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
              <div class="span12">
                <div class="widget no-margin">
                  <div class="widget-header">
				    <span class="tools">
                      <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
                    </span>
                    <div class="title">
                      סימפל לוג
                    </div>

                  </div>
                  <div class="widget-body">
                    <div id='calendar'>
                    </div>
                  </div>
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
	
	
	
	
	
	
	
	
	
    <script src="<?=$dest?>js/bootstrap.js">    </script>
    <script src="<?=$dest?>js/jquery.scrollUp.js">    </script>
    <script src="<?=$dest?>js/jquery.dataTables.js">    </script>
    
     <script type="text/javascript">
      $(document).ready(function () {

        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        calendar = $('#calendar').fullCalendar({
          theme: true,
          selectable: true,
          selectHelper: true,
          select: function (start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
              calendar.fullCalendar('renderEvent', {
                title: title,
                start: start,
                end: end,
                allDay: allDay
              },
              true // make the event "stick"
              );
            }
            calendar.fullCalendar('unselect');
          },
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          editable: true,
          events: [
		  <?= $cal->GetEvents();?>
		  ]
        });

      });

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

	  
	  
    </script>
      
    </body>
    </html>