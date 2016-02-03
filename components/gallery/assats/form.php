<div id="addgal" title="הוספת גלריה חדשה" style="display:none;">
					<div id="errmsg" class="alert alert-warning errhandle"></div>
               <form method="POST" id="add_gal_form" class="form-horizontal no-margin rtl">
					 <div class="add_art">          
				        <div class="control-group">
                        <label class="control-label smaller" for="name">
                         כותרת: 
                        </label>
                        <div class="controls controls-row no-margin">
                          <input name="ttl" id="ttl" class="span3 short_a_bit" type="text" placeholder="כותרת הגלריה">
                        </div>
                      </div>
					  	<div class="control-group">
                        <label class="control-label smaller" for="name">
                         תיאור: 
                        </label>
                        <div class="controls controls-row no-margin">
							<textarea name="desc" id="desc" class="span3 short_a_bit" maxlength="250" placeholder="הכנס תיאור של עד 250 תווים"></textarea>
                         
                        </div>
                      </div>
					  	<div class="control-group">
                        <label class="control-label smaller" for="name">
                         מילות מפתח:
                        </label>
                        <div class="controls controls-row no-margin">
                          <input name="keyw" id="keyw" class="span3 short_a_bit" type="text" placeholder="מילות מפתח מופרדות בפסיק">
                        </div>
                      </div>
                      </div>
					
                      <div class="form-actions no-margin center-align-text">
                        <button id="continue" type="button" class="btn btn-info pull-left pull_send_butt">
                          המשך להוספת תמונות 
                        </button>
						<button id="stay" type="button" class="btn btn-success pull-left pull_send_butt_more">
                          הוסף והשאר כאן
                        </button>
                        <div class="clearfix">
                        </div>
                      </div>
                      
                    </form>
</div>
<div id="editgal" title="ערוך גלריה" style="display:none;">
</div>
