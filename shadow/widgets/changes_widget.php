                  <div class="widget-body">
                    
                    <div class="message-container">
					
					
					<?$sql = "SELECT * FROM log WHERE calander=1 ORDER BY dte DESC LIMIT 3";
						$query = mysql_query($sql) or die(mysql_error());;
						while($row = mysql_fetch_array($query)){?>
                      <div class="message">
                        <div class="img-container">
                          <img src="img/profile.jpg" alt="">
                        </div>
                        
                        <article>
                          <h6 class="no-margin">
                            <a href="#" target="_blank" >
                              <?=date("d-m-Y", strtotime($row["dte"]));?>
                            </a>
                          
                          </h6>
                          <p class="no-margin">
                            <a href="#" target="_blank">
                              @<?= idtouser($row["user"]);?>
                            </a>
                            <?= $row["msg"];?>
                          </p>
                        </article>
                        <div class="icons-nav">
                          <ul>
                            <li class="time">
                             <?= time_elapsed_string(strtotime($row["dte"])).' ago';?>
                            </li>
                            <li>

                            </li>
                          </ul>
                        </div>
                      </div>
						<?}?>
                      
                    </div>
                    
                  </div>