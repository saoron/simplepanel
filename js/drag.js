  $(function() {
  
  $("#sortable").sortable({
						update: function(event, ui) {
							$.post("validator/order.php", { 
							type: "orderPages",
							pages: $('#sortable').sortable('serialize')
							},
							function(data,status){ 
								
							});
						}
					});

    $( "#sortable" ).disableSelection();
	
	
	 
    $( "#droppable" ).droppable({
      hoverClass: "ui-state-active",
      drop: function( event, ui ) {
	  var x = this;
	  			$( this ).removeClass( "btn-danger" );
				$( this ).addClass( "btn-info" );
				$(ui.draggable).fadeOut().hide();
		$.post('../../components/gallery/validator/delete_photo.php',
			{
				pid:$(ui.draggable).attr("value")
			},
			function(data,status){ 
			
				$( x ).removeClass( "btn-info" );
				$( x ).addClass( "btn-danger" );

      			});
	  

      }
    });
	
	
  });