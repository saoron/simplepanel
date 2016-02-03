$(function () {
	//add new backup
	$("#save_services, #save_servicess").click(function() {

			$.post('../../components/services/validator/edit.php',
			{	
					google:$("#google").val(),
					fb1:$("#fb1").val(),
					fb2:$("#fb2").val(),
					icount_user:$("#icount_user").val(),
					icount_pass:$("#icount_pass").val(),
			},
			function(data,status){ 
			alert(data);
				window.location = "index.php";
			});	

	});	
	
	
	
	
	$("#loading").ajaxStart(function(){
	   $(this).show();
	})
	.ajaxStop(function(){
	   $(this).hide();
	});

	
	
});