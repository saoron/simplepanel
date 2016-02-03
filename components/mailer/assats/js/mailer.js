$(function () {

	//send new message
	$("#send").click(function() {
			$.post('../../components/mailer/validator/SendDemo.php',
			{
				cid:$("#cid").val() 
			},
			function(data,status){ 
				bootbox.alert('מייד ישלח מייל דוגמא לתבית המייל שלך, כמו כן ניתן לראות את המייל בתיבת המייל הפנימית.');
			});	
	});
	
	$("#changeTemplate").change(function() {
		var ed = tinyMCE.get('bdy');
		ed.setProgressState(1); // Show progress
		$.post('../../components/mailer/validator/getTemplate.php',
			{
				mid:$("#changeTemplate").val(), 

			},
			function(data,status){ 
				ed.setContent(data);
				ed.setProgressState(0); // Hide progress
			});	
	});	
		
			$("#add_mng").click(function() {

			$.post('../../components/mailer/validator/getNiman.php',
			{
				mid:1 ,
				cid:$("#cid").val()

			},
			function(data,status){ 
					//call DB
					$.post('../../components/mailer/validator/AddGroup.php',{gid:1, cid:$("#cid").val() });
					//appand
					$("#recpi").append(data).find("#group_1").hide().show("slide", { direction: "right" }, 1000);
					//init delete
					$(".fss1").click(function() {
					var x = $(this);
							$.post('../../components/mailer/validator/DelUserFromList.php',{uid:$(this).attr("value"), cid:$("#cid").val() },function(data){
								x.parent().fadeOut("slow");
						});
					});
			});	
	});	
	
			$("#add_reg").click(function() {

			$.post('../../components/mailer/validator/getNiman.php',
			{
				mid:2 ,
				cid:$("#cid").val() 

			},
			function(data,status){ 
				//call DB
				$.post('../../components/mailer/validator/AddGroup.php',{gid:2, cid:$("#cid").val() });
				//appand
				$("#recpi").append(data).find("#group_2").hide().show("slide", { direction: "right" }, 1000);
				//init delete
					$(".fss1").click(function() {
					var x = $(this);
							$.post('../../components/mailer/validator/DelUserFromList.php',{uid:$(this).attr("value"), cid:$("#cid").val() },function(data){
								x.parent().fadeOut("slow");
						});
					});

			});	
	});	
	
			$("#add_tmp").click(function() {

			$.post('../../components/mailer/validator/getNiman.php',
			{
				mid:3 ,
				cid:$("#cid").val() 

			},
			function(data,status){ 
				//call DB
				$.post('../../components/mailer/validator/AddGroup.php',{gid:3, cid:$("#cid").val() });
				//appand
				$("#recpi").append(data).find("#group_3").hide().show("slide", { direction: "right" }, 1000);
				//init delete
					$(".fss1").click(function() {
					var x = $(this);
							$.post('../../components/mailer/validator/DelUserFromList.php',{uid:$(this).attr("value"), cid:$("#cid").val() },function(data){
								x.parent().fadeOut("slow");
						});
					});
			});	
	});	
	
					//init delete
					$(".fss1").click(function() {
					var x = $(this);
							$.post('../../components/mailer/validator/DelUserFromList.php',{uid:$(this).attr("value"), cid:$("#cid").val() },function(data){
								x.parent().fadeOut("slow");
						});
					});


					//add camp
					$("#continue").click(function() {
						$.post('../../components/mailer/validator/AddCamp.php',
						{
							ttl:$("#cname").val(), 
							dte:$("#date_range1").val(), 
							time:$("#timepicker3").val(),

						},
						function(data,status){ 
							if (data=='-1'){
								$("#errmsg2").html("תאריך השליחה חייב להיות עתידי");
								$("#errmsg2").show();
							}	
							else if (data=='-2')  $("#cname").css("border-color", "#b94a48");
							else window.location = "edit.php?id="+data;
							
						});	
					});
					//delete camp
					$(".deleteCamp").click(function() {
						$.post('../../components/mailer/validator/DelCamp.php',
						{
							id:$(this).attr("value") 

						},
						function(data,status){ 
							window.location = "index.php";
						});	
					});					
					
					
	//add new campign
	$("#add_new_camp").click(function() {

			$("#addcamp").dialog({ maxHeight: 350,minWidth:400 });

	});					
					
					
					
		//Date picker
      $('.date_picker').datepicker({
		format: 'dd/mm/yyyy',
	    viewMode: 0
	  });
	  
	  $('#timepicker3').timepicker({
        minuteStep: 1,
        secondStep: 1,
        showInputs: false,
        showSeconds: true,
        showMeridian: false
      });
					
	$("#loading").ajaxStart(function(){
	   $(this).show();
	})
	.ajaxStop(function(){
	   $(this).hide();
	});
	
		
});