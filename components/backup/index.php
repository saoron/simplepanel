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
	 $head_tag->insertHeader('<script src="'.$dest.'components/backup/assats/js/backup.js"></script>'); //tree js
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
                     גיבויים
                    </div>
                  </div>
                  <div class="widget-body">
                    <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                      <thead>
                        <tr >
                          <th style="width:0.5%">
                            <input type="checkbox" class="no-margin" />
                          </th>
                          <th style="width:40%">
                            שם הקובץ
                          </th>
                          <th style="width:10%" class="hidden-phone">
                           תאריך גיבוי
                          </th>
                          <th style="width:15%" class="hidden-phone">
                           סטטוס
                          </th>
                          <th style="width:10%" class="hidden-phone">
                            פעולות
                          </th>
                        </tr>
                      </thead>
                      <tbody>
					  <?$connection->connect();
					  		$query = mysql_query("SELECT * FROM backup ORDER BY dte DESC ") or die(mysql_error());;
								while($row = mysql_fetch_array($query)) {
									$backup = new Backup($connection);
									$backup->setBackup($row["id"]);
									?>
									 <tr>
                          <td class="center_node">
                            <input type="checkbox" class="no-margin" />
                          </td>
                          <td>
                            <span class="name">
                              <?=$backup->name;?>
                            </span>
                          </td>
                          <td class="hidden-phone ltr">
                            <?=date("d-m-Y h:m:s",strtotime($backup->dte));?>
                          </td>
                          <td class="hidden-phone center_node">
                            <span class="label label label-<?=$backup->activated==1?'info':'warning';?>">
                               <?=$backup->sug==1?'בסיס נתונים':'גיבוי מלא';?>
                            </span>
                          </td>
                          <td class="hidden-phone center_node">
                            
                            <div class="btn-group">
                              <button data-toggle="dropdown" class="btn btn-mini dropdown-toggle">
                                פעולות
                                <span class="caret">
                                </span>
                              </button>
                              <ul class="dropdown-menu">
                                <li>
                                  <a class="download_backup"> <!--target="_BLANK" href="validator/download.php?id=<?//=$backup->hash;?>"-->
                                   הורד   <span class="fs1" aria-hidden="true" data-icon=""></span>
                                  </a>
                                </li>
                                <li>
                                  <a class="del_backup" value="<?=$backup->hash;?>">
                                   מחק   <span class="fs1" aria-hidden="true" data-icon=""></span>
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </td>
                          
                        </tr>
									<?
					  
								}
					  
					  ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              
            </div>
            

            
          </div>
          
          <div class="right-sidebar">
            
                       
			<div class="wrapper">
              <button id="add_new_backup" class="btn btn-block btn-info" type="button">
                גבה את האתר <span class="fs1" aria-hidden="true" data-icon=""></span>
              </button>
            </div>
            <div class="wrapper">
              <button  id="add_new_backup_db" class="btn btn-block btn-success" type="button">
              גבה בסיס נתונים <span class="fs1" aria-hidden="true" data-icon=""></span>
              </button>
            </div>

            


            
          </div>
        </div>
      </div>
      <!--/.fluid-container-->
    </div>
	<!--footer -->
	<?require_once($dest.'shadow/footer/footer.php');?>
	
	
	<div id="loading" ><h3>גיבוי מתבצע..</h3><img src="<?=$dest.'img/ajax-loader.gif';?>" /></div>
	
	
	
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