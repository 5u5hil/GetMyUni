$(document).ready(function() 
{
    $("#school_btn").click(function(e)
    {
        e.preventDefault();
        var formdata           = $("#college_form").serialize();
		//alert(formdata);
        $.ajax({
                type            : 'POST',
                url             : SITE_URL+"admin/college/validate_form",
                dataType        : 'json',
                data            : formdata,
                success: function(msg)
                {
                     var data                                                    = eval(msg);
                    if(data.error == 'success')
                    {
                        alert("College Added Successfully");
						var redirect = SITE_URL+'admin/college/index';
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
			alert("main-"+id);
			$("#main-"+id).remove();
			alert(123);
		   
		});
    
    
});