$(document).ready(function() 
{
    $("#login_btn").click(function(e)
    {
        e.preventDefault();
        var formdata           = $("#login_form").serialize();
		//alert(formdata);
        $.ajax({
                type            : 'POST',
                url             : SITE_URL+"client/client_login/login_validate",
                dataType        : 'json',
                data            : formdata,
                success: function(msg)
                {
                    var data                                                    = eval(msg);
                    if(data.error == 'success')
                    {
                        var redirect = CURRENT_URL;
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
    
    
});