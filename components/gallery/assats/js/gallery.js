$(function () {


	//add new gallery
	$("#add_new_gal").click(function() {

		$("#addgal").dialog({ maxHeight: 500,minWidth:400 });
			
	});	

	$(".edit_txt").click(function() {
		$.post('../../components/gallery/assats/editform.php',
			{
				id:$(this).attr("value")
			},
			function(data,status){ 
						$("#editgal").html(data);
						//save gallery details
						$("#save_gal_detail").click(function() {
							$.post('../../components/gallery/validator/edit.php',
							{
								id:$("#save_gal_detail").attr("value"),
								ttl:$("#ettl").val(), 
								desc:$("#edesc").val(), 
								keyw:$("#ekeyw").val()
							},function(data,status){ 
									$("#"+$("#save_gal_detail").attr("value")).find(".caption h3").html($("#ettl").val());
									$("#"+$("#save_gal_detail").attr("value")).find(".caption .descit").html($("#edesc").val());
									$("#editgal").dialog( "destroy" );
										
							});

						});
						$("#editgal").dialog({ maxHeight: 500,minWidth:400 });
			});
	});	
	$("#stay").click(function() {
			$.post('../../components/gallery/validator/add_gal.php',
			{
				ttl:$("#ttl").val(), 
				desc:$("#desc").val(), 
				keyw:$("#keyw").val()
			},
			function(data,status){ 
			$("#addgal").dialog("destroy");
			$(".thumbnails").prepend('<li id="'+data+'" class="span4 no-margin-left">                        <div class="thumbnail">                          <img alt="300x200" style="width: 300px; height: 200px;" src="../../img/profile.jpg">                          <div class="caption">                            <h3>                              '+$("#ttl").val()+'                            </h3>                            <p class="descit">							'+$("#desc").val()+'                           </p>                            <p class="center">                              <a href="photo.php?id='+data+'" class="btn btn-info">                               <span class="fs1" aria-hidden="true" data-icon=""></span> הוספת תמונות                              </a>                                               </p>                          </div>                        </div>                      </li>').children(':first').hide().fadeIn(1000);
			$("#ttl").val('');
			$("#desc").val('');
			$("#keyw").val('');
			$(".edit_txt").click(function() {
				$.post('../../components/gallery/assats/editform.php',
					{						id:$(this).attr("value")					},
					function(data,status){ 
						$("#editgal").html(data);
						$("#editgal").dialog({ maxHeight: 500,minWidth:400 });
						
					});
				});	
			});
	
	});	
	
	//add and continue
		$("#continue").click(function() {
			$.post('../../components/gallery/validator/add_gal.php',
			{
				ttl:$("#ttl").val(), 
				desc:$("#desc").val(), 
				keyw:$("#keyw").val()
			},
			function(data,status){ 
				window.location ='photo.php?id='+data;
			
			});
	
	});	

				$(".del_gal").click(function() {
				var x = $(this).attr("value");
					$("#del_gal").click(function() {
							$.post('../../components/gallery/validator/delete.php',
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