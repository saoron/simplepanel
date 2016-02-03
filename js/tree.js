$(function () {


	$("#col_blue").click(function() {
			$("#primaryNav").find("li").show("slow");
			$("#primaryNav").find("li img").show("slow");
			$("#primaryNav").find("li li").hide("slow");
			$("#primaryNav").find("li li img").hide("slow");
			$("#primaryNav").find("li li li").hide("slow");
			$("#primaryNav").find("li li li img").hide("slow");
	});
	$("#col_green").click(function() {
			$("#primaryNav").find("li").show("slow");
			$("#primaryNav").find("li img").show("slow");
			$("#primaryNav").find("li li").show("slow");
			$("#primaryNav").find("li li img").show("slow");
			$("#primaryNav").find("li li li").hide("slow");
			$("#primaryNav").find("li li li img").hide("slow");
	});
	$("#col_orange").click(function() {
			$("#primaryNav").find("li").show("slow");
			$("#primaryNav").find("li img").show("slow");
			$("#primaryNav").find("li li").show("slow");
			$("#primaryNav").find("li li img").show("slow");
			$("#primaryNav").find("li li li").show("slow");
			$("#primaryNav").find("li li li img").show("slow");
	});
	//collapse
	$(".col").click(function() {
		
			$("#sub"+$(this).attr('val')).find("img").slideToggle("slow");
			$("#sub"+$(this).attr('val')).slideToggle("slow");
		
	});
	//add new article
	$(".add").click(function() {
			$("#catid").val($(this).attr('val'));
			$("#addart").dialog({ maxHeight: 320,minWidth:388 });

	});	
	//delete slot
	$(".del").click(function() {
		var x  = $(this).parent().parent();
		bootbox.confirm("הנך עומד למחוק את המאמר הזה ואת כל תתי המאמרים שלו, האם לבצע?", function(result) {
			if (result){
				x.find("img").slideUp('slow');
				x.slideUp('slow', function() {

						$.post('../../components/content/validator/del_art.php',
					{
						aid:x.find("img").attr("val")
					},
					function(data,status){ 
					$("#addart").dialog("destroy");
					});
				});
			}
		});

	});		
	//add art
	$("#stay").click(function() {
			$.post('../../components/content/validator/add_art.php',
			{
				father:$("#catid").val(),
				ttl:$("#ttl").val(), 
				root:$("#root").val(), 
				sug:"0"
			},
			function(data,status){ 
			$("#add_art_form").submit();
			$("#addart").dialog("destroy");
			});
	
	});		
	$("#continue").click(function() {
			$.post('../../components/content/validator/add_art.php',
			{
				father:$("#catid").val(),
				ttl:$("#ttl").val(), 
				root:$("#root").val(), 
				sug:"0"
			},
			function(data,status){ 
			window.location = "edit.php?aid="+data;	
			});
	
	});		
	
	
});