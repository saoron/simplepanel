<?PHP
session_start();
	require_once('../../class/class.include.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'shadow/user_hanlde.php');
	
	require_once('../../class/class.users.php');
	$user = new Users($connection);
	$user->setUser(mysql_real_escape_string($_REQUEST["id"]));
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
	 $head_tag->insertHeader('<script src="'.$dest.'components/users/assats/js/edit_user.js"></script>'); //tree js
	 $head_tag->insertHeader('<script src="'.$dest.'js/bootbox.js"></script>'); //bootbox js
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
          <div class="left-sidebar no-margin">
             <div class="row-fluid">
              <div class="span12">
                <div class="widget no-margin">
                  <div class="widget-header">
				    <span class="tools">
                      <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
                    </span>
                    <div class="title">
                     ניהול משתמש
                    </div>
                  </div>
                  <div class="widget-body">
                    <div class="container-fluid">
                      
                      <div class="row-fluid">
                        <div class="span3 right">
                          <div class="thumbnail">
						  <?$photo_dest =  $user->img ? $dest.".components/users/avatar/".$user->img:$dest."img/profile.png";?>
                            <img alt="300x200" src="<?=$photo_dest;?>">
                            <div class="caption">
								<input type="file" name="f1"/>
                            </div>
                          </div>
                        </div>
                        <div class="span9 left tran rtl">
                          <form id="edit_user" action="" method="POST" class="form-horizontal">
						  <div id="errmsg" class="alert alert-warning errhandle"></div>
                            <h5>
                             פרטי התחברות
                            </h5>
                            <hr>
							  <input name="id" id="id"  type="hidden" value="<?=trim($_GET["id"]);?>">
                            <div class="control-group">
								<div class="input-prepend">
								<label class="control-label">
								   דוא"ל:
								  </label>
								<span class="add-on">
								  @
								</span>
							   <input name="email" id="email" class="span3 short_a_bit ltr" type="text" value="<?=$user->email;?>">
							  </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">
                              שם משתמש:
                              </label>
                              <div class="controls">
                                <input name="username" id="username" class="span3 short_a_bit ltr" type="text" value="<?=$user->username;?>">
                              </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">
                                סיסמא
                              </label>
                              <div class="controls">
							    <input name="password" id="password" class="span3 short_a_bit" type="password" placeholder="לשינוי סיסמא הכנס סיסמא חדשה">
                                
                              </div>
                            </div>

                            <br />
                            <h5>
                              מידע אישי
                            </h5>
                            <hr>
                            <div class="control-group">
                              <label class="control-label">
                                שם פרטי
                              </label>
                              <div class="controls">
                                 <input name="name" id="name" class="span3 short_a_bit" type="text" value="<?=$user->name;?>">
                              </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">
                                שם משפחה
                              </label>
                              <div class="controls">
									<input name="faname" id="faname" class="span3 short_a_bit" type="text" value="<?=$user->faname;?>">
                              </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">
                                כתובת מגורים
                              </label>
							  <div class="controls">
								<input name="address" id="address" class="span3 short_a_bit" type="text" value="<?=$user->address;?>">
							  </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">
                                אתר אישי
                              </label>
                              <div class="controls">
									<input name="web" id="web" class="span3 short_a_bit ltr" type="text" placeholder="http://" value="<?=$user->web;?>">
                              </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">
                                טלפון
                              </label>
                              <div class="controls">
									<input name="phone" id="phone" class="span3 short_a_bit" type="text" value="<?=$user->phone;?>">
                              </div>
                            </div>
                            
							
                           <br />
                            <h5>
                              כרטיס הצפנה
                            </h5>
                            <hr>
                            <div class="control-group">
                              <label class="control-label">
                                OTP
                              </label>
                              <div class="controls">
							  <div class="input-prepend">
									<span class="add-on">
									  <img src="<?=$dest;?>img/yubiright.gif" alt="yubikey">
									</span>
									<input name="yubiId" id="yubiId" class="span3 short_a_bit ltr" maxlength="12" type="text" value="<?=$user->yubiotp;?>">
									
							  </div>
								 <span class="help-inline">
											  הכנס את הכרטיס ולחץ עליו ע"מ למשוך את הקוד  
									</span>
							</div>
                               
								
                            </div>  
							
                              <div class="form-actions">
                              <button id="save_data" type="button" class="btn btn-info">
                                שמור
                              </button>
                            </div>    
                            
                          </form>
                          
                        </div>
                      </div>
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
    <script src="<?=$dest?>js/jquery.min.js">    </script>
    <script src="<?=$dest?>js/bootstrap.js">    </script>
    <script src="<?=$dest?>js/jquery.scrollUp.js">    </script>
    <script src="<?=$dest?>js/bootstrap-editable.min.js">    </script>
    <script src="<?=$dest?>js/select2.js">    </script>
    
    
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

      //Xeditable form fields
      $(function () {


        //enable / disable
        $('#enable').click(function () {
          $('#user .editable').editable('toggleDisabled');
        });


        //editables 
        $('.inputText').editable({
          type: 'text',
          pk: 1,
          name: 'name',
          title: 'Enter Name'
        });


        $('.inputTextArea').editable({
          showbuttons: true
        });



        $('#tags').editable({
          inputclass: 'input-large',
          select2: {
            tags: ['html5', 'javascript', 'Jquery', 'css3', 'ajax', 'Sass', 'Haml', 'Photoshop'],
            tokenSeparators: [",", " "]
          }
        });


        $('#user .editable').on('hidden', function (e, reason) {
          if (reason === 'save' || reason === 'nochange') {
            var $next = $(this).closest('tr').next().find('.editable');
            if ($('#autoopen').is(':checked')) {
              setTimeout(function () {
                $next.editable('show');
              }, 300);

            } else {
              $next.focus();
            }

          }
        });

      });
      //Xeditable form fields end
    </script>
    
  </body>
</html>