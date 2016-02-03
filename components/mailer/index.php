<?PHP
session_start();
	require_once('../../class/class.include.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
	require_once('../../class/class.users.php');
	
	//stats
	require_once($dest.'shadow/scraper/index.php');
	//mailer
	require_once($dest.'class/class.mailer.php');
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
	 $head_tag->insertHeader('<link rel="stylesheet" type="text/css" media="screen, print" href="'.$dest.'css/datepicker.css" />'); //datepicker
	 $head_tag->insertHeader('<link rel="stylesheet" type="text/css" media="screen, print" href="'.$dest.'css/timepicker.css" />'); //timepicker
	 $head_tag->insertHeader('<script src="'.$dest.'js/jquery-ui-1.10.2.custom.js"></script>'); //jqueryui
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
                     דיוור
                    </div>
                  </div>
                  <div class="widget-body">
				  						  <div id="errmsg" class="alert alert-warning errhandle"></div>
                    <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                      <thead>
                        <tr>
                          <th style="width:0.5%">
                            <input type="checkbox" class="no-margin" />
                          </th>
                          <th style="width:40%">
                           שם הקמפיין
                          </th>
                          <th style="width:20%" class="hidden-phone">
                            קבוצת נמענים
                          </th>
                          <th style="width:10%" class="hidden-phone">
                            סטטוס
                          </th>
                          <th style="width:15%" class="hidden-phone">
                            תאריך שליחה
                          </th>
                          <th style="width:10%" class="hidden-phone">
                            פעולות
                          </th>
                        </tr>
                      </thead>
                      <tbody>
					  <?$connection->connect();
					  		$query = mysql_query("SELECT * FROM mailer ORDER BY id DESC ") or die(mysql_error());;
								while($row = mysql_fetch_array($query)) {
									$cmp_tmp = new Mailer($connection);
									$cmp_tmp->SetCamp($row["id"]);
									?>
									 <tr>
                          <td class="center_node">
                            <input type="checkbox" class="no-margin" />
                          </td>
                          <td>
                            <span class="name">
                              <?=$cmp_tmp->title;?>
                            </span>
                          </td>
                          <td class="hidden-phone">
                            <?=$cmp_tmp->group_id;?>
                          </td>
                          <td class="hidden-phone center_node">
                            <span class="rtl label label label-<?=$cmp_tmp->activated==1?'info':'warning';?>">
                               <?=$cmp_tmp->activated==1?'פעיל':'220 / '.rand(15,220);?>
                            </span>
                          </td>
                          <td class="hidden-phone center_node ltr" >
                             <?=date("Y-m-d H:i:s",strtotime($cmp_tmp->dte));?>
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
                                  <a href="edit.php?id=<?=$cmp_tmp->id;?>">
                                   ערוך   <span class="fs1" aria-hidden="true" data-icon=""></span>
                                  </a>
                                </li>
                                <li>
                                  <a class="deleteCamp" value="<?=$row["id"];?>">
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
            
         
           <!--add user form -->   
        <?include 'assats/form.php';?>    
            
          </div>
          
          <div class="right-sidebar">
            
                       
			<div class="wrapper">
              <button id="add_new_camp" class="btn btn-block btn-info" type="button">
                הוסף קמפיין חדש <span class="fs1" aria-hidden="true" data-icon=""></span>
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
	
	
	

	<script type="text/javascript" src="<?=$dest?>js/bootstrap-datepicker.js">    </script>
    <script type="text/javascript" src="<?=$dest?>js/bootstrap-timepicker.js">    </script>
    <script src="<?=$dest?>js/bootstrap.js">    </script>
    <script src="<?=$dest?>js/jquery.scrollUp.js">    </script>
    <script src="<?=$dest?>js/jquery.dataTables.js">    </script>
	
	<script src="<?=$dest;?>components/mailer/assats/js/mailer.js"></script>
    
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