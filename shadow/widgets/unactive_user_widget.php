       
<?
				$sql = "SELECT * FROM users WHERE activated=0 ORDER BY reg_date DESC LIMIT 15";
				$query = mysql_query($sql) or die(mysql_error());
				if (mysql_num_rows($query)) { 
?>
	   <div class="widget">
                  <div class="widget-header">
				  	<span class="tools">
                      <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
                    </span>
                    <div class="title">
                      משתמשים בהמתנה
                    </div>
                  </div>
                  <div class="widget-body">
                    <div class="mail">
                      <table class="table table-condensed table-striped table-hover no-margin">
                        <thead>
                          <tr>
                            <th style="width:3%">
                              <input type="checkbox" class="no-margin">
                            </th>
                            <th style="width:17%">
                              שם משתמש
                            </th>
                            <th style="width:55%" class="hidden-phone">
                              דוא"ל
                            </th>
                            <th style="width:12%" class="right-align-text hidden-phone">
                              סטטוס
                            </th>
                            <th style="width:12%" class="right-align-text hidden-phone">
                              תאריך רישום
                            </th>
                          </tr>
                        </thead>
                        <tbody>
						
						<?
						while($row = mysql_fetch_array($query)){?>
                          <tr>
                            <td>
                              <input type="checkbox" class="no-margin">
                            </td>
                            <td>
                              <?=$row["username"];?>
                            </td>
                            <td class="hidden-phone">
                              <strong>
                                <?=$row["email"];?>
                              </strong>

                            </td>
                            <td class="right-align-text hidden-phone">
                              <span class="label label label-info">
                                מחכה לאישור מייל
                              </span>
                            </td>
                            <td class="right-align-text hidden-phone">
                              <?= date("d-m-Y",$row["reg_date"]);?>
                            </td>
                          </tr>
						  <?}?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
			<?}?>