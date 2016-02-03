<?PHP
session_start();
				require_once('../../../class/class.include.php');
				$dest = new getDestination($_SERVER['REQUEST_URI']);
				//log
				require_once($dest.'class/class.log.php');
				require_once($dest.'shadow/user_hanlde.php');
				require_once($dest.'class/class.article.php');
				$connection->connect();
				//gallery class
				require_once($dest.'class/class.gallery.php');
						$gal = new Gallery($connection);
						$gal->setGallery(mysql_real_escape_string($_POST["id"]));
				?>
					<div id="errmsg" class="alert alert-warning errhandle"></div>
               <form method="POST" id="add_gal_form" class="form-horizontal no-margin rtl">
					 <div class="add_art">          
				        <div class="control-group">
                        <label class="control-label smaller" for="name">
                         כותרת: 
                        </label>
                        <div class="controls controls-row no-margin">
                          <input name="ettl" id="ettl" class="span3 short_a_bit" type="text" value="<?=$gal->ttl;?>" placeholder="כותרת הגלריה">
                        </div>
                      </div>
					  	<div class="control-group">
                        <label class="control-label smaller" for="name">
                         תיאור: 
                        </label>
                        <div class="controls controls-row no-margin">
							<textarea name="edesc" id="edesc" class="span3 short_a_bit" maxlength="250" placeholder="הכנס תיאור של עד 250 תווים"><?=$gal->meta_description;?></textarea>
                         
                        </div>
                      </div>
					  	<div class="control-group">
                        <label class="control-label smaller" for="name">
                         מילות מפתח:
                        </label>
                        <div class="controls controls-row no-margin">
                          <input name="ekeyw" id="ekeyw" class="span3 short_a_bit" type="text" value="<?=$gal->meta_keywords;?>" placeholder="מילות מפתח מופרדות בפסיק">
                        </div>
                      </div>
                      </div>
					
                      <div class="form-actions no-margin center-align-text">

						<button id="save_gal_detail" value="<?=$gal->id;?>" type="button" class="btn btn-warning save_btn_gal">
                         <span class="fs1" aria-hidden="true" data-icon=""></span> שמור 
                        </button>
                        <div class="clearfix">
                        </div>
                      </div>
                      
                    </form>
