
  $(document).ready(function() 
	{
			$('#event_1').addClass('active');
		
		function search()
		{
			  
		  var image = CLIENT_IMAGES+"loading.gif";
		  $("#ajax_college_list").html("<img class='text-center' id='loading' src='"+image+"' />");
		  var formdata           = $("#advance_search").serialize();
		  //alert(formdata);
		 $.ajax({
                type            : 'POST',
                url             : SITE_URL+"client/client_college/get_sort_data",
                dataType        : 'html',
                data            : formdata,
                success: function(msg)
                {

					$("#ajax_college_list").html(msg);
				}
                  
            });
	
		}
	
	   $('input[name=degree],.type,.course,.country,.tuition,.topschools,.verbalability,.quantability,.topsector').on('change', function(e) {
			e.preventDefault();
			search();
	   });
	   
	   $('#slider-range-min').on('mouseup', function(e) {
			e.preventDefault();
			search();
	   });
	    $('#slider-range-min1').on('mouseup', function(e) {
			e.preventDefault();
			search();
	   });
	   
	    $('.sort_by_rank,.sort_by_tution').click(function(e) {
			e.preventDefault();
			var image = CLIENT_IMAGES+"loading.gif";
			var str = $(this).attr('class')
			//alert(str);
			var id           = $(this).attr("id");
			if( str == "sort_by_rank")
			{
				var data 	  	  = "sort_by_rank="+id;
				alert(data);
			}
			else
			{
				var data 	  	  = "sort_by_tution="+id;
			}
		 $.ajax({
                type            : 'POST',
                url             : SITE_URL+"client/client_college/get_sort_data",
                dataType        : 'html',
                data            : data,
                success: function(msg)
                {

					$("#ajax_college_list").html(msg);
				}
                  
            });
	   });
		
/************************* home page autocomplete ***********************/	
	
    $( ".searchinput" ).autocomplete(
	{
		source : SITE_URL+'client/client_college/search_college_name',
		select: function(event,ui ) 
		{
			
			var cname =  (ui.item.value).split("-");
			
			var link = (($.trim(cname[0])).toLowerCase().replace(/ /g,"-"))+"-"+($.trim(cname[1]));
			
				window.location.href            = SITE_URL+'college/'+link.replace(/[ )(]/g,'')+'/'+ui.item.id;
				
				// $('.searchinput').setAttribute("id", ui.item.id);
             
        }
		
	});
	
	
	$(".school_name").click(function(e) {
		
			e.preventDefault();
		 //alert($('.searchinput').attr('id'));
		
	});
	
/*********************** home page autocomplete *********************/	

/**************************** compare strat *************************/

});


