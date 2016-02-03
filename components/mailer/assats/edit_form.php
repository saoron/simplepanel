
               <form method="POST" id="add_art_form" class="form-horizontal no-margin rtl">
					 <div class="add_art">          
				        <div class="control-group">
                        <label class="control-label smaller" for="name">
                          כותרת: 
                        </label>
                        <div class="controls controls-row no-margin">
                          <input name="ttl" id="ttl" class="span3 short_a_bit" type="text" placeholder="כותרת" value="<?=$mail->title;?>">
                        </div>
                      </div>
				        <div class="control-group">
                        <label class="control-label smaller" for="name">
                          נמענים: 
                        </label>
                        <div id="recpi" class="controls controls-row left pad-a-bit">
						<?=$mail->ParseUsers($mail->users);?>
                          
						
                        </div>
                      </div>

                      </div>
					 <div class="control-group" >

                        <div class="controls controls-row no-margin wid_a">
                          <textarea class="txt_area_w" name="bdy" id="bdy"><?=$mail->body;?></textarea>
                        </div>
                      </div>
					  

					  
                      <div class="no-margin">
					    <button id="continue" type="button" class="btn btn-warning2 pull-left pull_send_butt">
                        <span class="fs1" aria-hidden="true" data-icon=""></span> שמור ושלח
                        </button>
                        <button id="save" type="button" class="btn btn-info pull-left pull_send_butt">
                         <span class="fs1" aria-hidden="true" data-icon=""></span> שמור 
                        </button>
                        <button id="save" type="button" class="btn btn-success pull-left pull_send_butt">
                        <span class="fs1" aria-hidden="true" data-icon=""></span> שלח דוגמא למייל שלי
                        </button>

                        <div class="clearfix">
                        </div>
                      </div>
                      <input id="aid" type="hidden" value="<?=mysql_real_escape_string($_REQUEST["aid"]);?>" />
                    </form>
