$(document).ready(function() 
{
    $("#event_btn").click(function(e)
    {
        e.preventDefault();
        var formdata           = $("#school_event_form").serialize();
		//alert(formdata);
        $.ajax({
                type            : 'POST',
                url             : SITE_URL+"admin/school_events/event_validate_form",
                dataType        : 'json',
                data            : formdata,
                success: function(msg)
                {
                     var data                                                    = eval(msg);
                    if(data.error == 'success')
                    {
                        alert("Event Added Successfully");
						var redirect = SITE_URL+'admin/school_events/school_event_listing_view';
                        //show_ajax_success('Success',data.msg,redirect);
						window.location.href=redirect;
                    }
                    else
                    {
                        $.each(data, function(index, value)
                        {
                            //alert(value);
                           if(value)
                            $("#"+index).show();
                            $("#"+index).html(value);
                        });
                    }
                    
                }
            });
    });
	
	
	    $(document).on("click",".remove_logo",function(e)
		{
			e.preventDefault();
			var id            = $(this).attr('id');
			//alert("main-"+id);
			$("#main-"+id).remove();
			//alert(123);
		   
		});
		
		 $(function() 
		 {
			$( "#event_date" ).datepicker();
		});
		
		
		 $( "#school_name" ).autocomplete(
		{
		source : SITE_URL+'client/client_college/search_college_name',
		select: function(event,ui ) 
		{
			//alert(ui.item.value);
			//window.location.href            = SITE_URL+'college/'+ui.item.value+'/'+ui.item.id;
        }
	});
		
    
    
});