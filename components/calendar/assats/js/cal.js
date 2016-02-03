$(function () {

	$("#save_data").click(function() {
		$.post('../../components/users/validator/edit.php',
			{
				id:$("#id").val(), 
				username:$("#username").val(), 
				password:$("#password").val(), 
				email:$("#email").val(), 
				name:$("#name").val(), 
				faname:$("#faname").val(), 
				address:$("#address").val(), 
				phone:$("#phone").val(),
				web:$("#web").val(),
				img:$("#img").val(),
				yubiId:$("#yubiId").val()
			},
			function(data,status){ 
			if (data==1){
			window.location = "index.php";
			}
			else{
			$("#errmsg").css('display','block');
			$("#errmsg").html(data);
			}
			
			});	
	});	
	
	

		// image upload
		$('input[type=file]').change(function() { 
		// select the form and submit
		$('#edit_user').submit(); 
		});
	
	
});