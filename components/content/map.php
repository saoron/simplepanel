<?PHP
session_start();
	require_once('../../class/class.include.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
		  //stats
	  require_once($dest.'class/class.scraper.php');
	  $statistics = new Scraper($connection);
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
	 $head_tag->insertHeader('<link rel="stylesheet" type="text/css" media="screen, print" href="'.$dest.'slickmap/slickmap.css" />'); //slickmap
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
                     ניהול תוכן
                    </div>
                  </div>
                  <div class="widget-body">
                    <div class="container-fluid">
                      
                      <div class="row-fluid">
						<?include 'assats/tree.php';?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            
          </div>
          
          <div class="right-sidebar">
            
            
            <div class="wrapper">
              <button id="col_blue" class="btn btn-block btn-info" type="button">
                הצג עד רמה כחולה
              </button>
            </div>
            <div class="wrapper">
              <button id="col_green" class="btn btn-block btn-success" type="button">
                הצג עד רמה ירוקה
              </button>
            </div>
            <div class="wrapper">
              <button id="col_orange" class="btn btn-block btn-warning" type="button">
                הצג הכל
              </button>
            </div>
            
            <hr class="hr-stylish-1">
            

            
            
          </div>
        </div>
      </div>
      <!--/.fluid-container-->
    </div>
	<!--footer -->
	<?require_once($dest.'shadow/footer/footer.php');?>
	
	<?include'assats/form.php';?>
    
  </body>
</html>