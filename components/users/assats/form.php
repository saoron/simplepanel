<div id="adduser" title="הוספת משתמש חדש" style="display:none;">
					<div id="errmsg" class="alert alert-warning errhandle"></div>
               <form method="POST" id="add_art_form" class="form-horizontal no-margin rtl">
					 <div class="add_art">          
				        <div class="control-group">
                        <label class="control-label smaller" for="name">
                          שם משתמש: 
                        </label>
                        <div class="controls controls-row no-margin">
                          <input name="username" id="username" class="span3 short_a_bit" type="text" placeholder="שם משתמש">
                        </div>
                      </div>
					  	<div class="control-group">
                        <label class="control-label smaller" for="name">
                         סיסמא: 
                        </label>
                        <div class="controls controls-row no-margin">
                          <input name="password" id="password" class="span3 short_a_bit" type="password" placeholder="רצוי לבחור סיסמא באורך 8 תווים">
                        </div>
						<label class="control-label smaller" for="name">
                         סיסמא שוב: 
                        </label>
                        <div class="controls controls-row no-margin">
                          <input name="password2" id="password2" class="span3 short_a_bit" type="password" placeholder="רצוי לבחור סיסמא באורך 8 תווים">
                        </div>
                      </div>
					  	<div class="control-group">
                        <label class="control-label smaller" for="name">
                          דוא"ל: 
                        </label>
                        <div class="controls controls-row no-margin">
                          <input name="email" id="email" class="span3 short_a_bit" type="text" placeholder="דוא''ל">
                        </div>
                      </div>
						<input type="hidden" id="catid" name="catid"/>
                      </div>
					
                      <div class="form-actions no-margin">
                        <button id="continue" type="button" class="btn btn-info pull-left pull_send_butt">
                          הוסף והמשך לעריכה
                        </button>
						<button id="stay" type="button" class="btn btn-success pull-left pull_send_butt_more">
                          הוסף והשאר כאן
                        </button>
                        <div class="clearfix">
                        </div>
                      </div>
                      
                    </form>
</div>