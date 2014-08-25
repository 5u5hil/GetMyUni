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
                        var redirect = SITE_URL+'events';
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