$(function () {



				$("#save").click(function() {
				 var ed = tinyMCE.get('bdy');
					ed.setProgressState(1); // Show progress
								$.post('../../components/content/validator/save_art.php',
					{
						aid:$("#aid").val(),
						ttl:$("#ttl").val(),
						root:$("#root").val(),
						meta_ttl:$("#meta_ttl").val(),
						meta_keywords:$("#meta_keywords").val(),
						meta_description:$("#meta_description").val(),
						bdy:ed.getContent()
						
						
					},
					function(data,status){ 
					window.setTimeout(function() {
					ed.setProgressState(0); // set delay of 500 milisecond to make it look slow ^^
					}, 500);
				
					});
				});
				
				$("#continue").click(function() {
				 var ed = tinyMCE.get('bdy');
					ed.setProgressState(1); // Show progress
								$.post('../../components/content/validator/save_art.php',
					{
						aid:$("#aid").val(),
						ttl:$("#ttl").val(),
						root:$("#root").val(),
						meta_ttl:$("#meta_ttl").val(),
						meta_keywords:$("#meta_keywords").val(),
						meta_description:$("#meta_description").val(),
						bdy:ed.getContent()
						
						
					},
					function(data,status){ 
					
					ed.setProgressState(0); 
					window.onbeforeunload = null;
					window.location = "map.php";
				
					});
				});

	
});

