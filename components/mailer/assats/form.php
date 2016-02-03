<div id="addcamp" title="הוספת קמפיין חדש" style="display:none;">
					
               <form method="POST" id="add_art_form" class="form-horizontal no-margin rtl">
			   <div id="errmsg2" class="alert alert-warning errhandle"></div>
					 <div class="add_art">          
				        <div class="control-group">
                        <label class="control-label smaller" for="name">
                         שם הקמפיין: 
                        </label>
                        <div class="controls controls-row no-margin">
                          <input name="cname" id="cname" class="span3 short_a_bit" type="text" placeholder="שם הקמפיין">
                        </div>
                      </div>
					  	<div class="control-group">
                        <label class="control-label smaller" for="name">
                          תאריך: 
                        </label>
                        <div class="controls controls-row no-margin">
                         <input type="text" name="date_range1" id="date_range1" class="date_picker timecloack" placeholder="<?=date("d/m/Y");?>">
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label smaller" for="name">
                          שעה: 
                        </label>
                       <div class="bootstrap-timepicker">
                            <input id="timepicker3" class="timecloack" type="text" value="<?=date("H:i:s",strtotime(date("H:i:s", mktime()) . " + 1 hours"));?>">
                       </div>
                      </div>
						<input type="hidden" id="catid" name="catid"/>
                      </div>
					
                      <div class="form-actions no-margin">
                        <button id="continue" type="button" class="btn btn-info pull-left camp_butt">
                          הוסף והמשך להוספת נמענים
                        </button>
                        <div class="clearfix">
                        </div>
                      </div>
                      
                    </form>
</div>