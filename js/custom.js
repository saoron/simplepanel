$(function () {
	
			$.post('http://simplepanel.co.il/components/flight/assats/NewMailCount.php',
			{count:1},
			function(data,status){ 
				if (data>0){
					//badge
					$("#unread_mail").html('<span class="info-label badge badge-warning new_notif">'+data+'</span>');
					$(".fs1-height").css('height','0');
					$('#newInbox').text('('+data+')');
				}
			});
	
});