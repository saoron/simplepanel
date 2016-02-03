<?PHP
session_start();
	require_once('../../class/class.include.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
	require_once($dest.'class/class.article.php');
	//mailer
	require_once($dest.'class/class.mailer.php');
	$mail = new Mailer($connection);
	$mail->SetCamp((int)$_GET["id"]);
	
	
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
	 <?include $dest.'shadow/head.php';
	 //custom header goes here $head_tag->isertHeader('...');
	 $head_tag->insertHeader('<link rel="stylesheet" type="text/css" media="screen, print" href="'.$dest.'css/jquery-ui-1.10.2.custom.css" />'); //jqury ui css
	 $head_tag->insertHeader('<script src="'.$dest.'js/jquery-ui-1.10.2.custom.js"></script>'); //jqueryui
	 $head_tag->insertHeader('<script src="'.$dest.'js/bootstrap.js"></script>'); //bootstrap
	 $head_tag->insertHeader('<script src="'.$dest.'js/tree.js"></script>'); //tree js
	 $head_tag->insertHeader('<script src="'.$dest.'js/bootstrap-editable.min.js"></script>'); //
	 $head_tag->insertHeader('<script src="'.$dest.'js/select2.js"></script>'); //
	 $head_tag->insertHeader('<script src="'.$dest.'js/bootbox.js"></script>'); //bootbox
	 //TinyMCE 
	 $head_tag->insertHeader('<script src="'.$dest.'js/tiny_mce/tiny_mce.js"></script>'); //tinymce
	 $head_tag->insertHeader('<script src="'.$dest.'js/tiny_mce/set_mce.js"></script>');
	 //save ajax
	  $head_tag->insertHeader('<script src="'.$dest.'components/mailer/assats/js/mailer.js"></script>');
	 
	 $head_tag->sendHeader();
	 ?>

  </head>
  <body>
    <header>
     <!-- head  -->
	 <?include $dest.'shadow/header/header.php';?>
    </header>
    <div class="container-fluid" >
      <div class="dashboard-container">


        <div class="dashboard-wrapper">
          <div class="left-sidebar">
             <div class="row-fluid">
              <div class="span12">
                <div class="widget no-margin">
                  <div class="widget-header">
				    <span class="tools">
                      <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
                    </span>
                    <div class="title">
                     תוכן המייל
                    </div>
                  </div>
                  <div class="widget-body">
                    <div class="container-fluid">
                      
                      <div class="row-fluid">
						<?include 'assats/edit_form.php';?>
						<input id="cid" value="<?=$mail->id;?>" type="hidden">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            
          </div>
          
          <div class="right-sidebar">
            

            
            <div class="wrapper">
              <div class="btn-toolbar no-margin">
			            <label class="control-label smaller rtl right" for="name">
                         בחר תבנית מייל: 
                        </label>
						<select id="changeTemplate" class="rtl right">
						<?
						$query = mysql_query("SELECT * FROM content WHERE father = '91'  ") or die(mysql_error());;
							while($row = mysql_fetch_array($query)) 
							echo '<option value="'.$row["id"].'">'.$row["ttl"].'</option>';
						?>
						</select>
                
              </div>
			  
			 <div class="wrapper">
              <button class="btn btn-block btn-info" type="button" id="add_mng">
               הוסף מנהלים <span class="fs1" aria-hidden="true" data-icon=""></span>
              </button>
			   <button class="btn btn-block btn-warning" type="button" id="add_reg">
               הוסף משתמשים רשומים <span class="fs1" aria-hidden="true" data-icon=""></span>
              </button>
              <button class="btn btn-block btn-danger" type="button" id="add_tmp">
               הוסף משתמשים לא פעילים <span class="fs1" aria-hidden="true" data-icon=""></span>
              </button>
            </div>
			<hr class="hr-stylish-1">
			<div class="box">
			<div class="box_wrap">
			<div class="boxctnc">
			<p>##שם##  - שם פרטי</p>
			<p>##מייל## - כתובת מייל</p>
			<p>##מ.ל## - מספר לקוח</p>
			<p>##כתובת## - כתובת הלקוח</p>

			
			</div>
			</div>
			<div class="reco_bg"></div>
			</div>
			<hr class="hr-stylish-1">
			
					<div class="wrapper">

					    <button id="continue" type="button" class="btn btn-warning2 btn-large pull-left pull_send_butt full taller rtl">
                        <span class="fs1" aria-hidden="true" data-icon=""></span> שמור ושלח
                        </button>
                        <button id="save" type="button" class="btn btn-info pull-left btn-large pull_send_butt full taller rtl">
                         <span class="fs1" aria-hidden="true" data-icon=""></span> שמור 
                        </button>
                        <button id="send" type="button" class="btn btn-success btn-large pull-left pull_send_butt full taller rtl">
                        <span class="fs1" aria-hidden="true" data-icon=""></span> שלח דוגמא למייל שלי
                        </button>

                        <div class="clearfix">
                        </div>
                      
			
				</div>
            </div>
            
            
          </div>
        </div>
      </div>
      <!--/.fluid-container-->
    </div>
	
	<div id="loading" ><h3 style="padding-right: 74px;">טוען...</h3><img src="<?=$dest.'img/ajax-loader.gif';?>" /></div>
	
	
	<!--footer -->
	<?require_once($dest.'shadow/footer/footer.php');?>
	
	<?include'assats/form.php';?>
    
  </body>
</html>