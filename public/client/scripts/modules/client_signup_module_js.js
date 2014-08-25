$(document).ready(function() 
{
    $("#signup_btn").click(function(e)
    {
        e.preventDefault();
        var formdata           = $("#signup_form").serialize();
		//alert(formdata);
        $.ajax({
                type            : 'POST',
                url             : SITE_URL+"client/client_student_signup/signup_form_validate",
                dataType        : 'json',
                data            : formdata,
                success: function(msg)
                {
                    var data                                                    = eval(msg);
                    if(data.error == 'success')
                    {
                        var redirect = CLIENT_SIGNUP_LOGIN_VIEW;
                        show_ajax_success('Success',data.msg,redirect);
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