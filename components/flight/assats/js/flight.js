$(function () {

	$("#inbox").click(function() {
		$.post('../../components/flight/assats/inbox.php',
			{
				type:1,
				count:1

			},
			function(data,status){ 
				$("#mail_items").html(data);
				$("#archive").removeClass("selected");
				$("#trash").removeClass("selected");
				$("#inbox").addClass("selected");
				$("#sent").removeClass("selected");
					$("#mail_items tr").click(function() {
							window.location = 'message.php?id=' + $(this).attr("value") + '&q='+$.url().param('q');
					});	
			
			});	
	});	
	
	$("#sent").click(function() {
		$.post('../../components/flight/assats/sent.php',
			{
				type:2,
				count:1

			},
			function(data,status){ 
				$("#mail_items").html(data);
				$("#archive").removeClass("selected");
				$("#trash").removeClass("selected");
				$("#inbox").removeClass("selected");
				$("#sent").addClass("selected");
					$("#mail_items tr").click(function() {
							window.location = 'message.php?id=' + $(this).attr("value") + '&q='+$.url().param('q');
					});	
			});	
	});	
		
	$("#trash").click(function() {
		$.post('../../components/flight/assats/trash.php',
			{
				type:3,
				count:1

			},
			function(data,status){ 
				$("#mail_items").html(data);
				$("#archive").removeClass("selected");
				$("#trash").addClass("selected");
				$("#inbox").removeClass("selected");
				$("#sent").removeClass("selected");
					$("#mail_items tr").click(function() {
							window.location = 'message.php?id=' + $(this).attr("value") + '&q='+$.url().param('q');
					});	
			});	
	});	
	
	$("#archive").click(function() {

		$.post('../../components/flight/assats/archive.php',
			{
				type:4,
				count:1

			},
			function(data,status){ 
				$("#mail_items").html(data);
				$("#archive").addClass("selected");
				$("#trash").removeClass("selected");
				$("#inbox").removeClass("selected");
				$("#sent").removeClass("selected");
					$("#mail_items tr").click(function() {
							window.location = 'message.php?id=' + $(this).attr("value") + '&q='+$.url().param('q');
					});	
			});	
	});	
	$("#mail_items tr").click(function() {
			window.location = 'message.php?id=' + $(this).attr("value") + '&q='+$.url().param('q');
	});	
	
	
	
});