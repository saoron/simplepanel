<?
include $dest.'class/class.article.php';
?>
	<div class="sitemap">
	
	<div class="spacer_tall"></div>

		<ul id="primaryNav" class="col4">
			<?$art = new Article(0,$connection);?>
			<i><li id="home" ><div class="action"><img id="add<?=$art->tag("id");?>" class="add" val="0" src="../../img/tree/add.png" alt="add" /></div><a class="red"><?=$art->tag("ttl");?></a></li></i>
			
			<?
			$father = $art->tag('id');
			$query = mysql_query("SELECT * FROM content WHERE father='$father' ORDER BY id ASC ") or die(mysql_error());;
			while($row = mysql_fetch_array($query)){ 
			$subart = new Article($row["id"],$connection);
			?>
			<li style="margin-top: 119px;"><div class="action"><?=$subart->addActions($subart->tag("id"),0);?></div>
				<a href="edit.php?aid=<?=$subart->tag("id");?>"><h6><?="/".$subart->tag("root");?></h6><?=$subart->tag("ttl");?></a>
				<?if ($subart->haveChildern($low["id"])) echo '<ul id="sub'.$row["id"].'">';
					
					$subfatehr = $subart->tag('id');
					$subquery = mysql_query("SELECT * FROM content WHERE father='$subfatehr' ") or die(mysql_error());;
					while($low = mysql_fetch_array($subquery)){ 
					$subsubart = new Article($low["id"],$connection);?>
					<li><div class="action"><?=$subsubart->addActions($subsubart->tag("id"),1);?></div><a href="edit.php?aid=<?=$subsubart->tag("id");?>"><h6><?="/".$subsubart->tag("root");?></h6><?=$subsubart->tag("ttl");?></a>
								<?$subsubfatehr = $subsubart->tag('id');
								if ($subsubart->haveChildern($subsubfatehr)) echo '<ul id="sub'.$subsubfatehr.'">';
								$subsubfatehr = $subsubart->tag('id');
								$subsubquery = mysql_query("SELECT * FROM content WHERE father='$subsubfatehr' ") or die(mysql_error());;
								while($kow = mysql_fetch_array($subsubquery)){ 
								$subsubsubart = new Article($kow["id"],$connection);?>
								<li><div class="action smallaction"><?=$subsubsubart->addActions($subsubsubart->tag("id"),2);?></div><a href="edit.php?aid=<?=$subsubsubart->tag("id");?>"><h6><?="/".$subsubsubart->tag("id");?></h6><?=$subsubsubart->tag("ttl");?></a></li>
								<?}
								if ($subsubart->haveChildern($subsubfatehr)) echo '</ul>';?>
					</li>
					<?}?>

				<?if ($subart->haveChildern($low["id"])) echo '</ul>';?>
			</li>
			<?}?>



		</ul>

	</div>
	
