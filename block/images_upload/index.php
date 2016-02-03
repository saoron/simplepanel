		<form >
		<input id="file_upload" name="file_upload" type="file" multiple="true">
		</form>
		
					<div id="progres" class="progress progress-striped active">
					<div class="bar" style="width: 0%;"></div>
					</div>
		
<script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
			$('#file_upload').uploadify({
			'formData'     : {
					'gid' : '<?=$_GET["id"];?>',
					
				},
			'fileSizeLimit' : '<?=ini_get('upload_max_filesize')*1024;?>',
			'fileTypeDesc' : 'Image Files',
			'fileTypeExts' : '*.gif; *.jpg; *.png', 
			 'onUploadProgress' : function(file, bytesUploaded, bytesTotal, totalBytesUploaded, totalBytesTotal) {
				 $("#progres").css("display","block");
					$(".bar").css("width",(totalBytesUploaded*100)/totalBytesTotal +"%");
			},
				'swf'      : 	  '../../assats/uploadify/uploadify.swf',
				'uploader' : 	  '../../assats/uploadify/uploadify.php?<?= session_name(); ?>=<?= session_id(); ?>',
				 'onUploadSuccess' : function(file,data) {
				$("#nxtval").val(parseInt($("#nxtval").val())+1);
				$("#sortable").append(' <li value="'+data+'" id="page_'+data+'" class="ui-state-default"> <a class="thumbnail-img"  href="img/1.jpg" >        <img src="<?=$dest;?>gallery/<?=(int)$_GET["id"];?>/'+file.name+'">                      </a></li>')				 
			} ,
				'onQueueComplete' : function(queueData) {
				 $("#progres").css("display","none");
				 				$("li a").click(function() {
									$(this).parent().parent().parent().hide();
								$.post("validator/delete.php", { id: $(this).attr("id")});
								});

				},

				
			});
			
		});
	</script>