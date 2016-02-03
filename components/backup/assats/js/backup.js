$(function () {
	//add new backup
	$("#add_new_backup").click(function() {

			$.post('../../components/backup/validator/backup.php',
			{	
					sug:'0'
			},
			function(data,status){ 
				window.location = "index.php";
			});	

	});	
		//add new backup
	$("#add_new_backup_db").click(function() {

			$.post('../../components/backup/validator/backup.php',
			{
					sug:'1'
			},
			function(data,status){ 
				window.location = "index.php";
			});	

	});	
	//delete backup
	$(".del_backup").click(function() {

			$.post('../../components/backup/validator/delete.php',
			{
				id:$(this).attr("value"), 

			},
			function(data,status){ 
				window.location = "index.php";
			});	

	});	
	
	//temp block download
	$(".download_backup").click(function() {

			bootbox.alert('אופציה זו סגורה בדמו, עמכם הסליחה.. <br>- תהליך ההורדה מאובטח , גישה ישירה לקבצים חסומה וניתן להוריד את הגיבויים אך ורק דרך הפאנל ע"י לינק מיוחד שמיוצר ממש כאן.');

	});		
	
	
	$("#loading").ajaxStart(function(){
	   $(this).show();
	})
	.ajaxStop(function(){
	   $(this).hide();
	});

	
	
});