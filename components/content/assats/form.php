<div id="addart" title="הוספת קטגוריה חדשה" >
               <form method="POST" id="add_art_form" class="form-horizontal no-margin rtl">
					 <div class="add_art">          
				        <div class="control-group">
                        <label class="control-label smaller" for="name">
                          כותרת: 
                        </label>
                        <div class="controls controls-row no-margin">
                          <input name="ttl" id="ttl" class="span3 short_a_bit" type="text" placeholder="כותרת">
                        </div>
                      </div>
					  	<div class="control-group">
                        <label class="control-label smaller" for="name">
                         Root: 
                        </label>
                        <div class="controls controls-row no-margin">
                          <input name="root" id="root" class="span3 short_a_bit" type="text" placeholder="Root">
                        </div>
                      </div>
					  	<div class="control-group">
						<label class="control-label smaller" for="name">
                         סוג:
                        </label>
                       <div class="btn-group" data-toggle="buttons-radio">
							<button type="button" class="btn btn-warning">גלריה</button> 
							<button type="button" class="btn btn-warning active">מאמר</button>
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