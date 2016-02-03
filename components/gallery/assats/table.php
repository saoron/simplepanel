					<?$query = mysql_query("SELECT * FROM gallery  ORDER BY id DESC ") or die(mysql_error());;
						while($row = mysql_fetch_array($query)){
						$gal = new Gallery($connection);
						$gal->setGallery($row["id"]);
						?>
                      <li id="<?=$gal->id;?>" class="span4 no-margin-left">
                        <div class="thumbnail">
                         <img class="gal_top" alt="300x200" style="width: 300px; height: 200px;" src="<?= $gal->pic?$dest.'gallery/'.$gal->id.'/'.$gal->pic:"../../img/profile.jpg";?>" onclick="location.href='photo.php?id=<?=$gal->id;?>'">
                          <div class="caption">
                            <h3>
                              <?=$gal->ttl;?>
                            </h3>
                            <p class="descit">
							<?=$gal->meta_description;?>
                            </p>
                            <p class="center" >
                              <a href="photo.php?id=<?=$gal->id;?>" class="btn btn-info">
                               <span class="fs1" aria-hidden="true" data-icon=""></span> הוספת תמונות
                              </a>
                              
                              <a  value="<?=$gal->id;?>" class="btn edit_txt">
                               <span class="fs1" aria-hidden="true" data-icon=""></span> עריכת טקסט
                              </a>
							  <a  value="<?=$gal->id;?>" class="btn btn-danger del_gal" data-toggle="modal" data-target="#promt">
                              <span class="fs1" aria-hidden="true" data-icon=""></span> מחק 
                              </a>
                            </p>
                          </div>
                        </div>
                      </li>
						<?}?>