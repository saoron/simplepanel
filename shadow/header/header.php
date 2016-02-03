 
 <script src="<?=$dest;?>js/custom.js"></script>
 <a href="<?=$dest;?>index.php" class="logo">
        <img src="<?=$dest;?>img/logo.png" alt="logo" />
      </a>
					<div class="loginas">
					  <ul class="month-income">
						<li> <h5>  @<?=$user->username;?>    </h5> </li>
					  </ul>
					</div>

				
                <div class="btn-group">
                  <a href="<?=$dest."index.php"?>" class="btn btn-warning smaller_butt">
                   <span class="fs1" aria-hidden="true" data-icon=""></span>
                  </a>
                  <a href="<?=$dest."login/logout.php"?>" class="btn btn-warning2">
                    <i class="icon-white icon-off"> </i>
                  </a>
                  <a href="<?=$dest."components/flight/index.php?q=inbox";?>" class="btn ">
                  <div class="fs1 fs1-height" aria-hidden="true" data-icon=""></div>
				  <div id="unread_mail"></div>
				 </a>
				
				
				
				
                  </a>
                </div>