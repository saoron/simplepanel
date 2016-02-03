<?PHP
session_start();
	require_once('../../class/class.include.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
	//stats
	require_once($dest.'shadow/scraper/index.php');
	require_once($dest.'class/class.statistics.php');
	$stat = new Statistics($connection);
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
                      חתך דפדפנים - 15 ימים אחרונים
                    </div>
                  </div>
                  <div class="widget-body">
                    <div class="easy-pie-charts-container">
                      <div class="pie-chart">
					  <?$s =  (int)$stat->GetStatOfBrowser('Chrome');?>
                        <div class="chart1" data-percent="<?=$s;?>">
                          <?=$s;?>%
                        </div>
                        <p class="name">
                          Google Chrome
                        </p>
                      </div>
                      <div class="pie-chart">
					   <?$s =  (int)$stat->GetStatOfBrowser('Firefox');?>
                        <div class="chart2" data-percent="<?=$s;?>">
                         <?=$s;?>%
                        </div>
                        <p class="name">
                          FireFox
                        </p>
                      </div>
                      <div class="pie-chart">
					   <?$s =  (int)$stat->GetStatOfBrowser('MSIE');?>
                        <div class="chart3" data-percent="<?=$s;?>">
                         <?=$s;?>%
                        </div>
                        <p class="name">
                          Internet Explorer
                        </p>
                      </div>
                      <div class="pie-chart">
					   <?$s =  (int)$stat->GetStatOfBrowser('Safari');?>
                        <div class="chart4" data-percent="<?=$s;?>">
                         <?=$s;?>%
                        </div>
                        <p class="name">
                          Safari
                        </p>
                      </div>
                      <div class="pie-chart">
					   <?$s =  (int)$stat->GetStatOfBrowser('Opera');?>
                        <div class="chart5" data-percent="<?=$s;?>">
                         <?=$s;?>%
                        </div>
                        <p class="name">
                          Opera
                        </p>
                      </div>
					   <div class="pie-chart">
					   <?$s =  (int)$stat->GetStatOfBrowser('Unknown');?>
                        <div class="chart1" data-percent="<?=$s;?>">
                          <?=$s;?>%
                        </div>
                        <p class="name">
                          Others
                        </p>
                      </div>
                      <div class="clearfix">
                      </div>
                    </div>
                  </div>
                </div>
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
                      דו"ח כניסות
                    </div>
                  </div>
                  <div class="widget-body">
                    <div id="line_chart">
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
                      תעבורת נתונים
                    </div>
                  </div>
                  <div class="widget-body">
                    <div id="column_chart">
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            
            
            <div class="row-fluid">
              
              <div class="span6">
                <div class="widget no-margin">
                  <div class="widget-header">
                    <span class="tools">
                      <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
                    </span>
                    <div class="title">
                     רשתות חברתיות
                    </div>
                  </div>
                  <div class="widget-body">
                    <div id="area_chart">
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="span6">
                <div class="widget no-margin">
					<div class="widget-header">
                    <span class="tools">
                      <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
                    </span>
                    <div class="title">
                      פעילויות באתר
                    </div>
                  </div>
                  <div class="widget-body">
                    <div id="pie_chart">
                    </div>
                  </div>
                </div>
              </div>
              
              
            </div>
            
          </div>
          <div class="right-sidebar">
            
            <div class="wrapper">
              <ul class="month-income">
                <li>
                  <span class="icon-block blue-block">
                    <b class="fs1" aria-hidden="true" data-icon="&#xe1ba;"></b>
                  </span>
                  <h5>
                    @srinubasava 
                    <small class="info-fade">
                      Developer
                    </small>
                  </h5>
                  <p>
                    10 minutes ago
                  </p>
                </li>
                <li>
                  <span class="icon-block orange-block">
                    <b class="fs1" aria-hidden="true" data-icon="&#xe1c9;"></b>
                  </span>
                  <h5>
                    @prempillai 
                    <small class="info-fade">
                      Sr. Developer
                    </small>
                  </h5>
                  <p>
                    28 minutes ago
                  </p>
                </li>
                <li>
                  <span class="icon-block green-block">
                    <b class="fs1" aria-hidden="true" data-icon="&#xe1bd;"></b>
                  </span>
                  <h5>
                    @arjunurs 
                    <small class="info-fade">
                      Developer
                    </small>
                  </h5>
                  <p>
                    14 minutes ago
                  </p>
                </li>
                <li>
                  <span class="icon-block red-block">
                    <b class="fs1" aria-hidden="true" data-icon="&#xe1c0;"></b>
                  </span>
                  <h5>
                    @gajjugujju 
                    <small class="info-fade">
                      Team Leader
                    </small>
                  </h5>
                  <p>
                    28 minutes ago
                  </p>
                </li>
                <li>
                  <span class="icon-block yellow-block">
                    <b class="fs1" aria-hidden="true" data-icon="&#xe1c4;"></b>
                  </span>
                  <h5>
                    @boomer 
                    <small class="info-fade">
                      Business
                    </small>
                  </h5>
                  <p>
                    28 minutes ago
                  </p>
                </li>
              </ul>
            </div>
            
            <hr class="hr-stylish-1">
            
            <div class="wrapper">
              <div class="mini-dashboard">
                <div class="graph-container">
                  <p class="city">
                    Omnms
                    <span class="time">
                      Today 10:10 AM
                    </span>
                  </p>
                  <div class="graph">
                    <span id="stock-graph">
                      3, 5, 8, -5, 1, 5, -2, 9, 6, 8, 9, -5, 2, -9, 6, 8, 9, 6, 8, 9, -5, 8, 1, 6, -3, 7, 9
                    </span>
                  </div>
                  
                  <div class="info-container">
                    <div class="blocks-container">
                      
                      <div class="block">
                        <i class="arrow">
                        </i>
                        3.10p
                      </div>
                      <div class="block last">
                        <i class="arrow">
                        </i>
                        7.89p
                      </div>
                      <div class="clearfix">
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            
            <hr class="hr-stylish-1">
            
            <div class="wrapper">
              <ul class="progress-statistics">
                <li>
                  <div class="details">
                    <span>
                      Facebook
                    </span>
                    <span class="pull-right">
                      97%
                    </span>
                  </div>
                  <div class="progress progress-striped active">
                    <div style="width: 97%;" class="bar">
                    </div>
                  </div>
                </li>
                <li>
                  <div class="details">
                    <span>
                      Twitter
                    </span>
                    <span class="pull-right">
                      79%
                    </span>
                  </div>
                  <div class="progress progress-success progress-striped">
                    <div style="width: 79%;" class="bar">
                    </div>
                  </div>
                </li>
                <li>
                  <div class="details">
                    <span>
                      LinkedIn
                    </span>
                    <span class="pull-right">
                      39%
                    </span>
                  </div>
                  <div class="progress progress-info progress-striped active">
                    <div style="width: 39%;" class="bar">
                    </div>
                  </div>
                </li>
                <li>
                  <div class="details">
                    <span>
                      Pinterest
                    </span>
                    <span class="pull-right">
                      51%
                    </span>
                  </div>
                  <div class="progress progress-danger progress-striped">
                    <div style="width: 51%;" class="bar">
                    </div>
                  </div>
                </li>
                <li>
                  <div class="details">
                    <span>
                      Google Plus+
                    </span>
                    <span class="pull-right">
                      63%
                    </span>
                  </div>
                  <div class="progress progress-warning progress-striped active">
                    <div style="width: 63%;" class="bar">
                    </div>
                  </div>
                </li>
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
	
    <script src="<?=$dest?>js/bootstrap.js">    </script>
    <script src="<?=$dest?>js/jquery.scrollUp.js">    </script>
    <script src="<?=$dest?>js/jquery.dataTables.js">    </script>
	<!-- Google Visualization JS -->
    <script type="text/javascript" src="https://www.google.com/jsapi">    </script>
    <!-- Easy Pie Chart JS -->
    <script src="<?=$dest?>js/jquery.easy-pie-chart.js">    </script>
    <!-- Sparkline JS -->
    <script src="<?=$dest?>js/jquery.sparkline.js">    </script>
	
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

      $(document).ready(function () {
        pie_chart();
        sparkline_graphs();
      });

      function pie_chart() {
        $(function () {
          //create instance
          $('.chart1').easyPieChart({
            animate: 2000,
            barColor: '#74b749',
            trackColor: '#dddddd',
            scaleColor: '#74b749',
            size: 180,
            lineWidth: 5,
          });

        });

        $(function () {
          //create instance
          $('.chart2').easyPieChart({
            animate: 2000,
            barColor: '#ed6d49',
            trackColor: '#dddddd',
            scaleColor: '#ed6d49',
            size: 180,
            lineWidth: 5,
          });

        });

        $(function () {
          //create instance
          $('.chart3').easyPieChart({
            animate: 2000,
            barColor: '#0daed3',
            trackColor: '#dddddd',
            scaleColor: '#0daed3',
            size: 180,
            lineWidth: 5,
          });

        });

        $(function () {
          //create instance
          $('.chart4').easyPieChart({
            animate: 2000,
            barColor: '#ffb400',
            trackColor: '#dddddd',
            scaleColor: '#ffb400',
            size: 180,
            lineWidth: 5,
          });
         
        });


        $(function () {
          //create instance
          $('.chart5').easyPieChart({
            animate: 3000,
            barColor: '#F63131',
            trackColor: '#dddddd',
            scaleColor: '#F63131',
            size: 180,
            lineWidth: 5,
          });
         
        });


      }


      function sparkline_graphs() {
        $(function () {
          $('#stock-graph').sparkline('html', {
            type: 'bar',
            barColor: '#0daed3',
            barWidth: 7,
            height: 38,
          });
        });
      }


      google.load("visualization", "1", {
        packages: ["corechart"]
      });

      $(document).ready(function () {
        drawChart1();
        drawChart2();
        drawChart3();
        drawChart4();
      })

      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['שנה', 'Google+', 'Facebook'],
          ['2009', 4000, 900],
          ['2010', 970, 1460],
          ['2011', 1660, 520],
          ['2012', 1030, 540]
        ]);

        var options = {
          width: 'auto',
          lineWidth: 1,
          height: '160',
          backgroundColor: 'transparent',
          colors: ['#74b749', '#0daed3', '#ed6d49', '#ffb400', '#f63131'],
          tooltip: {
            textStyle: {
              color: '#666666',
              fontSize: 11
            },
            showColorCode: true
          },
          legend: {
            textStyle: {
              color: 'black',
              fontSize: 12
            }
          },
          chartArea: {
            left: 40,
            top: 10,
            height: "80%"
          }
        };

        var chart = new google.visualization.AreaChart(document.getElementById('area_chart'));
        chart.draw(data, options);
      }




      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['שבוע', 'מבקרים'],
          ['<?=translate(date("l",strtotime('-6 days', time())));?>',<?= $visits[date("d",strtotime('-6 days', time()))]?$visits[date("d",strtotime('-6 days', time()))]:0;?>],
          ['<?=translate(date("l",strtotime('-5 days', time())));?>',  <?= $visits[date("d",strtotime('-5 days', time()))]?$visits[date("d",strtotime('-5 days', time()))]:0;?>],
          ['<?=translate(date("l",strtotime('-4 days', time())));?>',<?= $visits[date("d",strtotime('-4 days', time()))]?$visits[date("d",strtotime('-4 days', time()))]:0;?>],
          ['<?=translate(date("l",strtotime('-3 days', time())));?>',<?= $visits[date("d",strtotime('-3 days', time()))]?$visits[date("d",strtotime('-3 days', time()))]:0;?>],
          ['<?=translate(date("l",strtotime('-2 days', time())));?>',<?= $visits[date("d",strtotime('-2 days', time()))]?$visits[date("d",strtotime('-2 days', time()))]:0;?>],
          ['<?=translate(date("l",strtotime('-1 days', time())));?>', <?= $visits[date("d",strtotime('-1 days', time()))]?$visits[date("d",strtotime('-1 days', time()))]:0;?>],
          ['<?=translate(date("l",time()));?>',  <?= $visits[date("d",time())];?>]
        ]);

        var options = {
          width: 'auto',
          height: '160',
          backgroundColor: 'transparent',
          colors: ['#ed6d49', '#0daed3'],
          tooltip: {
            textStyle: {
              color: '#666666',
              fontSize: 11
            },
            showColorCode: true
          },
          legend: {
            textStyle: {
              color: 'black',
              fontSize: 12
            }
          },
          chartArea: {
            left: 100,
            top: 10
          },
          focusTarget: 'category',
          hAxis: {
            textStyle: {
              color: 'black',
              fontSize: 12
            }
          },
          vAxis: {
            textStyle: {
              color: 'black',
              fontSize: 12
            }
          },
          pointSize: 6,
          chartArea: {
            left: 60,
            top: 10,
            height: '80%'
          },
          lineWidth: 1,
        };

        var chart = new google.visualization.LineChart(document.getElementById('line_chart'));
        chart.draw(data, options);
      }


      function drawChart3() {
        var data = google.visualization.arrayToDataTable([
          ['שנה', 'תמונות', 'תעבורה', 'API', 'שרתי מייל'],
          ['2007', 300, 800, 900, 300],
          ['2008', 1170, 860, 1220, 564],
          ['2009', 260, 1120, 2870, 2340],
          ['2010', 1030, 540, 3430, 1200],
          ['2011', 200, 700, 1700, 770],
          ['2012', 1170, 2160, 3920, 800], ]);

        var options = {
          width: 'auto',
          height: '160',
          backgroundColor: 'transparent',
          colors: ['#ed6d49', '#0daed3', '#ffb400', '#74b749', '#f63131'],
          tooltip: {
            textStyle: {
              color: '#666666',
              fontSize: 11
            },
            showColorCode: true
          },
          legend: {
            textStyle: {
              color: 'black',
              fontSize: 12
            }
          },
          chartArea: {
            left: 60,
            top: 10,
            height: '80%'
          },
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('column_chart'));
        chart.draw(data, options);
      }

      function drawChart4() {
        var data = google.visualization.arrayToDataTable([
          ['משימה', 'כמות'],
          ['ניהול משתמשים', 2],
          ['פוסטים בפורום', 10],
          ['ניהול תוכן', 2],
          ['בדיקת דואר', 2],
          ['אחר', 8]
        ]);

        var options = {
          width: 'auto',
          height: '160',
          backgroundColor: 'transparent',
          colors: ['#ed6d49', '#74b749', '#0daed3', '#ffb400', '#f63131'],
          tooltip: {
            textStyle: {
              color: '#666666',
              fontSize: 11
            },
            showColorCode: true
          },
          legend: {
            position: 'left',
            textStyle: {
              color: 'black',
              fontSize: 12
            }
          },
          chartArea: {
            left: 0,
            top: 10,
            width: "100%",
            height: "100%"
          }
        };

        var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
        chart.draw(data, options);
      }
    </script>
      
    </body>
    </html>