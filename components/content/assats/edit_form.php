
               <form method="POST" id="add_art_form" class="form-horizontal no-margin rtl">
					 <div class="add_art">          
				        <div class="control-group">
                        <label class="control-label smaller" for="name">
                          כותרת: 
                        </label>
                        <div class="controls controls-row no-margin">
                          <input name="ttl" id="ttl" class="span3 short_a_bit" type="text" placeholder="כותרת" value="<?=$art->ttl;?>">
                        </div>
                      </div>
					  	<div class="control-group">
                        <label class="control-label smaller" for="name">
                         Root: 
                        </label>
                        <div class="controls controls-row no-margin">
                          <input name="root" id="root" class="span3 short_a_bit" type="text" placeholder="Root" value="<?=$art->root;?>">
                        </div>
                      </div>

                      </div>
					 <div class="control-group" >

                        <div class="controls controls-row no-margin">
                          <textarea name="bdy" id="bdy"><?=$art->body;?></textarea>
                        </div>
                      </div>
					  
					  

										  
					<div class="accordion" id="accordion2">
					  <div class="accordion-group">
						<div class="accordion-heading">
						  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
							תגי מטה
						  </a>
						</div>
						<div id="collapseOne" class="accordion-body collapse">
						  <div class="accordion-inner">
							
									<div class="control-group">
									<label class="control-label smaller" for="name">
									  כותרת: 
									</label>
									<div class="controls controls-row no-margin">
									  <input name="meta_ttl" id="meta_ttl" class="span3 short_a_bit_less" type="text" placeholder="כותרת" value="<?=$art->meta_ttl;?>">
									</div>
								  </div>
									 <div class="control-group">
									<label class="control-label smaller" for="name">
									מילות מפתח: 
									</label>
									<div class="controls controls-row no-margin">
									  <input name="meta_keywords" id="meta_keywords" class="span3 short_a_bit_less" type="text" placeholder="מילות מפתח מופרדות בפסיק" value="<?=$art->meta_keywords;?>">
									</div>
								  </div>
									 <div class="control-group">
									<label class="control-label smaller" for="name">
									  תיאור: 
									</label>
									<div class="controls controls-row no-margin">
									  <input name="meta_description" id="meta_description" class="span3 short_a_bit_less" type="text" placeholder="נא להקפיד על טקסט באורך של עד 100 תווים" value="<?=$art->meta_description;?>">
									</div>
								  </div>
							
						  </div>
						</div>
					  </div>
					  <div class="accordion-group">
						<div class="accordion-heading">
						  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
							תוספות
						  </a>
						</div>
						<div id="collapseTwo" class="accordion-body collapse">
						  <div class="accordion-inner">
							תוספות נועדות לאנשים שצריכים אותם :)
						  </div>
						</div>
					  </div>
					</div>
					  
					  
					  
					  
					  
					  
					  
					  
                      <div class="no-margin">
					    <button id="continue" type="button" class="btn btn-warning2 pull-left pull_send_butt">
                         שמור וחזור למפה
                        </button>
                        <button id="save" type="button" class="btn btn-info pull-left pull_send_butt">
                         שמור
                        </button>

                        <div class="clearfix">
                        </div>
                      </div>
                      <input id="aid" type="hidden" value="<?=mysql_real_escape_string($_REQUEST["aid"]);?>" />
                    </form>
