$(function () {
	//add new article
	$("#add_new_user").click(function() {

			$("#adduser").dialog({ maxHeight: 350,minWidth:400 });

	});	
	$("#stay").click(function() {
			$.post('../../components/users/validator/register.php',
			{
				username:$("#username").val(), 
				password:$("#password").val(), 
				password2:$("#password2").val(), 
				email:$("#email").val()
			},
			function(data,status){ 
			if (data==1){
			window.location = "index.php";
			$("#adduser").dialog("destroy");
			}
			else{
			$("#errmsg").css('display','block');
			$("#errmsg").html(data);
			}
			
			});
	
	});		
			$(".activate").click(function() {

					$.post('../../components/users/validator/activate.php',
			{
				uid:$(this).children("#id").val(),
				hash:$(this).children("#hash").val()
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
			
			$(".delete").click(function() {
				var x = $(this).children("#id").val();
					$("#del_user").click(function() {
							$.post('../../components/users/validator/delete.php',
					{
						pass:$("#password_check").val(),
						duid:x
					},
					function(data,status){ 
					if (data==1){
					window.location = "index.php";
					}
					else{
					$("#password_check").val('');
					$("#promt").effect( "shake" );
					}
					
					});

				});

			});	
	
	
});